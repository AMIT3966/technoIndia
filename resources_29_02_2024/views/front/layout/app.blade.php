<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career | TIGS</title>
    <link rel="icon" type="image/x-icon" href="{{asset('frontend-assets/assets/icons/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/responsive.css')}}">
</head>
<body>
    <div class="main">

        <header>
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="/"><img src="{{asset('frontend-assets/assets/img/logo2.png')}}" alt="Logo"></a>
                </div>
            </nav>
        </header>
        <div id="loader-container">
            <div id="loader"></div>
        </div>
        @yield('section')

        <section class="footer">
            <div class="container">
                <div class="row pt-5 pb-4 justify-content-center">
                    <div class="col-lg-6 col-md-12 text-center">
                        <img src="{{asset('frontend-assets/assets/img/footer_logo.png')}}" class="img-fluid mb-4 footer_logo" alt="">
                        <p class="text-white">Under the banner of unity and excellence, we forge paths of innovation. Our all-girls school is a cradle for creativity, character, and courage.</p>
                        <!-- <p class="text-white quick_links mt-4">Our Quick Link: <span class="ml-3"><a href="#">Registration</a></span></p> -->
                        <!-- <p class="text-white quick_links mt-4">Our Quick Link: <span class="ml-3"><a href="#">Registration</a> | <a href="#">World school website</a></span></p> -->
                    </div>
                    <div class="col-md-12 text-center">
                        <span class="border_bottom mt-5 mb-4"></span>
                        <p class="text-white mb-0">Copyright @ 2024. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    <script src="{{asset('frontend-assets/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend-assets/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend-assets/assets/js/custom.js')}}"></script>
    {{-- <script src="{{ asset('frontend-assets/js/custom.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if(Session::get('success'))
                toastFire('success', '{{Session::get("success")}}');
            @endif
    
            @if(Session::get('failure'))
                toastFire('error', '{{Session::get("failure")}}');
            @endif
        </script>
        @yield('script')
    </body>
</html>