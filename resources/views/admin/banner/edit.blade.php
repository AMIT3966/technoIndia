@extends('admin.layout.app')
@section('page-title', 'Edit banner')

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
                        <form action="{{ route('admin.content.banner.update') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row form-group">
                                <div class="col-md-6">
                                    @if (!empty($data->image_small))
                                        @if (!empty($data->image_small) && file_exists(public_path($data->image_small)))
                                            <img src="{{ asset($data->image_small) }}" alt="banner-img" class="img-thumbnail mr-3" style="height: 50px">
                                        @else
                                            <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="banner-image" style="height: 50px" class="mr-2">
                                        @endif
                                        <br>
                                    @endif

                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO | Preferable Dimensions: 1400 X 600 px</p>
                                    @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="title1">Title 1 * <span class="text-muted">(within 25 characters)</span></label>
                                    <input type="text" class="form-control" name="title1" id="title1" placeholder="Enter title 1" value="{{ old('title1') ? old('title1') : $data->title1 }}" maxlength="25">
                                    @error('title1') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="title2">Title 2 * <span class="text-muted">(within 25 characters)</span></label>
                                    <input type="text" class="form-control" name="title2" id="title2" placeholder="Enter title 2" value="{{ old('title2') ? old('title2') : $data->title2 }}" maxlength="25">
                                    @error('title2') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Short description <span class="text-muted">(within 70 characters)</span></label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter short description" rows="4">{{ old('description') ? old('description') : $data->description }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="btn1_text">Button 1 text <span class="text-muted">(within 25 characters)</span></label>
                                    <input type="text" class="form-control" name="btn1_text" id="btn1_text" placeholder="Enter Button 1 text" value="{{ old('btn1_text') ? old('btn1_text') : $data->btn1_text }}" maxlength="25">
                                    @error('btn1_text') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="btn1_link">Button 1 link</label>
                                    <input type="text" class="form-control" name="btn1_link" id="btn1_link" placeholder="Enter Button 1 link" value="{{ old('btn1_link') ? old('btn1_link') : $data->btn1_link }}" maxlength="25">
                                    @error('btn1_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="btn2_text">Button 2 text <span class="text-muted">(within 25 characters)</span></label>
                                    <input type="text" class="form-control" name="btn2_text" id="btn2_text" placeholder="Enter Button 2 text" value="{{ old('btn2_text') ? old('btn2_text') : $data->btn2_text }}" maxlength="25">
                                    @error('btn2_text') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="btn2_link">Button 2 link</label>
                                    <input type="text" class="form-control" name="btn2_link" id="btn2_link" placeholder="Enter Button 2 link" value="{{ old('btn2_link') ? old('btn2_link') : $data->btn2_link }}" maxlength="25">
                                    @error('btn2_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
