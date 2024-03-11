@extends('front.layout.app')

@section('page-title', $data->page_title)
@section('meta-title', $data->meta_title)
@section('meta-description', $data->meta_desc)
@section('meta-keywords', $data->meta_keyword)

@section('section')
<div class="inner-banner-product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled p-0 m-0">
                    <li><a href="{{ route('front.home') }}">home</a></li>
                    <li><a href=""><i class="fa-solid fa-angle-right"></i></a></li>

                    <li><a href="{{ route('front.category.level1.detail', [$data->categoryDetails->categoryDetails->slug]) }}">{{ $data->categoryDetails->categoryDetails->title }}</a></li>
                    <li><a href=""><i class="fa-solid fa-angle-right"></i></a></li>

                    <li><a href="{{ route('front.category.level2.detail', [$data->categoryDetails->categoryDetails->slug, $data->categoryDetails->slug]) }}">{{ $data->categoryDetails->title }}</a></li>

                    <li><a href=""><i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="{{ route('front.category.level3.detail', [$data->categoryDetails->categoryDetails->slug, $data->categoryDetails->slug, $data->slug]) }}">{{ $data->title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="category-sec1 sub-cat-sec1">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-12 col-md-5 top-heading">
                <div class="category-sec1-content">
                    {{-- <span data-aos="fade-up" data-aos-duration="700">Electrical testers</span> --}}
                    <h2 data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">{{ $data->title }}</h2>
                    <p class="para" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                        {{ $data->long_desc }}
                    </p>
                    <a href="javascript:void(0)" class="btnn" id="read_more" data-aos="fade-up" data-aos-duration="700">read more</a>
                </div>
            </div>
            <div class="col-12 col-md-7" data-aos="slide-left" data-aos-duration="700">
                <div class="category-sec1-img">
                    <img src="{{ asset($data->banner_image_path_large) }}" alt="" class="" />
                </div>
            </div>
        </div>
    </div>
</section>

@if (count($data->productDetailsFrontend) > 0)
<section class="sub-cat-product">
    <div class="container">
        <div class="row">
            <div class="col-12 top-heading" data-aos="zoom-in" data-aos-duration="700">
                <img src="{{ asset($data->icon_path_medium) }}" alt="">
                <h2>view products</h2>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="sub-cat-tabs">
                    <ul class="list-unstyled p-0 m-0">
                        <li class="sub-cat-tab active" data-tab="products">products ({{count($data->productDetailsFrontend)}})</li>
                        <li class="sub-cat-tab" data-tab="kits">kits ({{count($data->kitDetailsFrontend)}})</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 sub-cat-content active" data-content="products">
                <div class="row g-4">

                    @foreach ($data->productDetailsFrontend as $product)
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="sub-cat-content-inner">
                            <div class="sub-cat-content-img">
                                {{-- {{dd($product->imageDetails)}} --}}
                                @if (!empty($product->imageDetails) && count($product->imageDetails) > 0)
                                    <img src="{{ asset($product->imageDetails[0]->img_medium) }}" alt="" class="img-fluid">
                                @endif
                            </div>
                            <div class="sub-cat-content-info">
                                <h4>{{ $product->title }}</h4>
                                <p>{{ $product->short_description }}</p>
                                <a href="{{ route('front.product.detail', $product->slug) }}" class="btnn">view product</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-12 sub-cat-content" data-content="kits">
                <div class="row">

                    @foreach ($data->kitDetailsFrontend as $product)
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="sub-cat-content-inner">
                            <div class="sub-cat-content-img">
                                {{-- {{dd($product->imageDetails)}} --}}
                                @if (!empty($product->imageDetails) && count($product->imageDetails) > 0)
                                    <img src="{{ asset($product->imageDetails[0]->img_medium) }}" alt="" class="img-fluid">
                                @endif
                            </div>
                            <div class="sub-cat-content-info">
                                <h4>{{ $product->title }}</h4>
                                <p>{{ $product->short_description }}</p>
                                <a href="{{ route('front.product.detail', $product->slug) }}" class="btnn">view product</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>
@endif
@endsection