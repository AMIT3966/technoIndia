@extends('front.layout.app')

@section('page-title', $data->page_title)
@section('meta-title', $data->meta_title)
@section('meta-description', $data->meta_desc)
@section('meta-keywords', $data->meta_keyword)

@section('section')
<div class="inner-banner fluke-banner"
style="background: linear-gradient(#0f03400a, #0f0340ef), url({{ asset($data->banner_image_path_medium) }}) no-repeat;background-size: cover;
background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0">{{ $data->title }}</h1>
                <ul class="list-unstyled p-0 m-0">
                    <li><a href="{{ route('front.home') }}"><i class="fa-solid fa-house-user"></i> home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="{{ route('front.category.level1.detail', $data->slug) }}"> {{ $data->title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="browse-by-cat">
    <div class="container">
        <div class="row">
            <div class="col-12 top-heading" data-aos="zoom-in" data-aos-duration="700">
                <h2 class="inner_banner_title">{{ $data->title }}</h2>
            </div>
        </div>

        @if ($data->activeChildCategories)
        <div class="row row-top-mar g-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
            @foreach ($data->activeChildCategories as $item)
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="flip">
                        <div class="front">
                            <img src="{{ asset($item->icon_path_small) }}" alt="">
                            <h2 class="text-shadow">{{ $item->title }}</h2>
                        </div>
                        <div class="back">
                            <h4>{{ $item->title }}</h4>
                            <a href="{{ route('front.category.level2.detail', [$data->slug, $item->slug]) }}" class="btnn">learn more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection