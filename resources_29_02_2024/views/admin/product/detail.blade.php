@extends('admin.layout.app')
@section('page-title', 'Product detail')

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

                                <a href="{{ route('admin.product.edit', $data->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted mb-0">Images</p>
                        @if (!empty($data->imageDetails) && count($data->imageDetails) > 0)
                            <div class="d-flex mb-3">
                                @foreach ($data->imageDetails as $image)
                                    @if (!empty($image->img_small) && file_exists(public_path($image->img_small)))
                                        <img src="{{ asset($image->img_small) }}" alt="product-img" class="img-thumbnail mr-3">
                                    @else
                                        <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="product-image" style="height: 50px" class="mr-2">
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Type</p>
                        <p class="text-dark">{{ ($data->type == 1) ? 'Product' : 'Kit' }}</p>

                        <p class="small text-muted mb-0">Title</p>
                        <p class="text-dark">{{ $data->title }}</p>

                        <p class="small text-muted mb-0">Category</p>
                        @if ($data->categoryDetails)
                            <p class="text-dark">
                                <a href="{{ route('admin.category.detail', $data->categoryDetails->id) }}">{{ $data->categoryDetails->title }}</a>
                            </p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Short description</p>
                        @if ($data->short_description)
                            <p class="text-dark">{{ nl2br($data->short_description) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Key features</p>
                        @if (count($data->keyFeatures) > 0)
                            <ul>
                            @foreach ($data->keyFeatures as $item)
                                <li><p class="text-dark mb-0">{{ $item->title }}</p></li>
                            @endforeach
                            </ul>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Box items</p>
                        @if (count($data->boxItems) > 0)
                            <ul>
                            @foreach ($data->boxItems as $item)
                                <li><p class="text-dark mb-0">{{ $item->title }}</p></li>
                            @endforeach
                            </ul>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Manuals</p>
                        @if (count($data->manuals) > 0)
                            <ul>
                            @foreach ($data->manuals as $item)
                                <li><a href="{{ asset($item->file_path) }}" class="text-primary mb-0" target="_blank">{{ $item->title }}</a></li>
                            @endforeach
                            </ul>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <hr>

                        <p class="small text-muted mb-0">Overview</p>
                        @if ($data->overview)
                            <div class="ck-content">{!! $data->overview !!}</div>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <hr>

                        <p class="small text-muted mb-0">Specification</p>
                        @if ($data->specification)
                            <div class="ck-content">{!! $data->specification !!}</div>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <hr>

                        <p class="small text-muted mb-0">Page title</p>
                        @if ($data->page_title)
                            <p class="text-dark">{{ nl2br($data->page_title) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Meta title</p>
                        @if ($data->meta_title)
                            <p class="text-dark">{{ nl2br($data->meta_title) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Meta description</p>
                        @if ($data->meta_desc)
                            <p class="text-dark">{{ nl2br($data->meta_desc) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif

                        <p class="small text-muted mb-0">Meta keyword</p>
                        @if ($data->meta_keyword)
                            <p class="text-dark">{{ nl2br($data->meta_keyword) }}</p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection