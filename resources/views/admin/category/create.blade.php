@extends('admin.layout.app')
@section('page-title', 'Create category')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.category.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary {{ (old('level') == "parent" || !old('level')) ? 'active' : '' }}">
                                        <input type="radio" name="level" value="parent" id="option1" {{ (old('level') == "parent" || !old('level')) ? 'checked' : '' }}> Level 1
                                    </label>
                                    <label class="btn btn-outline-primary {{ (old('level') == "child") ? 'active' : '' }}">
                                        <input type="radio" name="level" value="child" id="option2" {{ (old('level') == "child") ? 'checked' : '' }}> Other level
                                    </label>
                                </div>
                                @error('level') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group" id="selectParent">
                                <label>Select parent category</label>
                                <select class="form-control" name="parent_id">
                                    <option value="" selected disabled>Select</option>
                                    @forelse ($activeCategories as $category)
                                        <option value="{{$category->id}}" {{ (old('parent_id') == $category->id) ? 'selected' : '' }}>{{$category->title}}</option>
                                    @empty
                                        <option value="">No data found</option>
                                    @endforelse
                                </select>
                                @error('parent_id') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title') }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="short_desc">Short description <span class="text-muted">(within 100 characters)</span></label>
                                <textarea name="short_desc" id="short_desc" class="form-control" placeholder="Enter short description">{{ old('short_desc') }}</textarea>
                                @error('short_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="long_desc">Long description</label>
                                <textarea name="long_desc" id="long_desc" class="form-control" placeholder="Enter Long description" rows="6">{{ old('long_desc') }}</textarea>
                                @error('long_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="icon_path">Icon</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="icon_path" id="icon_path">
                                            <label class="custom-file-label" for="icon_path">Choose file</label>
                                        </div>
                                    </div>
                                    <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO</p>
                                    @error('icon_path') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="banner_image_path">Banner</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_image_path" id="banner_image_path">
                                            <label class="custom-file-label" for="banner_image_path">Choose file</label>
                                        </div>
                                    </div>
                                    <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO</p>
                                    @error('banner_image_path') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="page_title">Page title</label>
                                <textarea name="page_title" id="page_title" class="form-control" placeholder="Enter Page title">{{ old('page_title') }}</textarea>
                                @error('page_title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="meta_title">Meta title</label>
                                <textarea name="meta_title" id="meta_title" class="form-control" placeholder="Enter Meta title">{{ old('meta_title') }}</textarea>
                                @error('meta_title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="meta_desc">Meta Description</label>
                                <textarea name="meta_desc" id="meta_desc" class="form-control" placeholder="Enter Meta Description">{{ old('meta_desc') }}</textarea>
                                @error('meta_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword</label>
                                <textarea name="meta_keyword" id="meta_keyword" class="form-control" placeholder="Enter Meta Keyword">{{ old('meta_keyword') }}</textarea>
                                @error('meta_keyword') <p class="small text-danger">{{ $message }}</p> @enderror
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
        checkCatParentLevel();
    </script>
@endsection