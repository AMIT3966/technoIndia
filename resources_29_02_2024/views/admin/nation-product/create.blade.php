@extends('admin.layout.app')
@section('page-title', 'Create Nation Product')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.nation_product.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.nation_product.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">Name * </label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}" maxlength="25">
                                    @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Title *</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title') }}">
                                    @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description <span class="text-muted">(within 100 characters)</span></label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter description" rows="4">{{ old('description') }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="production_volume">Product Volume *</label>
                                    <input type="text" class="form-control" name="production_volume" id="production_volume" placeholder="Enter product volume" value="{{ old('production_volume') }}">
                                    @error('production_volume') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="product_portfolio">Product Portfolio *</label>
                                    <input type="text" class="form-control" name="product_portfolio" id="product_portfolio" placeholder="Enter product portfolio" value="{{ old('product_portfolio') }}">
                                    @error('product_portfolio') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="application_desc">Application Description </label>
                                <textarea name="application_desc" id="application_desc" class="form-control" placeholder="Enter application description" rows="4">{{ old('application_desc') }}</textarea>
                                @error('application_desc') <p class="small text-danger">{{ $message }}</p> @enderror
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
