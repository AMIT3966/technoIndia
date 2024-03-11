<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

use App\Interfaces\EventInterface;
use DB;
use Illuminate\Validation\Rule;
class EventController extends Controller
{
    public function __construct(EventInterface $EventRepository)
    {
        $this->EventRepository = $EventRepository;
    }
    public function status(Request $request, $id)
    {
        $data = Event::findOrFail($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();

        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }
    public function EventIndex(Request $request)
    {
        if (!empty($request->keyword)) {
            $data = $this->EventRepository->getSearchEvent($request->keyword);
        } else {
            $data = $this->EventRepository->listAllEvents();
        }
        return view('admin.event.index', compact('data'));
    }

    public function EventCreate(Request $request)
    {
        return view('admin.event.create');
    }
    public function EventStore(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'title' => 'required|string|max:255|unique:events,title',
            'description' => 'required|string',
            'event_category' => 'required|string|max:255',
            'pic' => 'required|mimes:jpg,jpeg,png,gif,svg|max:1000'

        ], [
            'pic.max' => 'The image must not be greater than 1MB.',
        ]);
        $file = $request->file('pic');
        $fileName = time() . rand(10000, 99999) . "@" . $file->getClientOriginalExtension();
        $file->move(public_path('eventUploads'), $fileName);
        try {
            $data = new Event;
            $data->title = $request->title;
            $data->desc = $request->description;
            $data->event_category = $request->event_category;
            $data->image = $fileName;
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.event.list.all')->with('success', 'New Event created');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to create Event. Please try again.');
        }
    }
    public function EventEdit($id)
    {
        $data = $this->EventRepository->findEventById($id);
        return view('admin.event.edit', compact('data'));
    }
    public function EventUpdate(Request $request)
    {
        // dd($request->all());
        // Start a database transaction
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('collections', 'title')->ignore($request->id),
            ],
            'description' => [
                'required',
                'string',
                
            ],
            'event_category' => [
                'required',
                'string',
                'max:255',
            ],
            
            'pic' => [
                'mimes:jpg,jpeg,png,gif,svg',
                'max:1000',
            ],

        ],[
            'pic.max' => 'The image must not be greater than 1MB.'
        ]);

        try {
            $data = Event::findOrFail($request->id);
            $data->title = $request->title;
            $data->desc = $request->description;
            $data->event_category = $request->event_category;
            if($request->pic){
                $file = $request->file('pic');
                $fileName = time().rand(10000,99999).$file->getClientOriginalExtension();
                $file->move(public_path('eventUploads'),$fileName);

            $data->image = $fileName;    
            }else{
            $data->image = $request->old_event_img;    
            }
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.event.list.all')->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update Event. Please try again.');
        }
    }
    public function EventStatus(Request $request, $id)
    {
        $data = $this->EventRepository->findEventById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }

    public function EventDelete(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $data = Event::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.event.list.all')->with('success', 'Event deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete Event. Please try again.');
        }
    }
}
