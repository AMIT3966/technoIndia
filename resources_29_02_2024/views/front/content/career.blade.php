
@extends('front.layout.app')

{{-- @section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword) --}}
<style>
    /* Loader container */
    #loader-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent white background */
        z-index: 1000; /* Make sure it appears on top of other elements */
        display: none; /* Initially hidden */
    }

    /* Loader */
    #loader {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100px; /* Adjust the width */
        height: 100px; /* Adjust the height */
        background-image: url('backend-assets/images/logo.jpg'); /* Replace with your logo image path */
        background-size: cover; /* Ensure the logo covers the entire area */
        animation: spin 1s infinite linear; /* Add animation (rotation) */
    }

    /* Animation */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>
@section('section')
<div class="page-wrapper">

    <section class="inner-banner">
        <div class="background"><img src="frontend-assets/assets/img/career-banner.jpg" alt="Background"></div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-title">Career</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<section class="career-publish-section">-->
    <!--    <div class="background">-->
    <!--        <img src="frontend-assets/assets/img/career-section-2-bg.png" alt="Background">-->
    <!--    </div>-->
    <!--    <div class="container">-->
    <!--        <div class="row content-row">-->
    <!--            <div class="offset-xxl-1 col-xxl-10 col-12">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-lg-6 content-left">-->
    <!--                        <h2 class="color-theme">Lorem Ipsum</h2>-->
    <!--                        <h3 class="color-theme">Publishing</h3>-->
    <!--                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-6 content-right">-->
    <!--                        <div class="content-img">-->
    <!--                            <img src="frontend-assets/assets/img/publish-img.png" alt="Content">-->
    <!--                            <div class="content-text">-->
    <!--                                <h4>50000+</h4>-->
    <!--                                <p>Budding Minds Since 2015</p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <section class="job-apply-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter-row">
                        <div class="form-group">
                            <label class="form-label color-theme">Location</label>
                            <select class="form-control" id="select_location">
                                <option selected disabled>Select Location</option>
                                @foreach ($uniqueLocations as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label color-theme">Job Category</label>
                            <select class="form-control" id="select_category">
                                <option selected disabled>Select Category</option>
                                @foreach ($uniqueCategories as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" id="items-container">
                        @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6 col-12 item">
                            <div class="job-card">
                                <h3 class="bg-theme">{{$item->title}}</h3>
                                @php
                                    $createdDate = \Carbon\Carbon::parse($item->created_at);
                                    
                                $today = \Carbon\Carbon::today();
                                $daysDifference = $today->diffInDays($createdDate);
                                $monthsDifference = $today->diffInMonths($createdDate);
                                $yearsDifference = $today->diffInYears($createdDate);
                                @endphp 
                                <div class="content">
                                    <span class="post-time">
                                        <img src="{{asset('frontend-assets/assets/icons/clock.png')}}" alt="">
                                        @if ($daysDifference == 0) 
                                            posted today.
                                        @elseif($yearsDifference>0)
                                            posted {{$yearsDifference}} years ago.
                                        @elseif($monthsDifference >0)
                                            posted {{$monthsDifference }} months ago.
                                        @else
                                            posted {{$daysDifference}} days ago.
                                        @endif
                                    </span>
                                    <h4 class="color-theme category">{{$item->category}}</h4>
                                    <ul>
                                        <li>Minimum Years of Experience: {{$item->experience}}</li>
                                        <li>Gender: {{$item->gender}}</li>
                                        <li>School Name: {{$item->school_name}}, <span>Location: <span class="location">{{$item->location}}</span></span></li>
                                        <li>Number of Vacancies: 2 ot {{$item->no_of_vacancy}}</li>
                                    </ul>
                                    {{-- <p>With supporting text below as a natural lead-in to additional content.</p> --}}
                                    <div class="cta-panel">
                                        <a href="{{route('front.career.application.form', $item->slug)}}" class="btn btn-theme btn-cta">Apply now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="view-more-cta">
                        <a href="javascript:void(0)" class="btn btn-theme btn-cta" id="view-more-btn">View More</a>
                    </div>  
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        // Hide all items beyond the first 6 initially
        $('#items-container .item:gt(5)').hide();

        // Define click event for "View More" button
        $('#view-more-btn').click(function() {
            // Show the next 6 items
            $('#items-container .item:hidden:lt(6)').slideDown();

            // Hide the "View More" button if there are no more hidden items
            if ($('#items-container .item:hidden').length === 0) {
                $('#view-more-btn').hide();
            }
        });
    });

    $(document).ready(function(){
        $('#select_location').change(function(){
            var selectedValue = $(this).val();
            var selectedCategory = $('#select_category').val();
            $('#loader-container').fadeIn();
            $('.item').show(); // Hide the item
            // alert(selectedValue);
            setTimeout(function() {
                $('.item').each(function() {
                    var location = $(this).find('.location').text();
                    var category = $(this).find('.category').text();
                    if (selectedValue !== location) {
                        $(this).hide(); // Hide the item
                    }
                    if (selectedCategory == category) {
                        $(this).show(); // Hide the item
                    }
                });
                $('#loader-container').fadeOut();
            }, 1000); // 1 second delay
        });
    });
    $(document).ready(function(){
        $('#select_category').change(function(){
            var selectedCategory = $(this).val();
            var selectedValue = $('#select_location').val();
            $('#loader-container').fadeIn();
            $('.item').show(); // Hide the item
            // alert(selectedValue);
            setTimeout(function() {
                $('.item').each(function() {
                    var location = $(this).find('.location').text();
                    var category = $(this).find('.category').text();
                    if (selectedCategory !== category) {
                        $(this).hide(); // Hide the item
                    }
                    if (selectedValue == location) {
                        $(this).show(); // Hide the item
                    }
                    
                });
                $('#loader-container').fadeOut();
            }, 1000); // 1 second delay
        });
    });
</script>
@endsection