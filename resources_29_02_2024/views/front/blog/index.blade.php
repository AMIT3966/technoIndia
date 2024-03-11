@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')
<div class="inner-banner about-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0">Our Blogs</h1>
                <ul class="list-unstyled p-0 m-0">
                    <li><a href="{{ route('front.home') }}"><i class="fa-solid fa-house-user"></i> home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="{{ route('front.blog.index') }}">blogs</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="py-5 blog-grid">
    <div class="container">
        <div class="row justify-content-end">
            <div class="mb-5 col-12 col-lg-3">
                <div class="input-group">
                    <label class="input-group-text bg-transparent border-0" for="inputGroupSelect01"><b>Filter By :</b> </label>
                    <select class="form-select" id="inputGroupSelect01">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($data as $blog)
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <img class="w-100" src="{{ asset($blog->image_medium) }}" alt="" />
                    <div class="card-body pt-2">
                        <div class="d-flex justify-content-between py-2">
                            @if ($blog->featured == 1)
                                <span class="badge">featured</span>
                            @endif
                            {{-- <span class="badge">21<sup>st</sup> Mar, 23</span> --}}
                            <span class="badge">
                                {{ date('j', strtotime($blog->created_at)) }}<sup>{{ date('S', strtotime($blog->created_at)) }}</sup>
                                {{ date('M, y', strtotime($blog->created_at)) }}
                            </span>
                        </div>
                        <a href="{{ route('front.blog.detail', $blog->slug) }}">
                            <h3>{{ $blog->title }}</h3>
                        </a>
                        <p>{{ $blog->short_desc }}</p>
                        <span><a href="{{ route('front.blog.detail', $blog->slug) }}" class="d-block">Read More...</a></span>
                    </div>
                </div>
            </div>   
            @endforeach
        </div>
    </div>
</section>
@endsection