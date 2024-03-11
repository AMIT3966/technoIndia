@extends('admin.layout.app')
@section('page-title', 'Product list')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create</a>
                                <a href="{{ route('admin.product_category.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Product Category</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <form action="" method="get">
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group ml-2">
                                            <select name="category" id="category" class="form-control form-control-sm">
                                                <option value="" selected disabled>Category...</option>
                                                @foreach ($activeCategories as $cat)
                                                    <option value="{{$cat->id}}" {{ (request()->input('category') == $cat->id) ? 'selected' : '' }}>{{$cat->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group ml-2">
                                            <input type="search" class="form-control form-control-sm" name="keyword" id="keyword" value="{{ request()->input('keyword') }}" placeholder="Search something...">
                                        </div>
                                        <div class="form-group ml-2">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-filter"></i>
                                                </button>
                                                <a href="{{ url()->current() }}" class="btn btn-sm btn-light" data-toggle="tooltip" title="Clear filter">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th style="width: 120px">Status</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                    <tr>
                                        <td>{{ $index + $data->firstItem() }}</td>
                                        <td>
                                            @if (isset($item->image))
                                                    <img src="{{asset($item->image)}}" alt="product-image" style="height: 50px" class="img-thumbnail mr-2">
                                            @else
                                                <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="product-image" style="height: 50px" class="mr-2">
                                            @endif
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            @if ($item->categoryDetails)
                                                <a href="{{ route('admin.category.detail', $item->categoryDetails->id) }}">{{ $item->categoryDetails->title }}</a>
                                            @else
                                                NA
                                            @endif
                                        </td>
                                        <td>
                                            <div class="custom-control custom-switch mt-1" data-toggle="tooltip" title="Toggle status">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}" {{ ($item->status == 1) ? 'checked' : '' }} onchange="statusToggle('{{ route('admin.product.status', $item->id) }}')">
                                                <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group">
                                                {{-- <a href="{{ route('admin.product.detail', $item->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a> --}}

                                                <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="{{ route('admin.product.delete', $item->id) }}" class="btn btn-sm btn-dark" onclick="return confirm('Are you sure ?')" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="pagination-container">
                            {{$data->appends($_GET)->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" id="replacementProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Replacement product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group ml-2">
                    <select name="rpclProId" id="rpclProId" class="form-control form-control-sm">
                        <option value="" selected disabled>Select...</option>
                        @foreach ($activeProducts as $prod)
                            <option value="{{$prod->id}}">{{$prod->title}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="stateRoute">
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('table select[name="status"]').on('change', function() {
            var val = $(this).find(':selected').val();
            var route = $(this).data('route');

            if(val == 3) {
                $('input[name="stateRoute"]').val(route);
                $('#replacementProductModal').modal('show');
            } else {
                productStatus(route, val, 0);
            }
        });

        $('select[name="rpclProId"]').on('change', function() {
            var prodId = $(this).find(':selected').val();
            var route = $('input[name="stateRoute"]').val();
            
            console.log(prodId);
            console.log(route);
            
            productStatus(route, 3, prodId);

        });
    </script>
@endsection