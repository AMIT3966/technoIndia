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
                Our Certificates            
                <span>
                    <nav class="breadcrumb">
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{asset('')}}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item_active"><a class="breadcrumb__link">Certificates</a></li>
                        </ul>
                    </nav>
                </span>
            </h3>
        </div>
    </div>
</section>

<section class="vs-blog-wrapper pt-lg-5 mt-lg-5 pt-4 space-extra-bottom">
    <div class="container">
        <ul class="partner">
            @foreach ($Certificates as $item)
            <li><img src="{{asset($item->image)}}"></li>
            @endforeach
        </ul>
    </div>
</section>
@endsection