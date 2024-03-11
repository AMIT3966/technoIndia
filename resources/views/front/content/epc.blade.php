@extends('front.layout.app')

{{-- @section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword) --}}

@section('section')
<section class="inner_banner">
    <div class="container">
        <div class="row">
            <h3>EPC <span>
                    <nav class="breadcrumb">
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{asset('')}}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item_active"><a class="breadcrumb__link">EPC</a></li>
                        </ul>
                    </nav>
                </span>
            </h3>
        </div>
    </div>
</section>

<section class="epc_section_one">
    <div class="container">
        <div class="row m-0 justify-content-between align-items-center py-4 py-lg-5">
            <div class="col-lg-5 col-md-8 col-12 product_list">
                <img src="{{asset($data->section1_image)}}" class="w-100 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
            </div>
            <div class="col-12 col-lg-7">
                <div class="mb-30">
                    <div class="title-area mb-2">
                        <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="wow fadeInDown mb-2">
                        <span class="sec-subtitle wow fadeInUp">{{$data->point1_title}}</span>
                        <h4 class="sec-title h4  wow fadeInUp">{{$data->section1_title}}</h4>
                    </div>
                    <p class="fs-md mb-4 pb-xl-2">
                       {!!$data->section1_desc!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="uspDiv position-relative epc_section_two">
    <div class="container">
        <div class="row m-0 justify-content-between">
            <div class="col-12 col-lg-6 col-md-7">
                <div class="title-area mb-2">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="wow fadeInDown mb-2">
                    <span class="sec-subtitle wow fadeInUp">{{$data->point2_title}}</span>
                    <h3 class="sec-title h3  wow fadeInUp">{{$data->section2_title}}</h3>
                </div>
                <p class="fs-md mb-4 pb-xl-2">
                  {!!$data->section2_desc!!}
                </p>
                {{-- <h5>The <strong>RDSS</strong> aspires to achieve the following goals:</h5>
                <ul>
                    <li>
                        <div class="icon">
                            <span class="flaticon-settings"><i class="fas fa-poll"></i></span>
                        </div>
                        <div class="inner-text">
                            <h3>Reduced AT&C Losses:</h3>
                            <p><small>Nationwide levels targeted at 12-15% by 2024-25.</small></p>
                        </div>                            
                    </li>
                    <li>
                        <div class="icon">
                            <span class="flaticon-settings"><i class="fas fa-poll"></i></span>
                        </div>
                        <div class="inner-text">
                            <h3>Closing ACS-ARR Gap</h3>
                            <p><small>Zero gap anticipated by 2024-25.</small></p>
                        </div>                            
                    </li>
                    <li>
                        <div class="icon">
                            <span class="flaticon-settings"><i class="fas fa-poll"></i></span>
                        </div>
                        <div class="inner-text">
                            <h3>Enhanced Power Quality</h3>
                            <p><small>Ensuring reliable, affordable power supply through financially sustainable and operationally efficient distribution sectors.</small></p>
                        </div>                            
                    </li>
                </ul> --}}
            </div>
            <div class="col-12 col-lg-5 col-md-5">
                <img src="{{$data->section2_image}}" class="w-100  wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row m-0 justify-content-between align-items-center py-4 py-lg-5">
            <div class="col-lg-5 col-md-8 col-12 product_list">
                <img src="{{asset($data->section3_image)}}" class="w-100 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
            </div>
            <div class="col-12 col-lg-7 ps-lg-5">
                <div class="mb-30">
                    <div class="title-area mb-2">
                        <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="wow fadeInDown mb-2">
                        <h4 class="sec-title h4  wow fadeInUp">{{$data->section3_title}}</h4>
                    </div>
                    <p class="fs-md mb-4 pb-xl-2">
                        {!!$data->section3_desc!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row m-0 justify-content-between align-items-center py-4 py-lg-5">
            <div class="col-12 col-lg-7 ps-lg-5">
                <div class="mb-30">
                    <div class="title-area mb-2">
                        <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="wow fadeInDown mb-2">
                        <h4 class="sec-title h4  wow fadeInUp">{{$data->section4_title}}</h4>
                    </div>
                    <p class="fs-md mb-4 pb-xl-2">
                       {!!$data->section4_desc!!}
                    </p>
                </div>
            </div>
            <div class="col-lg-5 col-md-8 col-12 product_list">
                <img src="{{asset($data->section4_image)}}" class="w-100 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
            </div>
        </div>
    </div>
</section>

<div class="about-style2-area overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="title-area mb-2">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="wow fadeInDown mb-2">
                    <h4 class="sec-title h4  wow fadeInUp">{{$data->section5_title}}</h4>
                </div>
                <p class="fs-md mb-4 pb-xl-2">
                    {!!$data->section5_desc!!}
                </p>
                {{-- <p class="fs-md mb-4 pb-xl-2">
                    Discover how Cabcon India can be your partner in progress!
                </p> --}}
            </div>

            <div class="col-xl-6">
                <div class="about-style2__image-box">
                    <div class="big-title paroller"
                        style="transform: translateY(-11px) matrix(0, 1, -1, 0, 0, 545.4); transition: transform 0.6s cubic-bezier(0, 0, 0, 1) 0s; will-change: transform;">
                        Cabcon India</div>
                    <div class="img-box1 js-tilt"
                        style="will-change: transform; transform: perspective(700px) rotateX(0deg) rotateY(0deg);">
                        <img src="{{asset($data->section5_image2)}}" alt="">
                        <div class="js-tilt-glare"
                            style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden;">
                            <div class="js-tilt-glare-inner"
                                style="position: absolute; top: 50%; left: 50%; pointer-events: none; background-image: linear-gradient(0deg, rgba(255, 255, 255, 0) 0%, rgb(255, 255, 255) 100%); width: 680px; height: 680px; transform: rotate(180deg) translate(-50%, -50%); transform-origin: 0% 0%; opacity: 0;">
                            </div>
                        </div>
                    </div>
                    <div class="img-box2">
                        <div class="inner">
                            <img src="{{asset($data->section5_image1)}}" alt="">
                        </div>
                    </div>

                    <!-- <div class="overlay-box">
                        <h2>12<span class="flaticon-plus-1">+</span></h2>
                        <h3>Years of<br> Experienced</h3>
                    </div> -->

                    <div class="icon-box">
                        <span class="flaticon-house-with-wooden-roof"></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection