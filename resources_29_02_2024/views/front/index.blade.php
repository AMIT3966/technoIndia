@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')

<section class="hero-layout3">
    <div class="vs-hero-carousel" data-height="710" data-container="1900" data-slidertype="responsive">
        @foreach($data->banners as $bannerKey => $banner)
        <div class="ls-slide" data-ls="duration:12000; transition2d:5; kenburnsscale:1.2;">
            <img width="1920" height="709" src="{{ asset($banner->image_large) }}" class="ls-bg" alt="hero bg">

            @if ($bannerKey == 0)
            <div style="text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; color:#ffffff; left:315px; top:618px; line-height:0px; z-index:200;" class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer" data-ls="static:forever;">
                <div class="d-none d-xxl-block">
                    @foreach ($data->banners as $bannerSingle)
                    <button class="ls-custom-dot ls-dots1 style2">
                        <span class="ls-dot-shape"></span>
                    </button>
                    @endforeach
                </div>
            </div>
            @endif

            <h1 style="font-size:50px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; background-position:0% 0%; background-repeat:no-repeat; font-family:Epilogue; left:312px; top:185px; letter-spacing:-0.5px; font-weight:700; color:#000000;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:-100; durationin:1500; easingin:easeOutQuint; offsetxout:-100; durationout:1500;">{{ $banner->title1 }}</h1>
            <h1 style="font-size:50px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; background-position:0% 0%; background-repeat:no-repeat; font-family:Epilogue; left:312px; top:250px; letter-spacing:-0.5px; font-weight:700; color:#000000;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:-100; durationin:1500; delayin:400; easingin:easeOutQuint; offsetxout:-100; durationout:1500;">{{ $banner->title2 }}</h1>
            <div style="font-size:20px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; font-family:Epilogue; left:315px; top:340px; line-height:32px; color:#000000;" class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer" data-ls="offsetxin:-80; delayin:900; easingin:easeOutQuint; offsetxout:-80; easingout:easeOutQuint;">
                {{ $banner->description }}
            </div>
            <div style="font-size:36px; color:#000; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; left:315px; top:465px;" class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer" data-ls="offsetxin:-100; delayin:1100; easingin:easeOutQuint; offsetxout:-100; easingout:easeOutQuint; bgcolorout:transparent; colorout:transparent;">
                <div class="ls-btn-group">
                    <a href="{{ $banner->btn1_link }}" class="vs-btn vs-btn style4">{{ $banner->btn1_text }}</a>
                    <a href="{{ $banner->btn2_link }}" class="vs-btn vs-btn style4">{{ $banner->btn2_text }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row text-center text-md-start justify-content-between">
            <div class="col-md-8 col-xl-6 align-self-center order-1 order-xl-1 wow fadeInUp" data-wow-delay="0.3s">
                <div class="mb-30 pe-lg-5">
                    <img src="{{ asset('frontend-assets/img/title_logo.png') }}" alt="title logo" class="mb-2">
                    <span class="sec-subtitle">COMPANY OVERVIEW</span>
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$data->ContentHome['title1']}}</h2>
                    <p class="pe-xxl-5 fs-md mb-4 pb-xl-2">
                        {{$data->ContentHome['title1_desc']}}
                        
                    </p>
                    <p class="mb-1 text-dark" style="font-style: italic;"><b>{{$data->ContentHome['title1_author']}}</b></p>
                    <p class="text-title fs-xs mb-4">{{$data->ContentHome['title1_author_designation']}}</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 ms-auto ms-xl-0 col-xl-auto order-2 order-xl-2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="img-box1 style2 text-end">
                    <div class="img-1 pe-lg-3">
                        <img src="{{ asset($data->ContentHome['title1_image']) }}" alt="about">
                        <a href="{{ asset($data->ContentHome['title1_video']) }}" class="play-btn popup-video position-center">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                    <div class="shape-dotted jump"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space-bottom">
    <div class="container-fluid ps-lg-5 pe-lg-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="title-area">
                    <img src="{{ asset('frontend-assets/img/title_logo.png') }}" alt="title logo">
                    <span class="sec-subtitle">WHAT WE OFFER</span>
                    <h2 class="sec-title h1">Our Best Services</h2>
                </div>
            </div>
        </div>
        <div class="row gx-2 gy-2 wow fadeInUp" data-wow-delay="0.4s">
            <div class="cont s--inactive">
                <div class="cont__inner">
                  <div class="el">
                    <div class="el__overflow">
                      <div class="el__inner">
                        <div class="el__bg"></div>
                        <div class="el__preview-cont">
                          <h2 class="el__heading">Conductor Services</h2>
                        </div>
                        <div class="el__content">
                          <div class="el__text">
                            Conductor Services
                            <p>ACSR conductors are made up of concentrically stranded conductor with single or multiple layers of hard drawn aluminium wire on galvanized steel wire core which are coated with zinc of Class A / Class</p>
                            <a href="product.html#pro1">View More</a>
                          </div>
                          <div class="el__close-btn"></div>
                        </div>
                      </div>
                    </div>
                    <div class="el__index">
                      <div class="el__index-back"><img src="{{ asset('frontend-assets/img/cab_s2.png') }}"></div>
                      <div class="el__index-front">
                        <div class="el__index-overlay"><img src="{{ asset('frontend-assets/img/cab_s1.png') }}"></div>
                      </div>
                    </div>
                  </div>
                  <!-- el end -->
                  <!-- el start -->
                  <div class="el">
                    <div class="el__overflow">
                      <div class="el__inner">
                        <div class="el__bg"></div>
                        <div class="el__preview-cont">
                          <h2 class="el__heading">Cable Services</h2>
                        </div>
                        <div class="el__content">
                          <div class="el__text">Cable Services
                            <p>
                                Ariel Bunched Cables or ABC, as it is popularly known, is a distribution cable manufactured with multiple cores bunched together with Neutral cum messenger with or without street light conductor.
                            </p>
                            <a href="product.html#pro2">View More</a>
                          </div>
                          <div class="el__close-btn"></div>
                        </div>
                      </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back"><img src="{{ asset('frontend-assets/img/cab_s2.png') }}"></div>
                        <div class="el__index-front">
                          <div class="el__index-overlay"><img src="{{ asset('frontend-assets/img/cab_s1.png') }}"></div>
                        </div>
                      </div>
                  </div>
                  <!-- el end -->
                  <!-- el start -->
                  <div class="el">
                    <div class="el__overflow">
                      <div class="el__inner">
                        <div class="el__bg"></div>
                        <div class="el__preview-cont">
                          <h2 class="el__heading">Wire Rod</h2>
                        </div>
                        <div class="el__content">
                          <div class="el__text">Wire Rod
                            <p>
                                EC grade Aluminium Wire Rod is available in sizes 7.60mm, 9.50mm or 12.00mm diameter having Electrical conductivity of minimum 61% IACS, tensile Strength between 8.50 to 13.60 Kg/Sq mm and elongation of 10 to 14%.
                            </p>
                            <a href="product.html#pro3">View More</a>
                          </div>
                          <div class="el__close-btn"></div>
                        </div>
                      </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back"><img src="{{ asset('frontend-assets/img/cab_s2.png') }}"></div>
                        <div class="el__index-front">
                          <div class="el__index-overlay"><img src="{{ asset('frontend-assets/img/cab_s1.png') }}"></div>
                        </div>
                    </div>
                  </div>
                  <!-- el end -->
                  <!-- el start -->
                  <div class="el">
                    <div class="el__overflow">
                      <div class="el__inner">
                        <div class="el__bg"></div>
                        <div class="el__preview-cont">
                          <h2 class="el__heading">Binding Wire</h2>
                        </div>
                        <div class="el__content">
                          <div class="el__text">Binding Wire
                            <p>
                                EC grade Aluminium Wire Rod is available in sizes 7.60mm, 9.50mm or 12.00mm diameter having Electrical conductivity of minimum 61% IACS, tensile Strength between 8.50 to 13.60 Kg/Sq mm and elongation of 10 to 14%.
                            </p>
                            <a href="">View More</a>
                          </div>
                          <div class="el__close-btn"></div>
                        </div>
                      </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back"><img src="{{ asset('frontend-assets/img/cab_s2.png') }}"></div>
                        <div class="el__index-front">
                          <div class="el__index-overlay"><img src="{{ asset('frontend-assets/img/cab_s1.png') }}"></div>
                        </div>
                    </div>
                  </div>
                  <!-- el end -->
                  <!-- el start -->
                  <div class="el">
                    <div class="el__overflow">
                      <div class="el__inner">
                        <div class="el__bg"></div>
                        <div class="el__preview-cont">
                          <h2 class="el__heading">EPC Services</h2>
                        </div>
                        <div class="el__content">
                          <div class="el__text">EPC Services
                            <p>
                                As a continuous effort to grow and expand, we diversified our business in power sector by getting into EPC services which includes designing, engineering, supply, execution and commissioning of power distribution and rural electrification projects.
                            </p>
                            <a href="">View More</a>
                          </div>
                          <div class="el__close-btn"></div>
                        </div>
                      </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back"><img src="{{ asset('frontend-assets/img/cab_s2.png') }}"></div>
                        <div class="el__index-front">
                          <div class="el__index-overlay"><img src="{{ asset('frontend-assets/img/cab_s1.png') }}"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</section>

<section class="space-extra-bottom Timeline_sec pb-0">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="title-area">
                    <img src="frontend-assets/img/title_logo.png" alt="title logo">
                    <span class="sec-subtitle">COMPANY OVERVIEW</span>
                    <h2 class="sec-title h1">Building the Nation</h2>
                </div>
            </div>
        </div>
        <div class="timeline">
          <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($data->NationProduct as $NationProduct)
                <div class="swiper-slide" data-year="{{$NationProduct->name}}">
                    <div class="swiper-slide-content">
                        <div class="row justify-content-between w-100">
                            <div class="col-12 col-md-5 col-lg-4">
                                <h4 class="timeline-title">{{$NationProduct->title}}</h4>
                                <p class="timeline-text">{{$NationProduct->long_desc}}</p>
                            </div>
                            <div class="col-12 col-md-7 col-lg-6 ani_product">
                                <div class="card border-0">
                                    <img src="{{asset('frontend-assets/img/power-tab-img.png')}}">
                                    <ul>
                                        <li>
                                            <span>Production Volume (FY'22)</span>
                                            {{$NationProduct->production_volume}}
                                           
                                        </li>
                                        <li>
                                            <span>Applications</span>
                                            {{$NationProduct->application_desc}}
                                           
                                        </li>
                                        <li>
                                            <span>Product Portfolio</span>
                                            {{$NationProduct->product_portfolio}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
</section>

<section class="space-top">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-xxl-8 z-index-common wow fadeInUp" data-wow-delay="0.3s">
                <div class="row gx-0 justify-content-center justify-content-xl-start">
                    <div class="col-md-7 col-lg-7 col-xxl-8 text-center text-xl-start">
                        <span class="sec-subtitle">WHY CHOOSE US</span>
                        <h2 class="sec-title h1 mb-4 pb-2"> {{$data->ContentHome['why_choose_us_title']}}</h2>
                    </div>
                    <div class="col-md-6 feature-style2">
                        <div class="feature-body">
                            <div class="feature-icon">
                                <img src="{{asset($data->ContentHome['why_choose_us_section1_image'])}}" alt="icon">
                            </div>
                            <h3 class="feature-title h6"> {{$data->ContentHome['why_choose_us_section1_title']}}</h3>
                            <p class="feature-text">{{$data->ContentHome['why_choose_us_section1_desc']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 feature-style2">
                        <div class="feature-body">
                            <div class="feature-icon">
                                <img src="{{asset($data->ContentHome['why_choose_us_section2_image'])}}" alt="icon">
                            </div>
                            <h3 class="feature-title h6">{{$data->ContentHome['why_choose_us_section2_title']}}</h3>
                            <p class="feature-text">{{$data->ContentHome['why_choose_us_section2_desc']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 feature-style2">
                        <div class="feature-body">
                            <div class="feature-icon">
                                <img src="{{asset($data->ContentHome['why_choose_us_section3_image'])}}" alt="icon">
                            </div>
                            <h3 class="feature-title h6">{{$data->ContentHome['why_choose_us_section3_title']}}</h3>
                            <p class="feature-text">{{$data->ContentHome['why_choose_us_section3_desc']}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 feature-style2">
                        <div class="feature-body">
                            <div class="feature-icon">
                                <img src="{{asset($data->ContentHome['why_choose_us_section4_image'])}}" alt="icon">
                            </div>
                            <h3 class="feature-title h6">{{$data->ContentHome['why_choose_us_section4_title']}}</h3>
                            <p class="feature-text">{{$data->ContentHome['why_choose_us_section4_desc']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4 pt-5 pt-xl-0 wow fadeInUp" data-wow-delay="0.4s">
                <div class="img-box5">
                    <div class="img-1">
                        <img src="{{asset($data->ContentHome['why_choose_us_image'])}}" alt="thumbnail">
                        <div class="shape-dotted jump"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="vs-blog-wrapper pt-lg-5 mt-lg-5 pt-4 space-extra-bottom">
    <div class="container">
        <div class="title-area text-center wow fadeInUp" data-wow-delay="0.3s">
            <img src="frontend-assets/img/title_logo.png" alt="title logo">
            <span class="sec-subtitle">OUR CLIENTS</span>
            <h2 class="sec-title h1">Partners</h2>
        </div>
        <ul class="partner">
            @foreach ($data->Partner as $Partner)
            <li><img src="{{asset($Partner->image)}}"></li>
            @endforeach
            <li><a href="">View More...</a></li>
        </ul>
    </div>
</section>

<section class="stat-section"> 
    <div class="container">
        <div class="row align-items-end h-100">
            <ul id="counter">
                <li>
                  <span class="count percent" data-count="{{$data->ContentHome['project_completed']}}">
                  
                  </span>
                  PROJECT COMPLETED
                </li>
                <li>
                  <span class="count percent" data-count="{{$data->ContentHome['happy_customer']}}">
                  
                  </span>
                  HAPPY CUSTOMERS
                </li>
                <li>
                  <span class="count percent" data-count="{{$data->ContentHome['solar_panels']}}">
                  
                  </span>
                  SOLAR PANELS
                </li>
                <li>
                    <span class="count percent" data-count=" {{$data->ContentHome['distributors']}}">
                       
                    </span>
                    DISTRIBUTORS
                </li>
              </ul>
        </div>
    </div>
</section>

<section class="vs-blog-wrapper space-extra-bottom">
    <div class="container">
        <div class="title-area text-center wow fadeInUp" data-wow-delay="0.3s">
            <img src="frontend-assets/img/title_logo.png" alt="title logo">
            <span class="sec-subtitle">BLOG AND UPDATES</span>
            <h2 class="sec-title h1">Recent News</h2>
        </div>
        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.4s" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true" data-sm-center-mode="true">
            @foreach ($data->News as $news)
                <div class="col-xl-4">
                    <div class="project-style1 layout3">
                        <div class="project-img">
                            <a href="{{route('front.news.details', $news->slug)}}">
                                <img src="{{asset($news->image)}}" alt="project image">
                            </a>
                        </div>
                        <div class="project-content">
                            <div class="project-body">
                                <span class="project-category">{{$news->category->name}}</span>
                                <h3 class="project-title h4">
                                    <a href="{{route('front.news.details', $news->slug)}}" class="text-inherit">{{$news->title}}</a>
                                </h3>
                                <div class="blog-meta d-flex justify-content-between">
                                    <a href="#" tabindex="0" class="project-energytotal">
                                        <i class="fal fa-comment-lines"></i>
                                        89 Comments
                                    </a>
                                    <a href="#" tabindex="0" class="project-energytotal">
                                        <i class="fas fa-eye"></i>
                                        31k Views
                                    </a>
                                </div>
                            </div>
                            <div class="shape-dotted"></div>
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
    </div>
</section>

<section class="vs-blog-wrappermt-lg-5 pt-4 space-extra-bottom">
    <div class="container">
        <div class="title-area text-center wow fadeInUp" data-wow-delay="0.3s">
            <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="">
            <h2 class="sec-title h1">OUR Certificate</h2>
        </div>
        <ul class="partner">
            @foreach ($data->Certificate as $certificate)
                <li><img src="{{asset($certificate->image)}}"></li>
            @endforeach
            <li><a href="{{route('front.certificate.list')}}">View More...</a></li>
        </ul>
    </div>
</section>



@endsection