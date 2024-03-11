@extends('admin.layout.app')
@section('page-title', 'Edit Facilities')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.facility.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.facility.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $data->title }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Description *</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description Here">{{ $data->desc }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Logo *</label>
                                <img src="{{asset('./facilityUpload/logo')}}/{{ $data->logo }}" alt="" srcset="" height="75px" width="75px" class="img-thumbnail" title="{{ $data->title}}'s logo">
                                <input type="file" name="logo" id="logo" class="form-control">
                                @error('logo') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Image *</label>
                                <img src="{{asset('./facilityUpload/image')}}/{{ $data->image }}" alt="" srcset="" height="100px" width="100px" class="img-thumbnail" title="{{ $data->title}}'s image">
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Page Title *</label>
                                        <input type="text" class="form-control" name="page_title" id="page_title" placeholder="Enter Page Title" value="{{ $data->page_title }}">
                                        @error('page_title') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Meta Title *</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title" value="{{ $data->meta_title }}">
                                        @error('meta_title') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Meta Description *</label>
                                        <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" value="{{ $data->meta_desc }}">
                                        @error('meta_description') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Meta Keyword *</label>
                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Enter Meta Keyword" value="{{ $data->meta_keyword }}">
                                        @error('meta_keyword') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="hidden" name="old_facility_logo" value="{{$data->logo}}">
                            <input type="hidden" name="old_facility_image" value="{{$data->image}}">
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
        checkCatParentLevel();
    </script>
@endsection