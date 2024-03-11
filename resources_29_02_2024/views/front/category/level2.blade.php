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
                    <li>
                        <a href=""><i class="fa-solid fa-angle-right"></i></a>
                    </li>
                    <li><a href="{{ route('front.category.level1.detail', [$data->categoryDetails->slug]) }}">{{ $data->categoryDetails->title }}</a></li>
                    <li>
                        <a href=""><i class="fa-solid fa-angle-right"></i></a>
                    </li>
                    <li><a href="{{ route('front.category.level2.detail', [$data->categoryDetails->slug, $data->slug]) }}">{{ $data->title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="category-sec1">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-12 col-md-5 top-heading">
                <div class="category-sec1-content">
                    <h2 data-aos="fade-up" data-aos-duration="700">{{ $data->title }}</h2>
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                        {{ $data->long_desc }}
                    </p>
                    {{-- <a href="" class="btnn" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">get a free demo</a> --}}
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

<section class="browse-by-cat">
    <div class="container">
        <div class="row">
            <div class="col-12 top-heading" data-aos="zoom-in" data-aos-duration="700">
                <img src="{{ asset('frontend-assets/images/electric.png') }}" alt="">
                <h2>view all category</h2>
            </div>
        </div>


        <div class="row row-top-mar g-3">
            @foreach ($data->activeChildCategories as $category)
                <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
                    <div class="flip">
                        <div class="front">
                            <img src="{{ asset($category->icon_path_small) }}" alt="" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">

                            <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">{{ $category->title }}</h2>
                        </div>
                        <div class="back">
                            <h4>{{ $category->title }}</h4>
                            <a href="{{ route('front.category.level3.detail', [$data->categoryDetails->slug, $data->slug, $category->slug]) }}" class="btnn">learn more</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat1.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Digital multimeters</h2>
                    </div>
                    <div class="back">
                        <h4>Digital multimeters</h4>
                        <a href="sub-category.php" class="btnn">learn more</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat2.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Basic electrical testers</h2>
                    </div>
                    <div class="back">
                        <h4>Basic electrical testers</h4>
                        <a href="" class="btnn">learn more</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat3.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Clamp meters</h2>
                    </div>
                    <div class="back">
                        <h4>Clamp meters</h4>
                        <a href="" class="btnn">learn more</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat4.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Power quality</h2>
                    </div>
                    <div class="back">
                        <h4>Power quality</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat5.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Earth ground</h2>
                    </div>
                    <div class="back">
                        <h4>Earth ground</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat6.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Installation testers</h2>
                    </div>
                    <div class="back">
                        <h4>Installation testers</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat7.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Intrinsically safe</h2>
                    </div>
                    <div class="back">
                        <h4>Intrinsically safe</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="700" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat8.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Battery analyzers</h2>
                    </div>
                    <div class="back">
                        <h4>Battery analyzers</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="700" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat9.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Portable oscilloscopes</h2>
                    </div>
                    <div class="back">
                        <h4>Portable oscilloscopes</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="700" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat10.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Solar industry tools</h2>
                    </div>
                    <div class="back">
                        <h4>Solar industry tools</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="700" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat11.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Wireless testers</h2>
                    </div>
                    <div class="back">
                        <h4>Wireless testers</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="700" data-aos-duration="700">
                <div class="flip">
                    <div class="front">
                        <img src="images/cat12.webp" alt="" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="700">
                        <h2 class="text-shadow" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                            Insulation testers</h2>
                    </div>
                    <div class="back">
                        <h4>Insulation testers</h4>
                        <a href="" class="btnn">View Product</a>
                    </div>
                </div>

            </div> --}}
        </div>
    </div>
</section>
@endsection