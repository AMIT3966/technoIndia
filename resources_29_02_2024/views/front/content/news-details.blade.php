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
               {{$news->title}}
                <span>
                    <nav class="breadcrumb">
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{asset('')}}">Home</a></li>
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">  {{$news->category->name}}</a></li>
                            <li class="breadcrumb__item breadcrumb__item_active"><a class="breadcrumb__link"> {{$news->title}}</a></li>
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
                <img src="{{asset($news->image)}}" id="js-logo">
            </div>
            <div class="col-12 col-lg-7 col-md-6 prod_content_sec">
                <div class="mb-30">
                    <img src="{{asset('frontend-assets/img/title_logo.png')}}" alt="title logo" class="mb-3">
                    <h2 class="sec-title h1 mb-3 mb-lg-4">{{$news->title}}</h2>
                    {!!$news->desc!!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection