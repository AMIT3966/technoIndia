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
                {{$outputString}}
                <span>
                    <nav class="breadcrumb">
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{asset('')}}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item_active"><a class="breadcrumb__link">{{$outputString}}</a></li>
                        </ul>
                    </nav>
                </span>
            </h3>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row m-0 justify-content-between align-items-center py-4 py-lg-5">
            <div class="col-12 col-lg-5">
                <div class="mb-30 pe-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="mb-3">
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$outputString}}</h2>
                    <p class="fs-md mb-4 pb-xl-2">
                        Cabcon through its sister concern, namely Shreyash Aluminium and Alloys Pvt Ltd, specializes in production of high quality Aluminium and Alloy Wire Rods. This is made possible as we utilize state of the art properzi mill with cutting edge technology to meet the stringent industry standards. The market acclaim for our Wire Rods is further reinforced with approval from Power Grid Corporation of India Limited (PGCIL), a testament to the product's reliability and adherence to industry benchmarks.
                    </p>
                </div>
            </div>
            <div class="col-lg-7 col-md-8 col-12 product_list">
                <div class="body-content">
                    <!-- Option: data-autoplay, data-speed -->
                    <div class="timeline_product" data-autoplay="5000" data-speed="700">
                        <!-- Swiper timeline -->
                        <div class="swiper-container timeline-dates">
                            <div class="swiper-wrapper">
                                @foreach ($products as $item)
                                    <div class="swiper-slide"><div>{{$item->title}}</div></div>
                                @endforeach
                                {{-- <div class="swiper-slide"><div>Aluminium Alloy Wire Rod</div></div>
                                <div class="swiper-slide"><div>Aluminium Flipped Wire Rod</div></div> --}}
                            </div>
                            <!-- Add Arrows -->
                            <div class="timeline-buttons-container">
                                <div class="timeline-button-next"></div>
                                <div class="timeline-button-prev"></div>
                            </div>
                        </div>
                        
                        <div class="swiper-container timeline-contents">
                            <div class="swiper-wrapper product_slider">
                                @foreach ($products as $item)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="row g-0 align-items-center">
                                            <div class="col-md-6">
                                                <img src="{{asset($item->image)}}">
                                            </div>
                                            @php
                                                 $cat_slug = Str::slug($item->categoryDetails->title);
                                            @endphp
                                            <div class="col-md-6">
                                                <div class="card-body">
                                                <h4 class="card-title">{{$item->title}}</h4>
                                                <p class="card-text">{!!$item->description!!}</p>
                                                    <a href="{{route('front.wire.product.details', [$cat_slug, $item->slug])}}">Read More...</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="swiper-slide">
                                    <div class="card">
                                        <div class="row g-0 align-items-center">
                                          <div class="col-md-6">
                                            <img src="{{asset('frontend-assets/img/wirerod.png')}}">
                                          </div>
                                          <div class="col-md-6">
                                            <div class="card-body">
                                              <h4 class="card-title">Aluminium Alloy Wire Rod</h4>
                                              <p class="card-text">Aluminium Alloy (Al -Si -Mg) wire rod is available in 6101 & 6201 Grade and Mechanical Alloy wire rod in 6061 & 6063 grade.</p>
                                                <a href="aluminium-alloy-wire-rod.html">Read More...</a>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="row g-0 align-items-center">
                                          <div class="col-md-6">
                                            <img src="{{asset('frontend-assets/img/wirerod.png')}}">
                                          </div>
                                          <div class="col-md-6">
                                            <div class="card-body">
                                              <h4 class="card-title">Aluminium Flip Wire Rod</h4>
                                              <p class="card-text">Flip Wire Rods are commercial Grade Aluminium wire rods available in sizes 9.50 mm, 12mm or 13mm diameter.</p>
                                                <a href="aluminium-flip-wire-rod.html">Read More...</a>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="uspDiv position-relative">
    <div class="container">
        <div class="row m-0 justify-content-between">
            <div class="col-12 col-lg-6 col-md-7">
                <div class="title-area mb-4 mb-lg-5">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="wow fadeInDown mb-2">
                    <span class="sec-subtitle wow fadeInUp">Let the Quality Speak </span>
                    <h4 class="sec-title h4  wow fadeInUp">We Wire the Best </h4>
                </div>
                <div>
                    <h5>Trust above All</h5>
                    <p><small>
                        Our client list includes almost all government and private organisations in India, making us a trustworthy manufacturing company of conductors, wire rods, cables and many more in the country.
                    </small></p>
                </div>
                <div>
                    <h5>Higher Production </h5>
                    <p><small>
                        The impeccable quality of our products ensures smooth operations and boosts production levels. The years of experience in this field replicate through our products and services that sell. 
                    </small></p>
                </div>
                <div>
                    <h5>Technology takes over</h5>
                    <p><small>
                        We have full control over the manufacturing and testing process through our state-of-the-art in-house infrastructure. The latest technology we use at our facilities to ensure higher efficiency. 
                    </small></p>
                </div>
                <div>
                    <h5>Unmatched Expertise </h5>
                    <p><small>
                        Starting from 1993, CABCON only got bigger with time, solely based on our expertise, dedication and hard work. We offer end-to-end manufacturing solutions all over India and other countries too. 
                    </small></p>
                </div>
            </div>
            <div class="col-12 col-lg-5 col-md-5">
                <img src="{{asset('frontend-assets/img/wire-rod.jpg')}}" class="w-100  wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            </div>
        </div>
    </div>
</section>

<section class="stat-section stat-sectionInner mb-0"> 
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
                    <span class="count percent" data-count="{{$data->ContentHome['distributors']}}">
                     
                    </span>
                    DISTRIBUTORS
                </li>
              </ul>
        </div>
    </div>
</section>

@endsection