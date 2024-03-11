@extends('admin.layout.app')
@section('page-title', 'Category list')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <form action="" method="get">
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group">
                                            <select name="parent_id" id="parent_id" class="form-control form-control-sm">
                                                <option value="" selected disabled>Parent...</option>
                                                @foreach ($parentCategories as $cat)
                                                    <option value="{{$cat->id}}" {{ (request()->input('parent_id') == $cat->id) ? 'selected' : '' }}>{{$cat->title}}</option>
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
                                    <th>Parent</th>
                                    <th>Level</th>
                                    <th>Products</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                    <tr>
                                        <td>{{ $index + $data->firstItem() }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @if ($item->parent_id != 0)
                                                @if ($item->categoryDetails)
                                                    <a href="{{ route('admin.category.detail', $item->categoryDetails->id) }}">{{ $item->categoryDetails->title}}</a>
                                                @else
                                                    <span class="badge badge-danger" data-toggle="tooltip" title="Parent not found. Delete and create again">Invalid</span>
                                                @endif
                                            @else
                                                NA
                                            @endif
                                        </td>
                                        <td>
                                            @if(categoryLevelFinder($item->id) == "Invalid")
                                                <span class="badge badge-danger" data-toggle="tooltip" title="Parent not found. Delete and create again">{{ categoryLevelFinder($item->id) }}</span>
                                            @else
                                                <span class="badge badge-dark">{{ categoryLevelFinder($item->id) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (categoryLevelFinder($item->id) == "Level 1")
                                                {{ count(catLeveltoProducts($item->id)) }}
                                            @elseif (categoryLevelFinder($item->id) == "Level 2")
                                                {{ count(catLeve2toProducts($item->id)) }}
                                            @elseif (categoryLevelFinder($item->id) == "Level 3")
                                                {{ count($item->productDetails) }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <div class="custom-control custom-switch mt-1" data-toggle="tooltip" title="Toggle status">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}" {{ ($item->status == 1) ? 'checked' : '' }} onchange="statusToggle('{{ route('admin.category.status', $item->id) }}')">
                                                <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                                            </div>

                                            <div class="btn-group">
                                                <a href="{{ route('admin.category.detail', $item->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="{{ route('admin.category.delete', $item->id) }}" class="btn btn-sm btn-dark" onclick="return confirm('Are you sure ?')" data-toggle="tooltip" title="Delete">
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
@endsection