@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')
<section class="inner_banner" style="background: linear-gradient(#0f03400a, #0f0340ef), url({{asset($data->page_banner)}}) no-repeat">
    <div class="container">
        <div class="row">
            <h3>
                {{$data->page_title}}
                <span>
                    <nav class="breadcrumb">
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item_active"><a class="breadcrumb__link">{{$data->page_title}}</a></li>
                        </ul>
                    </nav>
                </span>
            </h3>
        </div>
    </div>
</section>
<section class="abour_sec">
    <div class="sticky-top">
        <div class="row">
            <ul class="ussecontNav">
                <li><a href="#whoweare">Who we are</a></li>
                <li><a href="#howit">How we work</a></li>
                <li><a href="#recognition">Recognition</a></li>
                <li><a href="#vision">Vision & Mission</a></li>
                <li><a href="#why-choose">Why choose us?</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row text-center text-md-start justify-content-between space-top space-extra-bottom">
            <div class="col-md-8 col-xl-6 align-self-center order-1 order-xl-1 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="mb-30 pe-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="mb-2">
                    <span class="sec-subtitle">COMPANY OVERVIEW</span>
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$data->section1_title}}</h2>
                    <p class="pe-xxl-5 fs-md mb-4 pb-xl-2">
                        {{$data->section1_desc}}
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 ms-auto ms-xl-0 col-xl-auto order-2 order-xl-2 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="img-box1 style2 text-end">
                    <div class="img-1 pe-lg-3">
                        <img src="{{$data->section1_image}}" alt="about">
                        <a href="{{$data->section1_video_link}}" class="play-btn popup-video position-center">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                    <div class="shape-dotted jump"></div>
                </div>
            </div>
        </div>
        <div class="row text-center text-md-start justify-content-between space-top space-extra-bottom" id="whoweare">
            <div class="col-md-4 col-lg-4 ms-auto ms-xl-0 col-xl-auto order-2 order-xl-1 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="img-box1 style2 text-end">
                    <div class="img-1 pe-lg-3">
                        <img src="{{$data->section2_image}}" alt="about">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xl-6 align-self-center order-1 order-xl-2 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="mb-30 pe-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="mb-2">
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$data->section2_title}}</h2>
                    <p class="pe-xxl-5 fs-md mb-4 pb-xl-2">
                        {{$data->section2_desc}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row text-center text-md-start justify-content-between space-top space-extra-bottom" id="howit">
            <div class="col-md-8 col-xl-6 align-self-center order-1 order-xl-1 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="mb-30 pe-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="mb-2">
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$data->section3_title}}</h2>
                    <p class="pe-xxl-5 fs-md mb-4 pb-xl-2">
                        {{$data->section3_desc}}
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 order-2 order-xl-2 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="img-box1 style2 text-end">
                    <div class="img-1 pe-lg-3">
                        <img src="{{$data->section3_image}}" alt="about">
                    </div>
                    <div class="shape-dotted jump"></div>
                </div>
            </div>
        </div>
        <div class="row text-center text-md-start justify-content-between space-top space-extra-bottom" id="recognition">
            <div class="col-md-4 col-lg-5 order-2 order-xl-1 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="img-box1 style2 text-end">
                    <div class="img-1 pe-lg-3">
                        <img src="{{$data->section4_image}}" alt="about">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xl-6 align-self-center order-1 order-xl-2 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="mb-30 pe-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="mb-2">
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$data->section4_title}}</h2>
                    <p class="pe-xxl-5 fs-md mb-4 pb-xl-2">
                        {{$data->section4_desc}}
                    </p>
                </div>
            </div>
            
        </div>
        <div class="row text-center text-md-start justify-content-between space-top space-extra-bottom" id="vision">
            <div class="col-md-8 col-xl-6 align-self-center order-1 order-xl-1 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="mb-30 pe-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="mb-2">
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$data->section5_title}}</h2>
                    <p class="pe-xxl-5 fs-md mb-4 pb-xl-2">
                        {{$data->section5_desc}}
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 order-2 order-xl-2 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="img-box1 style2 text-end">
                    <div class="img-1 pe-lg-3">
                        <img src="{{$data->section5_image}}" alt="about">
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row text-center text-md-start justify-content-between space-top space-extra-bottom" id="why-choose">
            <!-- <div class="div1 col-12"> 
                <div class="title-area mb-4 mb-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="wow fadeInDown mb-2 wow-animated" style="visibility: visible;">
                    <h4 class="sec-title h4  wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Why choose us?</h4>
                </div>
                <img src="{{asset('frontend-assets/img/sr-3-1.jpg')}}" class="w-100 wow fadeInLeft wow-animated" style="visibility: visible; animation-name: fadeInLeft;">
            </div> -->
            <div class="col-12 d-flex justify-content-center">
                <div class="title-area text-center mb-5 pb-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="wow fadeInDown mb-3 wow-animated">
                    <h2 class="sec-title h1 wow fadeInUp">Why choose us?</h2>
                </div>
            </div>
            
            <div class="col-12 col-lg-4 mb-4 wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
                <div class="div7">
                    <h4>01</h4>
                    <h5>Authenticity</h5>
                    <p>
                        Cabcon is a certified ISO 9001-2015 company. We are recognized as an established &approved vendor for the supply of Conductors and cables with Power Utilities like PGCIL, NTPC, NHPC, DVC, CESC all State Electricity Transmission and distribution companies
                    </p>
                    <img src="{{asset('frontend-assets/img/sr-2-5.png')}}">
                </div>
                
            </div>
            <div class="col-12 col-lg-4 mb-4 wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;"> 
                <div class="div7">
                    <h4>02</h4>
                    <h5>Our goodwill</h5>
                    <p>
                        We have been awarded by Power Grid Corporation of India Ltd. as the winner, under Category MSME Vendor – Conductors at the Felicitations 2018 ceremony in New Delhi on May 25, 2018, for the supply of Conductors
                    </p>
                    <img src="{{asset('frontend-assets/img/sr-2-5.png')}}">
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="div7">
                    <h4>03</h4>
                    <h5>Our footprint</h5>
                    <p>
                        We serve almost all MNC EPC contractors viz L&T, Bajaj, Kalpataru Power, Godrej, KEC International, etc. in our Country. Not only in the country, we also have our overseas approval in countries like Bangladesh, Kenya, Rwanda, the Philippines, Nepal, etc.
                    </p>
                    <img src="{{asset('frontend-assets/img/sr-2-3.png')}}">
                </div>
                
            </div>
            
            <div class="col-12 col-lg-4 mb-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> 
                <div class="div7">
                    <h4>04</h4>
                    <h5>Modern infrastructure</h5>
                    <p>
                        Cabcon has the best infrastructure such as in-house facilities and high-speed, enhanced plants & machines that help to run and manage the entire team & also manufacture & supply in a smooth & effective manner.
                    </p>
                    <img src="{{asset('frontend-assets/img/sr-2-2.png')}}">
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> 
                <div class="div7">
                    <h4>05</h4>
                    <h5>Services</h5>
                    <p>
                        Cabcon is dedicated to delivering top-notch, innovative, smart & timely services. To fulfil this goal we have integrated bespoke & latest technology, processes & products.
                    </p>
                    <img src="{{asset('frontend-assets/img/sr-2-2.png')}}">
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="div7">
                    <h4>06</h4>
                    <h5>Diversity</h5>
                    <p>
                        We serve multiple sectors in the country along with that we have overseas approval in countries like Bangladesh, Kenya, Rwanda, Philippines, Nepal, etc
                    </p>
                    <img src="{{asset('frontend-assets/img/sr-2-2.png')}}">
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection