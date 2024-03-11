@extends('front.layout.app')

@section('page-title', $data->page_title)
@section('meta-title', $data->meta_title)
@section('meta-description', $data->meta_desc)
@section('meta-keywords', $data->meta_keyword)

@section('style')
<link rel="stylesheet" href="{{ asset('backend-assets/plugins/ckeditor5-36.0.1-sy1shf6t1itx/content-styles.css') }}">
@endsection

@section('section')
<div class="inner-banner about-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0">Blog Details</h1>
                <ul class="list-unstyled p-0 m-0">
                    <li><a href="{{ route('front.home') }}"><i class="fa-solid fa-house-user"></i> home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="{{ route('front.blog.index') }}">Blogs</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="{{ url()->current() }}">Blog Details</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="py-lg-5">
    <div class="container pb-5 blog-details">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card border-0">
                    <div class="card-body">
                        {{-- <small class="pt-0">Posted on :  21st March 2023</small> --}}
                        <small class="pt-0">Posted on :  {{ date('jS M y', strtotime($data->created_at)) }}</small>
                        <h2>{{$data->title}}</h2>
                        <img class="w-100" src="{{ asset($data->image_large) }}" alt="">
                        <div class="blog-text pt-4">
                            <div class="ck-content">{!! $data->long_desc !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection