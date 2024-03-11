@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')
<div class="inner-banner contact-banner" style="background: url({{asset($data->page_banner)}}) no-repeat;background-size: cover;
    background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-0">{{$data->page_title}}</h1>
                <ul class="list-unstyled p-0 m-0">
                    <li><a href="{{ route('front.home') }}"><i class="fa-solid fa-house-user"></i> home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="{{ route('front.contact.index') }}">contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="contact-sec2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 top-heading text-center">
                <h2 data-aos="fade-up" data-aos-duration="1000">{{$data->form_title}}</h2>
            </div>
        </div>
        <div class="row mt-4 g-4">
            <div class="col-12 col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="contact-sec2-map">
                    <iframe src="{{$settings[7]->content}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-12 col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="contact-sec-form">

                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{Session::get('success')}}</p>
                    </div>
                    @endif

                    <form action="{{ route('front.contact.enquiry') }}" method="post">@csrf
                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <input type="text" placeholder="Company Name" name="company_name" value="{{ old('company_name') }}">
                                @error('company_name') <p class="text-danger small">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" placeholder="Company Person" name="full_name" value="{{ old('full_name') }}">
                                @error('full_name') <p class="text-danger small">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="number" placeholder="Mobile No." name="mobile_no" value="{{ old('mobile_no') }}">
                                @error('mobile_no') <p class="text-danger small">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}">
                                @error('email') <p class="text-danger small">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-12">
                                <textarea name="address" id="" cols="30" rows="2" placeholder="Address">{{ old('address') }}</textarea>
                                @error('address') <p class="text-danger small">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-12">
                                <textarea name="message" id="" cols="30" rows="5" placeholder="Message">{{ old('message') }}</textarea>
                                @error('message') <p class="text-danger small">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="page" value="{{url()->current()}}">
                                <button type="submit">{{$data->form_submit_btn_text}} <i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-sec1">
    <div class="container">
        <div class="row">
            <div class="col-12 top-heading text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2>{{$data->contact_us_title}}</h2>
            </div>
        </div>
        <div class="row mt-5 g-3">
            <div class="col-12 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="contact-sec1-content">
                    <a href="">
                        <i class="fa-solid fa-map"></i>
                        <h5>address</h5>
                        <p class="mb-0">{{$settings[6]->content}}</p>
                    </a>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="contact-sec1-content">
                    <a href="">
                        <i class="fa-solid fa-phone"></i>
                        <h5>Phone Number</h5>
                        <p class="mb-0">{{$settings[0]->content}}</p>
                    </a>
                </div>
            </div>


            <div class="col-12 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="contact-sec1-content">
                    <a href="">
                        <i class="fa-solid fa-envelope"></i>
                        <h5> Email Address </h5>
                        <p class="mb-0">{{$settings[2]->content}}</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection