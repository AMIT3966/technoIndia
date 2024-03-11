@extends('front.layout.app')

{{-- @section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword) --}}
@section('section')
<section class="inner_banner">
    <div class="container">
        <div class="row">
            <h3>
               {{$Product->title}}
                <span>
                    <nav class="breadcrumb">
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{asset('')}}">Home</a></li>
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">  {{$Product->categoryDetails->title}}</a></li>
                            <li class="breadcrumb__item breadcrumb__item_active"><a class="breadcrumb__link"> {{$Product->title}}</a></li>
                        </ul>
                    </nav>
                </span>
            </h3>
        </div>
    </div>
</section>

<section class="product_details">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-5 col-md-6">
                <img src="{{asset($Product->image)}}" id="js-logo">
            </div>
            <div class="col-12 col-lg-7 col-md-6 prod_content_sec">
                <div class="mb-30">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="mb-3">
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$Product->title}}</h2>
                    {!!$Product->description!!}
                    {{-- <p class="fs-md mb-4 pb-xl-2">
                        Aluminium Alloy (Al -Si -Mg) wire rod is available in 6101 & 6201 Grade and Mechanical Alloy wire rod in 6061 & 6063 grade. It is available in sizes 7.60 mm, 9.50 mm or 12.00 mm diameter with online solution treated in T4 and T6 temper. It is having a minimum 51.00 % IACS conductivity, Tensile Strength of about 14 kg/Sqmm and minimum elongation of 12%. High conductivity Alloy conductor Al -59 & Al -57 are also manufactured from 6000 series Alloy wire rod. Alloy wire Rod is normally used in various specifications of All Aluminium Alloy conductors and in AB Cable(as messenger).
                    </p>
                    <h6>Features:</h6>
                    <ol>
                        <li>They are inherently lightweight, offering a favourable strength-to-weight ratio.</li>
                        <li>They possess excellent corrosion resistant properties.</li>
                        <li>Its exhibits good performance across broad range of temperatures.</li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="prodt">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-6 col-md-6">
                <h3> We Transform Lives 
                </h3>
                <div class="tab-slider--nav">
                    <ul class="tab-slider--tabs">
                        @if(count($Product->ServiceDetails)>0)
                            @foreach ($Product->ServiceDetails as $key => $item)
                                <li class="tab-slider--trigger {{$key==0?"active":""}}"  rel="tab{{$item->id}}">{{$item->title}}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="tab-slider--container">
                    @if(count($Product->ServiceDetails)>0)
                        @foreach ($Product->ServiceDetails as $item)
                            <div id="tab{{$item->id}}" class="tab-slider--body">
                                <p>
                                  {{$item->description}}
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="button_sec">
                    <a href="" class="vs-btn vs-btn style4"><i class="fal fa-phone-alt me-2"></i> Get in touch </a>
                </div>
            </div>
            <div class="col-12 col-lg-5 col-md-6 text-center">
                <img src="{{asset($Product->image)}}" class="w-100">
            </div>
        </div>
    </div>
</section>

<section class="vs-blog-wrapper space-extra-bottom pt-5 mt-5">
    {{-- <div class="container">
        <div class="title-area text-center wow fadeInUp" data-wow-delay="0.3s">
            <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo">
            <h2 class="sec-title h1 mt-3">Other Product Variants </h2>
        </div>
        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.4s" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true" data-sm-center-mode="true">
            <div class="col-xl-4">
                <div class="project-style1 layout3">
                    <div class="project-img p-3 bg-light-2" style="height:350px;">
                        <a href="project-details.html">
                            <img src="frontend-assets/img/wirerod.png" alt="project image w-100">
                        </a>
                    </div>
                    <div class="project-content">
                        <div class="project-body">
                            <span class="project-category">Aluminium Wire Rod (EC Grade)</span>
                            <h3 class="project-title h4">
                                <a href="project-details.html" class="text-inherit">We specialise in EC grade Aluminium rods that are available in different sizes, 7.60mm, 9.50mm or 12.00mm diameters.</a>
                            </h3>
                            <div class="blog-meta d-flex justify-content-between">
                                <a href="blog.html" tabindex="0" class="project-energytotal">
                                   Read More...
                                </a>
                            </div>
                        </div>
                        <div class="shape-dotted"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="project-style1 layout3">
                    <div class="project-img p-3 bg-light-2" style="height:350px;">
                        <a href="project-details.html">
                            <img src="frontend-assets/img/wirerod.png" alt="project image w-100">
                        </a>
                    </div>
                    <div class="project-content">
                        <div class="project-body">
                            <span class="project-category">Aluminium Flip Wire Rods </span>
                            <h3 class="project-title h4">
                                <a href="project-details.html" class="text-inherit">Flip Wire Rods are commercial Grade Aluminium wire rods available in sizes 9.50 mm, 12mm or 13mm diameter.</a>
                            </h3>
                            <div class="blog-meta d-flex justify-content-between">
                                <a href="blog.html" tabindex="0" class="project-energytotal">
                                   Read More...
                                </a>
                            </div>
                        </div>
                        <div class="shape-dotted"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>

@endsection