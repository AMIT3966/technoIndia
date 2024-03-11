<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\JobCategory;
use App\Models\Collection;
use App\Models\Subject;
use App\Models\Unit;
use App\Interfaces\CategoryInterface;
use DB;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function __construct(CategoryInterface $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }
    public function index(Request $request)
    {
        $keyword = $request->keyword ?? '';
        $parent_id = $request->parent_id ?? '';

        $query = Category::query();

        $query->when($keyword, function($query) use ($keyword) {
            $query->where('title', 'like', '%'.$keyword.'%');
        });
        $query->when($parent_id, function($query) use ($parent_id) {
            $query->where('parent_id', $parent_id);
        });

        $data = $query->latest('id')->paginate(25);
        $parentCategories = Category::where('parent_id', 0)->orderBy('title')->get();

        return view('admin.category.index', compact('data', 'parentCategories'));
    }

    public function create(Request $request)
    {
        $activeCategories = Category::where('status', 1)->orderBy('title')->get();

        return view('admin.category.create', compact('activeCategories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string|in:parent,child',
            'short_desc' => 'nullable|string|min:1|max:100',
            'long_desc' => 'nullable|string|min:1',
            'icon_path' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'banner_image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'page_title' => 'nullable|string|min:1',
            'meta_title' => 'nullable|string|min:1',
            'meta_desc' => 'nullable|string|min:1',
            'meta_keyword' => 'nullable|string|min:1'
        ], [
            'icon_path.max' => 'The icon must not be greater than 1MB.',
            'banner_image_path.max' => 'The icon must not be greater than 1MB.'
        ]);

        $parent_id = 0;
        if ($request->level == "child") {
            $parent_id = $request->parent_id ?? 0;
        }

        $category = new Category();
        $category->parent_id = $parent_id;
        $category->title = $request->title;
        $category->slug = slugGenerate($request->title, 'categories');
        $category->short_desc = $request->short_desc ?? '';
        $category->long_desc = $request->long_desc ?? '';

        $category->page_title = $request->page_title ?? '';
        $category->meta_title = $request->meta_title ?? '';
        $category->meta_desc = $request->meta_desc ?? '';
        $category->meta_keyword = $request->meta_keyword ?? '';

        // image upload
        if (isset($request->icon_path)) {
            $fileUpload1 = fileUpload($request->icon_path, 'categories');

            $category->icon_path_small = $fileUpload1['file'][0];
            $category->icon_path_medium = $fileUpload1['file'][1];
            $category->icon_path_large = $fileUpload1['file'][2];
        }

        // image upload
        if (isset($request->banner_image_path)) {
            $fileUpload2 = fileUpload($request->banner_image_path, 'categories');

            $category->banner_image_path_small = $fileUpload2['file'][0];
            $category->banner_image_path_medium = $fileUpload2['file'][1];
            $category->banner_image_path_large = $fileUpload2['file'][2];
        }

        $category->save();

        return redirect()->route('admin.category.list.all')->with('success', 'New category created');
    }

    public function detail(Request $request, $id)
    {
        $data = Category::findOrFail($id);

        return view('admin.category.detail', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $allCategories = Category::orderBy('title')->get();

        return view('admin.category.edit', compact('data', 'allCategories'));
    }

    public function update(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'level' => 'required|string|in:parent,child',
            'short_desc' => 'nullable|string|min:1|max:100',
            'long_desc' => 'nullable|string|min:1',
            'icon_path' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'banner_image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'page_title' => 'nullable|string|min:1',
            'meta_title' => 'nullable|string|min:1',
            'meta_desc' => 'nullable|string|min:1',
            'meta_keyword' => 'nullable|string|min:1'
        ], [
            'icon_path.max' => 'The icon must not be greater than 1MB.',
            'banner_image_path.max' => 'The icon must not be greater than 1MB.'
        ]);

        $parent_id = 0;
        if ($request->level == "child") {
            $parent_id = $request->parent_id ?? 0;
        }

        $category = Category::findOrFail($request->id);
        $category->parent_id = $parent_id;

        if ($category->title != $request->title) {
            $category->slug = slugGenerate($request->title, 'categories');
        }

        $category->title = $request->title;
        $category->short_desc = $request->short_desc;
        $category->long_desc = $request->long_desc;

        $category->page_title = $request->page_title ?? '';
        $category->meta_title = $request->meta_title ?? '';
        $category->meta_desc = $request->meta_desc ?? '';
        $category->meta_keyword = $request->meta_keyword ?? '';

        // image upload
        if (isset($request->icon_path)) {
            $fileUpload1 = fileUpload($request->icon_path, 'categories');

            $category->icon_path_small = $fileUpload1['file'][0];
            $category->icon_path_medium = $fileUpload1['file'][1];
            $category->icon_path_large = $fileUpload1['file'][2];
        }

        // image upload
        if (isset($request->banner_image_path)) {
            $fileUpload2 = fileUpload($request->banner_image_path, 'categories');

            $category->banner_image_path_small = $fileUpload2['file'][0];
            $category->banner_image_path_medium = $fileUpload2['file'][1];
            $category->banner_image_path_large = $fileUpload2['file'][2];
        }

        $category->save();

        return redirect()->route('admin.category.list.all')->with('success', 'Category updated');
    }

    public function delete(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.category.list.all')->with('success', 'Category deleted');
    }

    public function status(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();

        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }
   
    // POST
    public function CollectionIndex(Request $request){
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchCollection($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAll();
        }
        return view('admin.collection.index', compact('data'));
    }
    public function CollectionCreate(Request $request){
        return view('admin.collection.create');
    }
    
    public function CollectionStore(Request $request){
        // Start a database transaction
        DB::beginTransaction();
            $request->validate([
                'title' => 'required|string|max:255|unique:collections,title',
            ]);

            try {
                $data = new Collection;
                $data->title = $request->title;
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.collection.list.all')->with('success', 'New collection created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create collection. Please try again.');
            }
    }

    public function CollectionUpdate(Request $request){
        // Start a database transaction
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('collections', 'title')->ignore($request->id),
            ],
        ]);

        try {
            $data = Collection::findOrFail($request->id);
            $data->title = $request->title;
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.collection.list.all')->with('success', 'Collection updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update collection. Please try again.');
        }
    }
    public function CollectionDelete(Request $request, $id){
        DB::beginTransaction();

        try {
            $data = Collection::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.collection.list.all')->with('success', 'Collection deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete collection. Please try again.');
        }
    }
    public function CollectionStatus(Request $request, $id){
        $data = $this->CategoryRepository->findById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }
    // Units
    public function UnitsIndex(Request $request){
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchUnit($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllUnits();
        }
        return view('admin.unit.index', compact('data'));
    }
    public function UnitCreate(Request $request){
        return view('admin.unit.create');
    }
    public function UnitEdit($id){
        $data = $this->CategoryRepository->findUnitById($id);
        return view('admin.unit.edit', compact('data'));
    }
    public function UnitStore(Request $request){
        // Start a database transaction
        DB::beginTransaction();
            $request->validate([
                'title' => 'required|string|max:255|unique:collections,title',
            ]);

            try {
                $data = new Unit;
                $data->title = $request->title;
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.unit.list.all')->with('success', 'New unit created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create unit. Please try again.');
            }
    }

    public function UnitUpdate(Request $request){
        // Start a database transaction
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('units', 'title')->ignore($request->id),
            ],
        ]);

        try {
            $data = Unit::findOrFail($request->id);
            $data->title = $request->title;
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.unit.list.all')->with('success', 'Unit updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update unit. Please try again.');
        }
    }
    public function UnitDelete(Request $request, $id){
        DB::beginTransaction();
        try {
            $data = Unit::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.unit.list.all')->with('success', 'Unit deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete Unit. Please try again.');
        }
    }
    public function UnitStatus(Request $request, $id){
        $data = $this->CategoryRepository->findUnitById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }
    // Subject
    public function SubjectIndex(Request $request){
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchSubject($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllSubjects();
        }
        return view('admin.subject.index', compact('data'));
    }
    public function SubjectCreate(Request $request){
        return view('admin.subject.create');
    }
    public function SubjectEdit($id){
        $data = $this->CategoryRepository->findSubjectById($id);
        return view('admin.subject.edit', compact('data'));
    }
    public function SubjectStore(Request $request){
        // Start a database transaction
        DB::beginTransaction();
            $request->validate([
                'title' => 'required|string|max:255|unique:collections,title',
            ]);

            try {
                $data = new Subject;
                $data->title = $request->title;
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.subject.list.all')->with('success', 'New subject created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create subject. Please try again.');
            }
    }

    public function SubjectUpdate(Request $request){
        // Start a database transaction
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('subjects', 'title')->ignore($request->id),
            ],
        ]);

        try {
            $data = Subject::findOrFail($request->id);
            $data->title = $request->title;
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.subject.list.all')->with('success', 'Subject updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update subject. Please try again.');
        }
    }
    public function SubjectDelete(Request $request, $id){
        DB::beginTransaction();
        try {
            $data = Subject::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.subject.list.all')->with('success', 'Subject deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete subject. Please try again.');
        }
    }
    public function SubjectStatus(Request $request, $id){
        $data = $this->CategoryRepository->findSubjectById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }


    // Job Category
    public function JobCategoryIndex(Request $request){
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchJobCategory($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllJobCategory();
        }
        return view('admin.job-category.index', compact('data'));
    }
    public function JobCategoryCreate(Request $request){
        return view('admin.job-category.create');
    }
    public function JobCategoryEdit($id){
        $data = $this->CategoryRepository->findById($id);
        return view('admin.job-category.edit', compact('data'));
    }
    public function JobCategoryStore(Request $request){
        // Start a database transaction
        DB::beginTransaction();
            $request->validate([
                'title' => 'required|string|max:255|unique:collections,title',
            ]);

            try {
                $data = new JobCategory;
                $data->title = $request->title;
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.job_category.list.all')->with('success', 'New category created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create category. Please try again.');
            }
    }

    public function JobCategoryUpdate(Request $request){
        // Start a database transaction
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('job_categories', 'title')->ignore($request->id),
            ],
        ]);

        try {
            $data = JobCategory::findOrFail($request->id);
            $data->title = $request->title;
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.job_category.list.all')->with('success', 'category updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update category. Please try again.');
        }
    }
    public function JobCategoryDelete(Request $request, $id){
        DB::beginTransaction();

        try {
            $data = Collection::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.collection.list.all')->with('success', 'Collection deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete collection. Please try again.');
        }
    }
    public function JobCategoryStatus(Request $request, $id){
        $data = $this->CategoryRepository->findById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }

}
