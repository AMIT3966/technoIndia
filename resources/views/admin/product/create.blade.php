@extends('admin.layout.app')
@section('page-title', 'Create product')

@section('style')
<link rel="stylesheet" href="{{ asset('backend-assets/plugins/ckeditor5-36.0.1-sy1shf6t1itx/content-styles.css') }}">
@endsection

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.product.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="title">Product Title</label>
                                <textarea name="title" id="title" class="form-control" placeholder="Enter product title" required>{{ old('title') }}</textarea>
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="images">Product Images *</label>
                                    <input type="file" class="form-control" name="images" id="images" required>
                                    @error('images') <p class="small text-danger">{{ $message }}</p> @enderror
                                    @error('images.*') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="category_id">Product Category *</label>
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        <option value="" selected disabled>Select</option>
                                        @forelse ($activeCategories as $category)
                                            <option value="{{$category->id}}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{$category->title}}</option>
                                        @empty
                                            <option value="">No data found</option>
                                        @endforelse
                                    </select>
                                    @error('category_id') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="overview">Description</label>
                                <textarea name="description" id="overview" class="form-control ckeditor" placeholder="Enter description">{{ old('overview') }}</textarea>
                                @error('overview') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="">We Transform Lives</label>
                                <div class="multi-datasheet-links">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="service_title">Title</label>
                                            <input type="text" class="form-control" placeholder="Enter title" name="service_title[]" required>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="service_desc">Description</label>
                                            <textarea name="service_desc[]" id="" cols="30" rows="1" class="form-control" required></textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <label for=""></label>
                                            <a href="javascript:void(0)" class="input-group-text add-datasheet-link justify-content-center">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div id="datasheet-items"></div>
                            </div>
                            <hr>
                            {{-- <div class="form-group">
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
                            </div> --}}

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
    <script src="{{ asset('backend-assets/plugins/ckeditor5-36.0.1-sy1shf6t1itx/build/ckeditor.js') }}"></script>
    <script src="{{ asset('backend-assets/js/ckeditor-custom.js') }}"></script>

    <script>

        $('.add-datasheet-link').on('click', function() {
            var content = `
            <div class="multi-datasheet-links">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="service_title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="service_title[]" required>
                    </div>
                    <div class="col-md-7">
                        <label for="service_desc">Description</label>
                        <textarea name="service_desc[]" id="" cols="30" rows="1" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-1">
                        <label for=""></label>
                            <a href="javascript:void(0)" class="input-group-text remove-datasheet-link justify-content-center">
                                <i class="fas fa-times"></i>
                            </a>
                        </a>
                    </div>
                </div>
            </div>
            `;

            $('#datasheet-items').append(content);
        });

        $(document).on('click', '.remove-datasheet-link', function() {
            $(this).closest(".multi-datasheet-links").remove();
        });
    </script>
@endsection