@extends('admin.layout.app')
@section('page-title', 'Class Schedule')

@section('section')
<style>
    .user-images {
        display: flex;
        flex-wrap: wrap;
        list-style-type: none;
        padding: 20px 0;
        margin: 0 -4px;
    }

    .user-images li {
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc((100% - 40px) / 5);
        height: 140px;
        overflow: hidden;
        border-radius: 6px;
        margin: 0 4px 8px;
    }

    .user-images li img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media only screen and (max-width: 1599px) {
        .user-images li {
            height: 120px;
        }
    }

    @media only screen and (max-width: 1399px) {
        .user-images li {
            height: 100px;
        }
    }

    @media only screen and (max-width: 1299px) {
        .user-images li {
            height: 80px;
        }
    }

    @media only screen and (max-width: 1199px) {
        .user-images li {
            height: 100px;
        }
    }

    @media only screen and (max-width: 991px) {
        .user-images li {
            height: 140px;
        }
    }

    @media only screen and (max-width: 799px) {
        .user-images li {
            height: 120px;
        }
    }

    @media only screen and (max-width: 699px) {
        .user-images li {
            height: 100px;
        }
    }

    @media only screen and (max-width: 575px) {
        .user-images li {
            height: 80px;
        }
    }

    @media only screen and (max-width: 499px) {
        .user-images li {
            width: calc((100% - 32px) / 4);
        }
    }

    @media only screen and (max-width: 399px) {
        .user-images li {
            width: calc((100% - 24px) / 3);
        }
    }

    @media only screen and (max-width: 359px) {
        .user-images li {
            height: 70px;
        }
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-plus"></i> Create Class Schedule</button>

                                <a href="{{ route('admin.schedulecontent.list.all') }}" class="btn btn-sm btn-secondary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5px">#</th>
                                    <th width="25%">Day</th>
                                    <th width="25%">Class</th>
                                    <th>Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($daily_schedule_data as $index => $item)
                                <tr class="text-left align-middle">
                                    <td>{{ $index+1}}</td>
                                    <td>{{ $item->day }}</td>
                                    <td>{{ $item->Class }}</td>
                                    <td>
                                        <div class="custom-control custom-switch mt-1" data-toggle="tooltip" title="Toggle status">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}" {{ ($item->status == 1) ? 'checked' : '' }} onchange="statusToggle('{{ route('admin.subfacility.status', $item->id) }}')">
                                            <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                                        </div>
                                    </td>
                                    <td class="d-flex text-right">
                                        <div class="btn-group">
                                            <button onclick="getSubFacilityInfo({{$item->id}})" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn" data-toggle="tooltip" title="Delete" data-id="{{ $item->id }}">
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


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--Add Scheduled Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Class Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Choose Class *</label>
                        <select name="class" id="class" class="form-control">
                            @foreach ($data as $index => $item)
                            <option selected hidden>----Select----</option>
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('class') <p class="small text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Day *</label>
                        <input type="text" class="form-control" name="day" id="day" placeholder="Enter Day Schedule" value="{{ old('day') }}">
                        @error('day') <p class="small text-danger">{{ $message }}</p> @enderror
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end modal -->

@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var itemId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../subfacility/delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });

</script>

@endsection