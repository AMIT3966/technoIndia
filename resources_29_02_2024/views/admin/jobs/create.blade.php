@extends('admin.layout.app')
@section('page-title', 'Create Jobs')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.job.list') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.job.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title.." value="{{ old('title') }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Sub Title *</label>
                                <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter sub title.." value="{{ old('sub_title') }}">
                                @error('sub_title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="category">Category * <span class="badge bg-primary"><a href="{{route('admin.job_category.create')}}">New Category</a></span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" selected hidden>Select category..</option>
                                        @foreach ($category as $item)
                                            <option value="{{$item->title}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="location">Location *</label>
                                    <input type="text" class="form-control" name="location" id="location" placeholder="Enter location.." value="{{ old('location') }}">
                                    @error('location') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="school">School *</label>
                                    <input type="text" class="form-control" name="school" id="school" placeholder="Enter school.." value="{{ old('school') }}">
                                    @error('school') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="gender">Gencer *</label>
                                    <select name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Male/Female">Male/Female</option>
                                    </select>
                                    @error('gender') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="no_of_vacancy">No of Vacancy *</label>
                                    <input type="number" name="no_of_vacancy" class="form-control" value="{{ old('no_of_vacancy') }}">
                                    @error('no_of_vacancy') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    const editorElements = document.querySelectorAll('.editor');

    // Loop through each editor element and initialize ClassicEditor
    editorElements.forEach((element) => {
        ClassicEditor
            .create(element)
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection
