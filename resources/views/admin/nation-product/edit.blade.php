@extends('admin.layout.app')
@section('page-title', 'Edit Nation Product')

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
                        <form action="{{ route('admin.nation_product.update') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">Name * </label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name')?old('name'):$data->name }}" maxlength="25">
                                    @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Title *</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title')?old('title'):$data->title }}">
                                    @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description <span class="text-muted">(within 100 characters)</span></label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter description" rows="4">{{ old('description')? old('description'):$data->long_desc }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="production_volume">Product Volume *</label>
                                    <input type="text" class="form-control" name="production_volume" id="production_volume" placeholder="Enter product volume" value="{{ old('production_volume')?old('production_volume'):$data->production_volume }}">
                                    @error('production_volume') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="product_portfolio">Product Portfolio *</label>
                                    <input type="text" class="form-control" name="product_portfolio" id="product_portfolio" placeholder="Enter product portfolio" value="{{ old('product_portfolio') ? old('product_portfolio') : $data->product_portfolio }}">
                                    @error('product_portfolio') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="application_desc">Application Description </label>
                                <textarea name="application_desc" id="application_desc" class="form-control" placeholder="Enter application description" rows="4">{{ old('application_desc') ? old('application_desc') : $data->application_desc }}</textarea>
                                @error('application_desc') <p class="small text-danger">{{ $message }}</p> @enderror
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
