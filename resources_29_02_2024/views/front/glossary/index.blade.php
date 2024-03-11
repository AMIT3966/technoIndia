@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')
<div class="inner-banner glossary-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0">glossary</h1>
                <ul class="list-unstyled p-0 m-0">
                    <li><a href="{{ route('front.home') }}"><i class="fa-solid fa-house-user"></i> home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="{{ route('front.glossary.index') }}">glossary</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="faq">
    <div class="container">
        <div class="row g-4">

            <div class="col-12 col-lg-9 col-md-10 m-auto">
                <div class="faq-right">
                    <div class="faq-accordion-content">

                        @foreach ($categories as $index => $category)
                        <div class="faq-accordion show-accor">
                            <div class="faq-accordion-top">
                                <h4 class="mb-0">{{$index + 1}}. {{ $category->title }}</h4>
                                <iconify-icon icon="uil:angle-down"></iconify-icon>
                            </div>

                            <div class="faq-accordion-btm">
                                <ul class="list-unstyled p-0 m-0">
                                    @php
                                        $products = catLeveltoProducts($category->id);
                                    @endphp

                                    @foreach ($products as $product)
                                        <li><a href="{{ route('front.product.detail', $product->slug) }}">{{ $product->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="faq-accordion show-accor">
                            <div class="faq-accordion-top">
                                <h4 class="mb-0">02. fluke brand 2</h4>
                                <iconify-icon icon="uil:angle-down"></iconify-icon>
                            </div>
                            <div class="faq-accordion-btm">
                                <ul class="list-unstyled p-0 m-0">
                                    <li><a href="">Fluke 87V Industrial Multimeter</a></li>
                                    <li><a href="">Fluke 117 Electrician's Multimeter with Non-Contact Voltage</a>
                                    </li>
                                    <li><a href="">Fluke 179 True-RMS Digital Multimeter</a></li>
                                    <li><a href="">Fluke 115 Field Technicians Digital Multimeter</a></li>
                                    <li><a href="">Fluke 177 True-RMS Digital Multimeter</a></li>
                                    <li><a href="">Fluke 289 True-RMS Data Logging Multimeter</a></li>
                                    <li><a href="">Fluke 28 II Rugged Digital Multimeter</a></li>
                                    <li><a href="">Fluke 116 Digital HVAC Multimeter</a></li>
                                    <li><a href="">Fluke 287 True-RMS Electronics Logging Multimeter</a></li>
                                    <li><a href="">Fluke 114 Electrical Multimeter</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="faq-accordion show-accor">
                            <div class="faq-accordion-top">
                                <h4 class="mb-0">03. fluke brand 3</h4>

                                <iconify-icon icon="uil:angle-down"></iconify-icon>
                            </div>
                            <div class="faq-accordion-btm">
                                <ul class="list-unstyled p-0 m-0">
                                    <li><a href="">Fluke 87V Industrial Multimeter</a></li>
                                    <li><a href="">Fluke 117 Electrician's Multimeter with Non-Contact Voltage</a>
                                    </li>
                                    <li><a href="">Fluke 179 True-RMS Digital Multimeter</a></li>
                                    <li><a href="">Fluke 115 Field Technicians Digital Multimeter</a></li>
                                    <li><a href="">Fluke 177 True-RMS Digital Multimeter</a></li>
                                    <li><a href="">Fluke 289 True-RMS Data Logging Multimeter</a></li>
                                    <li><a href="">Fluke 28 II Rugged Digital Multimeter</a></li>
                                    <li><a href="">Fluke 116 Digital HVAC Multimeter</a></li>
                                    <li><a href="">Fluke 287 True-RMS Electronics Logging Multimeter</a></li>
                                    <li><a href="">Fluke 114 Electrical Multimeter</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="faq-accordion show-accor">
                            <div class="faq-accordion-top">
                                <h4 class="mb-0">04. fluke brand 4</h4>

                                <iconify-icon icon="uil:angle-down"></iconify-icon>
                            </div>
                            <div class="faq-accordion-btm">
                                <ul class="list-unstyled p-0 m-0">
                                    <li><a href="">Fluke 87V Industrial Multimeter</a></li>
                                    <li><a href="">Fluke 117 Electrician's Multimeter with Non-Contact Voltage</a>
                                    </li>
                                    <li><a href="">Fluke 179 True-RMS Digital Multimeter</a></li>
                                    <li><a href="">Fluke 115 Field Technicians Digital Multimeter</a></li>
                                    <li><a href="">Fluke 177 True-RMS Digital Multimeter</a></li>
                                    <li><a href="">Fluke 289 True-RMS Data Logging Multimeter</a></li>
                                    <li><a href="">Fluke 28 II Rugged Digital Multimeter</a></li>
                                    <li><a href="">Fluke 116 Digital HVAC Multimeter</a></li>
                                    <li><a href="">Fluke 287 True-RMS Electronics Logging Multimeter</a></li>
                                    <li><a href="">Fluke 114 Electrical Multimeter</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection