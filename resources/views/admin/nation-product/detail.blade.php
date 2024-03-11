@extends('admin.layout.app')
@section('page-title', 'Nation Product detail')

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

                                <a href="{{ route('admin.nation_product.edit', $data->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted mb-0">Name</p>
                        <p class="text-dark">{{ $data->name ?? 'NA' }}</p>

                        <p class="small text-muted mb-0">Title</p>
                        <p class="text-dark">{{ $data->title ?? 'NA' }}</p>

                        <p class="small text-muted mb-0">Description</p>
                        <p class="text-dark">{{ $data->long_desc ?? 'NA' }}</p>

                        <p class="small text-muted mb-0">Product Volume</p>
                        <p class="text-dark">{{ $data->production_volume ?? 'NA' }}</p>
                        <p class="small text-muted mb-0">Application Description</p>
                        <p class="text-dark">{{ $data->application_desc ?? 'NA' }}</p>
                        <p class="small text-muted mb-0">Product Portfolio</p>
                        <p class="text-dark">{{ $data->product_portfolio ?? 'NA' }}</p>
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