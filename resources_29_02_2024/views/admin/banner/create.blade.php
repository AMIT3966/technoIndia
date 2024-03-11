@extends('admin.layout.app')
@section('page-title', 'Create banner')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.content.banner.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.content.banner.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="image">Image *</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO | Preferable Dimensions: 1400 X 600 px</p>
                                    @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="title1">Title 1 * <span class="text-muted">(within 25 characters)</span></label>
                                    <input type="text" class="form-control" name="title1" id="title1" placeholder="Enter title 1" value="{{ old('title1') }}" maxlength="25">
                                    @error('title1') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="title2">Title 2 * <span class="text-muted">(within 25 characters)</span></label>
                                    <input type="text" class="form-control" name="title2" id="title2" placeholder="Enter title 2" value="{{ old('title2') }}" maxlength="25">
                                    @error('title2') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Short description <span class="text-muted">(within 70 characters)</span></label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter short description" rows="4">{{ old('description') }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="btn1_text">Button text 1 <span class="text-muted">(within 25 characters)</span></label>
                                    <input type="text" class="form-control" name="btn1_text" id="btn1_text" placeholder="Enter button 1 text" value="{{ old('btn1_text') }}" maxlength="25">
                                    @error('btn1_text') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="btn1_link">Button link 1</label>
                                    <input type="text" class="form-control" name="btn1_link" id="btn1_link" placeholder="Enter button 1 link" value="{{ old('btn1_link') }}">
                                    @error('btn1_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="btn2_text">Button text <span class="text-muted">(within 25 characters)</span></label>
                                    <input type="text" class="form-control" name="btn2_text" id="btn2_text" placeholder="Enter button 2 text" value="{{ old('btn2_text') }}" maxlength="25">
                                    @error('btn2_text') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="btn2_link">Button link</label>
                                    <input type="text" class="form-control" name="btn2_link" id="btn2_link" placeholder="Enter button 2 link" value="{{ old('btn2_link') }}">
                                    @error('btn_link') <p class="small text-danger">{{ $message }}</p> @enderror
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
