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
                <h1 class="mb-0">Service Details</h1>
                <ul class="list-unstyled p-0 m-0">
                    <li><a href="{{ route('front.home') }}"><i class="fa-solid fa-house-user"></i> Home</a></li>
                    {{-- <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="#">Services</a></li> --}}
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="{{ url()->current() }}">Service Details</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="py-5 service_details">
    <div class="container">
        <div class="ck-content">{!! $data->long_desc !!}</div>

        {{-- <div class="row justify-content-between align-items-center mt-lg-5">
            <div class="col-12 col-lg-6 ser_img">
                <img src="images/featured-ind-img1.jpg" alt="" class="img-thumbnail w-100">
            </div>
            <div class="col-12 col-lg-5 ser_text">
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
        <div class="row justify-content-between align-items-center mt-lg-5">
            <div class="col-12 col-lg-6 ser_img">
                <img src="images/featured-ind-img1.jpg" alt="" class="img-thumbnail w-100">
            </div>
            <div class="col-12 col-lg-5 ser_text">
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
        <div class="row justify-content-between align-items-center mt-lg-5">
            <div class="col-12 col-lg-6 ser_img">
                <img src="images/featured-ind-img1.jpg" alt="" class="img-thumbnail w-100">
            </div>
            <div class="col-12 col-lg-5 ser_text">
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
        <div class="row justify-content-between align-items-center mt-lg-5">
            <div class="col-12 col-lg-6 ser_img">
                <img src="images/featured-ind-img1.jpg" alt="" class="img-thumbnail w-100">
            </div>
            <div class="col-12 col-lg-5 ser_text">
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div> --}}
    </div>
</section>
@endsection