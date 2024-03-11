<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword ?? '';
        $query = Job::query();

        $query->when($keyword, function($query) use ($keyword) {
            $query->where('title', 'like', '%'.$keyword.'%')
                ->orWhere('slug', 'like', '%'.$keyword.'%')
                ->orWhere('sub_title', 'like', '%'.$keyword.'%')
                ->orWhere('school_name', 'like', '%'.$keyword.'%')
                ->orWhere('location', 'like', '%'.$keyword.'%');
        });

        $data = $query->latest('id')->where('deleted_at', 1)->paginate(25);
        return view('admin.jobs.index', compact('data'));
    }

    public function create(Request $request){
        $category = JobCategory::orderBy('title', 'ASC')->where('status', 1)->where('deleted_at', 1)->get();
        return view('admin.jobs.create', compact('category'));
    }

    public function store(Request $request)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $request->validate([
                'title' => 'required|string|max:500',
                'sub_title' => 'required|string|max:500',
                'category' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'school' => 'required|string|max:500',
                'gender' => 'required',
                'no_of_vacancy' => 'required',
            ]);

            // Create a new job instance
            $job = new Job();
            $job->title = $request->title;
            $job->sub_title = $request->sub_title;
            $job->category = $request->category;
            $job->location = $request->location;
            $job->school_name = $request->school;
            $job->gender = $request->gender;
            $job->no_of_vacancy = $request->no_of_vacancy;
            $job->save();
            $job->slug = $job->id . '-' . Str::slug($request->title);
            $job->save();
            // Commit the transaction if everything is successful
            DB::commit();

            return redirect()->route('admin.job.list')->with('success', 'Job created');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();

            // Handle the exception
            return redirect()->back()->with('failure', 'Failed to create job. Please try again.');
        }
    }

    public function edit(Request $request, $id)
    {
        $category = JobCategory::orderBy('title', 'ASC')->where('status', 1)->where('deleted_at', 1)->get();
        $data = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('data','category'));
    }

    public function update(Request $request)
    {
     // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $request->validate([
                'title' => 'required|string|max:500',
                'sub_title' => 'required|string|max:500',
                'category' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'school' => 'required|string|max:500',
                'gender' => 'required',
                'no_of_vacancy' => 'required',
            ]);

            // Find the job by its ID
            $job = Job::findOrFail($request->id);

            // Update the job attributes
            $job->title = $request->title;
            $job->sub_title = $request->sub_title;
            $job->category = $request->category;
            $job->location = $request->location;
            $job->school_name = $request->school;
            $job->gender = $request->gender;
            $job->no_of_vacancy = $request->no_of_vacancy;
            $job->save();
            // Update the slug
            $job->slug = $job->id . '-' . Str::slug($request->title);
            $job->save();

            // Commit the transaction if everything is successful
            DB::commit();

            return redirect()->route('admin.job.list')->with('success', 'Job updated');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();

            // Handle the exception
            return redirect()->back()->with('failure', 'Failed to update job. Please try again.');
        }
    }

    public function delete(Request $request, $id){
        DB::beginTransaction();
        try {
            $data = Job::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.job.list')->with('success', 'Job deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete Job. Please try again.');
        }
    }
    public function status(Request $request, $id)
    {
        $data = Job::findOrFail($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }
   
}
