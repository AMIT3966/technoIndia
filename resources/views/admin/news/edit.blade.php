@extends('admin.layout.app')
@section('page-title', 'Update News')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.news.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.news.update') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="title">Title *</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title.." value="{{ old('title')?old('title'):$data->title }}">
                                    @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Category *</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" selected hidden>Select category..</option>
                                        @foreach ($category as $item)
                                        <option value="{{$item->id}}" {{$data->news_category_id==$item->id?"Selected":""}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    @if (!empty($data->image))
                                    @if (!empty($data->image) && file_exists(public_path($data->image)))
                                        <img src="{{ asset($data->image) }}" alt="banner-img" class="img-thumbnail mr-3" style="height: 100px">
                                    @else
                                        <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="banner-image" style="height: 50px" class="mr-2">
                                    @endif
                                    <br>
                                @endif
                                    <label for="image">Image *</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO | Preferable Dimensions: 410 X 470 px</p>
                                    @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Description *</label>
                                <textarea name="desc" id="desc" class="form-control editor" placeholder="Enter description">{{ $data->desc}}</textarea>
                                @error('desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <input type="hidden" name="id" value="{{$data->id}}">
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
    const editorElements = document.querySelectorAll('.editor');

    // Loop through each editor element and initialize ClassicEditor
    editorElements.forEach((element) => {
        ClassicEditor
            .create(element)
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection
