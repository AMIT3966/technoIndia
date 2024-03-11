@extends('front.layout.app')

@section('page-title', $data->page_title)
@section('meta-title', $data->meta_title)
@section('meta-description', $data->meta_desc)
@section('meta-keywords', $data->meta_keyword)

@section('style')
<link rel="stylesheet" href="{{ asset('backend-assets/plugins/ckeditor5-36.0.1-sy1shf6t1itx/content-styles.css') }}">
@endsection

@section('section')
<div class="inner-banner-product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled p-0 m-0">
                    <li><a href="{{ route('front.home') }}">home</a></li>
                    <li><a href=""><i class="fa-solid fa-angle-right"></i></a></li>

                    <li><a href="{{ route('front.category.level1.detail', [$data->categoryDetails->categoryDetails->categoryDetails->slug]) }}">{{ $data->categoryDetails->categoryDetails->categoryDetails->title }}</a></li>
                    <li><a href=""><i class="fa-solid fa-angle-right"></i></a></li>

                    <li><a href="{{ route('front.category.level2.detail', [$data->categoryDetails->categoryDetails->categoryDetails->slug, $data->categoryDetails->categoryDetails->slug]) }}">{{ $data->categoryDetails->categoryDetails->title }}</a></li>

                    <li><a href=""><i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="{{ route('front.category.level3.detail', 
                    [$data->categoryDetails->categoryDetails->categoryDetails->slug, $data->categoryDetails->categoryDetails->slug, $data->categoryDetails->slug]) }}">{{ $data->categoryDetails->title }}</a></li>

                    <li><a href=""><i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="{{ route('front.product.detail', $data->slug) }}">{{ $data->title }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="product-main">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-6 text-center">
                @if (!empty($data->imageDetails) && count($data->imageDetails) > 0)
                <div class="product-main-img">
                    <div class="product-main-img-view">
                        {{-- <img src="images/pro-img1.png" alt="" class="img-fluid" id="thumbnail_img" /> --}}
                        <img src="{{ asset($data->imageDetails[0]->img_medium) }}" alt="" class="img-fluid" id="thumbnail_img" />
                    </div>
                </div>

                <div class="product-thumnails mt-5">
                    <div class="swiper swiper-thumbnail">
                        <div class="swiper-wrapper">
                            @foreach ($data->imageDetails as $image)
                                @if (!empty($image->img_medium) && file_exists(public_path($image->img_medium)))
                                    <div class="swiper-slide">
                                        <div class="thumbnail-img">
                                            <img src="{{ asset($image->img_medium) }}" alt="" class="img-fluid" />
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="product-image" style="height: 50px" class="mr-2">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-12 col-md-5">
                <div class="product-main-right">
                    <div class="product-right-info">
                        <h2>{{ $data->title }}</h2>
                        <p>{{ $data->short_description }}</p>

                        {{-- key features --}}
                        @if (count($data->keyFeatures) > 0)
                            <h3>Key features</h3>
                            <ul class="list-unstyled p-0 m-0 product-right-info-list">
                                @foreach ($data->keyFeatures as $feature)
                                    <li>{{ $feature->title }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="pro-single-btns">
                            {{-- manual --}}
                            @if (count($data->manuals) > 0)
                            <div class="select">
                                <iconify-icon icon="iwwa:file-pdf"></iconify-icon>
                                <span>Manual</span>
                                <div class="angle-icon">
                                    <iconify-icon icon="uil:angle-down"></iconify-icon>
                                </div>

                                <ul class="list-unstyled p-0 m-0 select-dropdown">
                                    @foreach ($data->manuals as $manual)
                                        <li><a href="{{ asset($manual->file_path) }}" target="_blank">{{ $manual->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- datasheet --}}
                            @if (count($data->datasheets) > 0)
                            <div class="select data-sheet-btn">
                                <iconify-icon icon="lucide:file-spreadsheet"></iconify-icon>
                                <span>Datasheet</span>
                                <div class="angle-icon">
                                    <iconify-icon icon="uil:angle-down"></iconify-icon>
                                </div>

                                <ul class="list-unstyled p-0 m-0 select-dropdown">
                                    @foreach ($data->datasheets as $sheet)
                                        <li><a href="{{ asset($sheet->file_path) }}" target="_blank">{{ $sheet->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- <a href="" class="data-sheet-btn">
                                <iconify-icon icon="lucide:file-spreadsheet"></iconify-icon> datasheet
                            </a> --}}
                        </div>

                        @if ($data->status == 1)
                            <a href="#enwuiryModal" class="buy-now btnn" data-bs-toggle="modal">enquire now</a>
                        @elseif ($data->status == 3)
                            <h5 class="text-danger">DISCONTINUED!</h5>
                            <div class="card border-danger">
                                <div class="card-body">
                                    <h5 class="card-title">This product has been discontinued and is no longer available.</h5>
                                    <h5 class="card-text">This is the direct replacement:</h5>
                                    
                                    @if($data->redirectProductDetails)
                                    <div class="row">
                                        <div class="col-3 text-center">
                                            @if (!empty($data->redirectProductDetails->imageDetails) && count($data->redirectProductDetails->imageDetails))
                                                @foreach ($data->redirectProductDetails->imageDetails as $image)
                                                    <img src="{{ asset($image->img_small) }}" alt="product-image" class="w-100">
                                                    @break;
                                                @endforeach
                                            @else
                                                <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="product-image" style="height: 50px" class="mr-2">
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <p>
                                                <a href="{{ route('front.product.detail', $data->redirectProductDetails->slug) }}" style="color: #0f0340">{{$data->redirectProductDetails->title}}</a>
                                            </p>
                                            <p class="small">{{$data->redirectProductDetails->short_description}}</p>
                                            <a class="buy-now btnn" href="{{ route('front.product.detail', $data->redirectProductDetails->slug) }}">Learn More</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @elseif ($data->status == 4)
                            <a href="javascript: void(0)" class="buy-now btnn">Coming Soon</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-tab-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled p-0 m-0 pro-tabs">
                    <li class="pro-tab active" data-tab="overview">product overview</li>
                    <li class="pro-tab" data-tab="specifications">specifications</li>
                    <li class="pro-tab" data-tab="whatsin">What&apos;s in the box</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="pro-tab-content-outer">
                    <div class="product-tab-content active" data-content="overview">
                        <h4>Product overview: {{ $data->title }}</h4>
                        <div class="ck-content">{!! $data->overview !!}</div>

                        {{-- <div class="pro-tab-el">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h4>Product overview: {{ $data->title }}</h4>



                                    <p>The Fluke 87V Industrial Multimeter provides the resolution and accuracy to
                                        efficiently troubleshoot motor drives, plant automation, power distribution,
                                        and
                                        electromechanical equipment - even in loud, high-energy, and high-altitude
                                        locations. The 87V is designed so you can work more efficiently.</p>

                                    <ul class="list-unstyled p-0 m-0">
                                        <li>Easy-access door for fast battery changes without breaking the
                                            calibration
                                            seal</li>
                                        <li>Analog bar graph for fast changing or unstable signals</li>
                                        <li>Large digit display with bright, two-level backlight for easier reading
                                            in
                                            low light</li>
                                        <li>Touch Hold keeps readings on display even after removing probes</li>
                                    </ul>

                                    <p>The 87V lets you identify complex electrical problems fast. It supports
                                        accurate
                                        measurements on VFDs using a low-pass filter. The meter also captures
                                        intermittents as fast as 250 µS using Peak Capture. High-frequency,
                                        high-energy
                                        noise generated by large drive systems is blocked from your measurements
                                        with
                                        specially designed shielding.</p>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="pro-tab-el-box">
                                        <h4>What's in the box:</h4>
                                        <ul class="list-unstyled p-0 m-0">
                                            <li>Fluke 87V Industrial Multimeter</li>
                                            <li>TL75 Test Leads (TL175 Eur)</li>
                                            <li>AC175 Alligator Clips</li>
                                            <li>Holster with tilt-leg, test lead storage</li>
                                            <li>80BK Temperature Probe</li>
                                            <li>9V Battery (Installed)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pro-tab-el">
                            <h4>Built to highest safety standards</h4>
                            <p>All the inputs in the 87V are updated to the third edition of the EN 61010-1 to CAT
                                III 1000 V and CAT IV 600 V. The meter is designed to withstand spikes of more than
                                8000 V. You also benefit from an audible Input Alert warning if the test leads are
                                placed in the incorrect input jacks for the measurement being made.</p>
                        </div>
                        <div class="pro-tab-el">
                            <h4>Removable holster with built in test lead and probe storage for convenience</h4>
                            <p>The 87V has a removeable holster that also holds a test probe during testing for
                                easier viewing. Relative mode lets you remove test lead resistance, improving
                                accuracy of low-resistance measurements. To make your life even easier, the 87V fits
                                into an optional magnetic hanger for easy set-up and viewing while freeing your
                                hands for other tasks.</p>
                        </div>
                        <div class="pro-tab-el">
                            <h4>Additional measurement features</h4>
                            <p>The 87V has a removeable holster that also holds a test probe during testing for
                                easier viewing. Relative mode lets you remove test lead resistance, improving
                                accuracy of low-resistance measurements. To make your life even easier, the 87V fits
                                into an optional magnetic hanger for easy set-up and viewing while freeing your
                                hands for other tasks.</p>
                        </div> --}}
                    </div>


                    <div class="product-tab-content" data-content="specifications">
                        <div class="pro-tab-el">
                            <h4>Specifications: {{ $data->title }}</h4>
                            <div class="ck-content">{!! $data->specification !!}</div>
                        </div>
                    </div>

                    <div class="product-tab-content" data-content="whatsin">
                        <div class="pro-tab-el">
                            <h4>What's in the box:</h4>
                            {{-- <ul class="list-unstyled p-0 m-0">
                                <li>Fluke 87V Industrial Multimeter</li>
                                <li>TL75 Test Leads (TL175 Eur)</li>
                                <li>AC175 Alligator Clips</li>
                                <li>Holster with tilt-leg, test lead storage</li>
                                <li>80BK Temperature Probe</li>
                                <li>9V Battery (Installed)</li>
                            </ul> --}}
                            @if (count($data->boxItems) > 0)
                                <ul class="list-unstyled p-0 m-0">
                                @foreach ($data->boxItems as $item)
                                    <li>{{ $item->title }}</li>
                                @endforeach
                                </ul>
                            @endif
                            {{-- <h4>Specifications: {{ $data->title }}</h4>
                            <div class="ck-content">{!! $data->specification !!}</div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- enquire now modal --}}
<div class="modal fade" id="enwuiryModal" tabindex="-1" aria-labelledby="enwuiryModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="top: 70px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enwuiryModalLabel">Enquire now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="success-msg" class="alert alert-success" style="display: none"></div>
                <div id="error-msg" class="alert alert-danger" style="display: none"></div>
                <form action="" method="post" id="enquiry-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Your Phone number</label>
                        <input type="number" class="form-control" name="number" id="number" placeholder="Enter your Phone number">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" id="enquiry-btn">Talk to an Expert</button>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#enquiry-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('front.product.enquiry') }}",
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    name: $('#name').val(),
                    number: $('#number').val(),
                    email: $('#email').val(),
                    page: "{{url()->current()}}",
                },
                beforeSend: function() {
                    $('#enquiry-btn').prop('disabled', true).text('Loading...');
                },
                success: function(result) {
                    if (result.status == 200) {
                        var msg = `Thank you for your query. We will contact you soon.`;

                        $('#error-msg').text('').hide();
                        $('#success-msg').html(msg).show();
                        $('#enquiry-form').find('input').val('');

                        // hiding modal
                        setTimeout(() => {
                            $('#success-msg').text('').hide();

                            var myModalEl = document.getElementById('enwuiryModal');
                            var modal = bootstrap.Modal.getInstance(myModalEl)
                            modal.hide();
                        }, 3000);
                    } else {
                        var err = ``;
                        $.each(result.message, (key, value) => {
                            err += `<li>${key.toUpperCase()}: ${value}</li>`;
                        });

                        $('#success-msg').text('').hide();
                        $('#error-msg').html(err).show();
                    }
                    $('#enquiry-btn').prop('disabled', false).text('Talk to an Expert');
                }
            });
        });
    </script>
@endsection