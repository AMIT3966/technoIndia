@extends('admin.layout.app')
@section('page-title', 'Banner detail')

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

                                <a href="{{ route('admin.content.banner.edit', $data->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted mb-0">Image</p>
                        @if (!empty($data->image_small) && file_exists(public_path($data->image_small)))
                            <img src="{{ asset($data->image_small) }}" alt="product-img" class="img-thumbnail mb-3" style="height: 100px">
                        @else
                            <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="product-image" style="height: 50px" class="mb-3">
                        @endif

                        <p class="small text-muted mb-0">Title 1</p>
                        <p class="text-dark">{{ $data->title1 ?? 'NA' }}</p>

                        <p class="small text-muted mb-0">Title 2</p>
                        <p class="text-dark">{{ $data->title2 ?? 'NA' }}</p>

                        <p class="small text-muted mb-0">Description</p>
                        <p class="text-dark">{{ $data->description ?? 'NA' }}</p>

                        <p class="small text-muted mb-0">Button 1 Text</p>
                        <p class="text-dark">{{ $data->btn1_text ?? 'NA' }}</p>

                        <p class="small text-muted mb-0">Button 1 Link</p>
                        @if ($data->btn1_link)
                            <p class="text-dark"><a href="{{ $data->btn1_link }}" target="_blank" rel="noopener noreferrer">{{ $data->btn1_link }}</a></p>
                        @else
                            <p class="text-dark">NA</p>
                        @endif
                        <p class="small text-muted mb-0">Button 2 Text</p>
                        <p class="text-dark">{{ $data->btn2_text ?? 'NA' }}</p>

                        <p class="small text-muted mb-0">Button 2 Link</p>
                        @if ($data->btn2_link)
                            <p class="text-dark"><a href="{{ $data->btn2_link }}" target="_blank" rel="noopener noreferrer">{{ $data->btn2_link }}</a></p>
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

@section('script')
    <script>
        checkCatParentLevel();
    </script>
@endsection