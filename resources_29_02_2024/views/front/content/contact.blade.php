@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')
<section class="inner_banner" style="background: url({{asset($data->page_banner)}}) no-repeat;background-size: cover;
    background-position: top center;">
    <div class="container">
        <div class="row">
            <h3>
                {{$data->page_title}}
                <span>
                    <nav class="breadcrumb">
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{asset('')}}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item_active"><a class="breadcrumb__link">
                                    {{$data->page_title}}</a></li>
                        </ul>
                    </nav>
                </span>
            </h3>
        </div>
    </div>
</section>
<section class="contact_area">
    <div class="container pb-3 pb-sm-5">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <h6>REGISTERED OFFICE :</h6>
                <h2 class="text-uppercase">{{$data->registerd_office_title}}</h2>
            </div>
            <div class="col-sm-4">
                <div class="contact_block">
                    <div class="contact_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M102.035 308.98c-18.977-38.827-28.598-76.313-28.598-111.412C73.436 96.902 155.333 15.004 256 15.004c59.793 0 115.884 29.359 150.046 78.534a7.502 7.502 0 1 0 12.323-8.559C381.404 31.767 320.705 0 256 0 147.061 0 58.432 88.629 58.432 197.568c0 37.403 10.135 77.104 30.123 118.001a7.501 7.501 0 0 0 10.034 3.446 7.503 7.503 0 0 0 3.446-10.035zM434.018 111.779a7.503 7.503 0 0 0-13.513 6.524c11.983 24.82 18.058 51.49 18.058 79.267 0 35.259-9.709 72.922-28.857 111.94-15.468 31.517-37.078 63.958-64.232 96.42-38.017 45.449-76.488 78.302-89.471 88.94-18.973-15.566-92.425-78.689-139.972-159.855a7.502 7.502 0 1 0-12.946 7.584c56.203 95.942 144.589 164.941 148.324 167.831A7.482 7.482 0 0 0 256 512a7.49 7.49 0 0 0 4.59-1.568c1.967-1.522 48.703-37.917 96.194-94.638 27.974-33.411 50.287-66.895 66.317-99.521 20.216-41.147 30.467-81.085 30.467-118.703 0-30.056-6.578-58.919-19.55-85.791z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="M195.288 151.55a7.5 7.5 0 0 0-10.319 2.465c-8.032 13.075-12.279 28.136-12.279 43.554 0 45.938 37.373 83.31 83.31 83.31 45.938 0 83.31-37.372 83.309-83.309 0-45.938-37.373-83.31-83.31-83.31-17.505 0-34.258 5.37-48.448 15.529a7.503 7.503 0 0 0 8.734 12.199c11.627-8.324 25.36-12.725 39.714-12.725 37.664 0 68.305 30.641 68.305 68.305s-30.641 68.305-68.305 68.305c-37.664 0-68.305-30.642-68.305-68.305 0-12.644 3.478-24.989 10.059-35.7a7.502 7.502 0 0 0-2.465-10.318z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="contact_info">
                        <h4>Address</h4>
                        <p>{{$data->registerd_office_address}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact_block">
                    <div class="contact_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="512" height="512" x="0" y="0" viewBox="0 0 128 128"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M93.237 4.75H34.763a7.759 7.759 0 0 0-7.75 7.75v103a7.759 7.759 0 0 0 7.75 7.75h58.474a7.759 7.759 0 0 0 7.75-7.75v-103a7.759 7.759 0 0 0-7.75-7.75zm-58.474 3.5h58.474a4.255 4.255 0 0 1 4.25 4.25v4.75H30.513V12.5a4.255 4.255 0 0 1 4.25-4.25zm62.724 93.808H30.513V20.75h66.974zm-4.25 17.692H34.763a4.255 4.255 0 0 1-4.25-4.25v-9.942h66.974v9.942a4.255 4.255 0 0 1-4.25 4.25z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="M34.763 45.625a1.751 1.751 0 0 0 1.75-1.75V34a1.75 1.75 0 0 0-3.5 0v9.875a1.75 1.75 0 0 0 1.75 1.75zM44.194 76.553a1.749 1.749 0 0 0 2.36-.748l14.1-27.19A1.751 1.751 0 1 0 57.546 47l-14.1 27.19a1.751 1.751 0 0 0 .748 2.363zM53.944 80.791a1.748 1.748 0 0 0 2.359-.748L74.8 44.376a1.749 1.749 0 1 0-3.1-1.611L53.2 78.432a1.749 1.749 0 0 0 .744 2.359zM68.094 76.553a1.749 1.749 0 0 0 2.36-.748l14.1-27.19A1.751 1.751 0 1 0 81.446 47l-14.1 27.19a1.751 1.751 0 0 0 .748 2.363zM64 107.9a4.75 4.75 0 1 0 4.75 4.75A4.756 4.756 0 0 0 64 107.9zm0 6a1.25 1.25 0 1 1 1.25-1.25A1.252 1.252 0 0 1 64 113.9zM56 14.5h12a1.75 1.75 0 0 0 0-3.5H56a1.75 1.75 0 0 0 0 3.5z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="contact_info">
                        <h4>Contact Details</h4>
                        <p>Telephone: {{$data->registerd_office_tell}}</p>
                        <p>Fax:{{$data->registerd_office_fax}}</p>
                        <p>Email:{{$data->registerd_office_email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="map_area">
            {!!$data->registerd_office_map!!}
        </div>
    </div>
</section>
<section class="contact_area">
    <div class="container pb-3 pb-sm-5">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <h6>CORPORATE OFFICE :</h6>
                <h2>{{$data->corporate_office_title}}</h2>
            </div>
            <div class="col-sm-4">
                <div class="contact_block">
                    <div class="contact_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M102.035 308.98c-18.977-38.827-28.598-76.313-28.598-111.412C73.436 96.902 155.333 15.004 256 15.004c59.793 0 115.884 29.359 150.046 78.534a7.502 7.502 0 1 0 12.323-8.559C381.404 31.767 320.705 0 256 0 147.061 0 58.432 88.629 58.432 197.568c0 37.403 10.135 77.104 30.123 118.001a7.501 7.501 0 0 0 10.034 3.446 7.503 7.503 0 0 0 3.446-10.035zM434.018 111.779a7.503 7.503 0 0 0-13.513 6.524c11.983 24.82 18.058 51.49 18.058 79.267 0 35.259-9.709 72.922-28.857 111.94-15.468 31.517-37.078 63.958-64.232 96.42-38.017 45.449-76.488 78.302-89.471 88.94-18.973-15.566-92.425-78.689-139.972-159.855a7.502 7.502 0 1 0-12.946 7.584c56.203 95.942 144.589 164.941 148.324 167.831A7.482 7.482 0 0 0 256 512a7.49 7.49 0 0 0 4.59-1.568c1.967-1.522 48.703-37.917 96.194-94.638 27.974-33.411 50.287-66.895 66.317-99.521 20.216-41.147 30.467-81.085 30.467-118.703 0-30.056-6.578-58.919-19.55-85.791z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="M195.288 151.55a7.5 7.5 0 0 0-10.319 2.465c-8.032 13.075-12.279 28.136-12.279 43.554 0 45.938 37.373 83.31 83.31 83.31 45.938 0 83.31-37.372 83.309-83.309 0-45.938-37.373-83.31-83.31-83.31-17.505 0-34.258 5.37-48.448 15.529a7.503 7.503 0 0 0 8.734 12.199c11.627-8.324 25.36-12.725 39.714-12.725 37.664 0 68.305 30.641 68.305 68.305s-30.641 68.305-68.305 68.305c-37.664 0-68.305-30.642-68.305-68.305 0-12.644 3.478-24.989 10.059-35.7a7.502 7.502 0 0 0-2.465-10.318z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="contact_info">
                        <h4>Address</h4>
                        <p>{{$data->corporate_office_address}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact_block">
                    <div class="contact_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="512" height="512" x="0" y="0" viewBox="0 0 128 128"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M93.237 4.75H34.763a7.759 7.759 0 0 0-7.75 7.75v103a7.759 7.759 0 0 0 7.75 7.75h58.474a7.759 7.759 0 0 0 7.75-7.75v-103a7.759 7.759 0 0 0-7.75-7.75zm-58.474 3.5h58.474a4.255 4.255 0 0 1 4.25 4.25v4.75H30.513V12.5a4.255 4.255 0 0 1 4.25-4.25zm62.724 93.808H30.513V20.75h66.974zm-4.25 17.692H34.763a4.255 4.255 0 0 1-4.25-4.25v-9.942h66.974v9.942a4.255 4.255 0 0 1-4.25 4.25z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="M34.763 45.625a1.751 1.751 0 0 0 1.75-1.75V34a1.75 1.75 0 0 0-3.5 0v9.875a1.75 1.75 0 0 0 1.75 1.75zM44.194 76.553a1.749 1.749 0 0 0 2.36-.748l14.1-27.19A1.751 1.751 0 1 0 57.546 47l-14.1 27.19a1.751 1.751 0 0 0 .748 2.363zM53.944 80.791a1.748 1.748 0 0 0 2.359-.748L74.8 44.376a1.749 1.749 0 1 0-3.1-1.611L53.2 78.432a1.749 1.749 0 0 0 .744 2.359zM68.094 76.553a1.749 1.749 0 0 0 2.36-.748l14.1-27.19A1.751 1.751 0 1 0 81.446 47l-14.1 27.19a1.751 1.751 0 0 0 .748 2.363zM64 107.9a4.75 4.75 0 1 0 4.75 4.75A4.756 4.756 0 0 0 64 107.9zm0 6a1.25 1.25 0 1 1 1.25-1.25A1.252 1.252 0 0 1 64 113.9zM56 14.5h12a1.75 1.75 0 0 0 0-3.5H56a1.75 1.75 0 0 0 0 3.5z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="contact_info">
                        <h4>Contact Details</h4>
                        <div class="contact_info">
                            <h4>Contact Details</h4>
                            <p>Telephone: {{$data->corporate_office_tell}}</p>
                            <p>Fax:{{$data->corporate_office_fax}}</p>
                            <p>Email:{{$data->corporate_office_email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="map_area">
            {!!$data->corporate_office_map!!}
        </div>
    </div>
</section>
<section class="contact_area">
    <div class="container pb-3 pb-sm-5">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <h6>PLANT :</h6>
                <h2>{{$data->plant_title}}</h2>
            </div>
            <div class="col-sm-4">
                <div class="contact_block">
                    <div class="contact_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M102.035 308.98c-18.977-38.827-28.598-76.313-28.598-111.412C73.436 96.902 155.333 15.004 256 15.004c59.793 0 115.884 29.359 150.046 78.534a7.502 7.502 0 1 0 12.323-8.559C381.404 31.767 320.705 0 256 0 147.061 0 58.432 88.629 58.432 197.568c0 37.403 10.135 77.104 30.123 118.001a7.501 7.501 0 0 0 10.034 3.446 7.503 7.503 0 0 0 3.446-10.035zM434.018 111.779a7.503 7.503 0 0 0-13.513 6.524c11.983 24.82 18.058 51.49 18.058 79.267 0 35.259-9.709 72.922-28.857 111.94-15.468 31.517-37.078 63.958-64.232 96.42-38.017 45.449-76.488 78.302-89.471 88.94-18.973-15.566-92.425-78.689-139.972-159.855a7.502 7.502 0 1 0-12.946 7.584c56.203 95.942 144.589 164.941 148.324 167.831A7.482 7.482 0 0 0 256 512a7.49 7.49 0 0 0 4.59-1.568c1.967-1.522 48.703-37.917 96.194-94.638 27.974-33.411 50.287-66.895 66.317-99.521 20.216-41.147 30.467-81.085 30.467-118.703 0-30.056-6.578-58.919-19.55-85.791z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="M195.288 151.55a7.5 7.5 0 0 0-10.319 2.465c-8.032 13.075-12.279 28.136-12.279 43.554 0 45.938 37.373 83.31 83.31 83.31 45.938 0 83.31-37.372 83.309-83.309 0-45.938-37.373-83.31-83.31-83.31-17.505 0-34.258 5.37-48.448 15.529a7.503 7.503 0 0 0 8.734 12.199c11.627-8.324 25.36-12.725 39.714-12.725 37.664 0 68.305 30.641 68.305 68.305s-30.641 68.305-68.305 68.305c-37.664 0-68.305-30.642-68.305-68.305 0-12.644 3.478-24.989 10.059-35.7a7.502 7.502 0 0 0-2.465-10.318z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="contact_info">
                        <h4>Address</h4>
                        <p>
                            {{$data->plant_address}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact_block">
                    <div class="contact_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="512" height="512" x="0" y="0" viewBox="0 0 128 128"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M93.237 4.75H34.763a7.759 7.759 0 0 0-7.75 7.75v103a7.759 7.759 0 0 0 7.75 7.75h58.474a7.759 7.759 0 0 0 7.75-7.75v-103a7.759 7.759 0 0 0-7.75-7.75zm-58.474 3.5h58.474a4.255 4.255 0 0 1 4.25 4.25v4.75H30.513V12.5a4.255 4.255 0 0 1 4.25-4.25zm62.724 93.808H30.513V20.75h66.974zm-4.25 17.692H34.763a4.255 4.255 0 0 1-4.25-4.25v-9.942h66.974v9.942a4.255 4.255 0 0 1-4.25 4.25z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="M34.763 45.625a1.751 1.751 0 0 0 1.75-1.75V34a1.75 1.75 0 0 0-3.5 0v9.875a1.75 1.75 0 0 0 1.75 1.75zM44.194 76.553a1.749 1.749 0 0 0 2.36-.748l14.1-27.19A1.751 1.751 0 1 0 57.546 47l-14.1 27.19a1.751 1.751 0 0 0 .748 2.363zM53.944 80.791a1.748 1.748 0 0 0 2.359-.748L74.8 44.376a1.749 1.749 0 1 0-3.1-1.611L53.2 78.432a1.749 1.749 0 0 0 .744 2.359zM68.094 76.553a1.749 1.749 0 0 0 2.36-.748l14.1-27.19A1.751 1.751 0 1 0 81.446 47l-14.1 27.19a1.751 1.751 0 0 0 .748 2.363zM64 107.9a4.75 4.75 0 1 0 4.75 4.75A4.756 4.756 0 0 0 64 107.9zm0 6a1.25 1.25 0 1 1 1.25-1.25A1.252 1.252 0 0 1 64 113.9zM56 14.5h12a1.75 1.75 0 0 0 0-3.5H56a1.75 1.75 0 0 0 0 3.5z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="contact_info">
                        <h4>Contact Details</h4>
                        <p>Telephone: {{$data->plant_tell}}</p>
                        <p>Fax:{{$data->plant_fax}}</p>
                        <p>Email:{{$data->plant_email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="map_area">
            {!!$data->plant_map!!}
        </div>
    </div>
</section>
<section class="contact_area">
    <div class="container pb-3 pb-sm-5">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <h6>PLANT 2:</h6>
                <h2>{{$data->plant_title1}}</h2>
            </div>
            <div class="col-sm-4">
                <div class="contact_block">
                    <div class="contact_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M102.035 308.98c-18.977-38.827-28.598-76.313-28.598-111.412C73.436 96.902 155.333 15.004 256 15.004c59.793 0 115.884 29.359 150.046 78.534a7.502 7.502 0 1 0 12.323-8.559C381.404 31.767 320.705 0 256 0 147.061 0 58.432 88.629 58.432 197.568c0 37.403 10.135 77.104 30.123 118.001a7.501 7.501 0 0 0 10.034 3.446 7.503 7.503 0 0 0 3.446-10.035zM434.018 111.779a7.503 7.503 0 0 0-13.513 6.524c11.983 24.82 18.058 51.49 18.058 79.267 0 35.259-9.709 72.922-28.857 111.94-15.468 31.517-37.078 63.958-64.232 96.42-38.017 45.449-76.488 78.302-89.471 88.94-18.973-15.566-92.425-78.689-139.972-159.855a7.502 7.502 0 1 0-12.946 7.584c56.203 95.942 144.589 164.941 148.324 167.831A7.482 7.482 0 0 0 256 512a7.49 7.49 0 0 0 4.59-1.568c1.967-1.522 48.703-37.917 96.194-94.638 27.974-33.411 50.287-66.895 66.317-99.521 20.216-41.147 30.467-81.085 30.467-118.703 0-30.056-6.578-58.919-19.55-85.791z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="M195.288 151.55a7.5 7.5 0 0 0-10.319 2.465c-8.032 13.075-12.279 28.136-12.279 43.554 0 45.938 37.373 83.31 83.31 83.31 45.938 0 83.31-37.372 83.309-83.309 0-45.938-37.373-83.31-83.31-83.31-17.505 0-34.258 5.37-48.448 15.529a7.503 7.503 0 0 0 8.734 12.199c11.627-8.324 25.36-12.725 39.714-12.725 37.664 0 68.305 30.641 68.305 68.305s-30.641 68.305-68.305 68.305c-37.664 0-68.305-30.642-68.305-68.305 0-12.644 3.478-24.989 10.059-35.7a7.502 7.502 0 0 0-2.465-10.318z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="contact_info">
                        <h4>Address</h4>
                        <p>{{$data->plant_address1}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact_block">
                    <div class="contact_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="512" height="512" x="0" y="0" viewBox="0 0 128 128"
                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path
                                    d="M93.237 4.75H34.763a7.759 7.759 0 0 0-7.75 7.75v103a7.759 7.759 0 0 0 7.75 7.75h58.474a7.759 7.759 0 0 0 7.75-7.75v-103a7.759 7.759 0 0 0-7.75-7.75zm-58.474 3.5h58.474a4.255 4.255 0 0 1 4.25 4.25v4.75H30.513V12.5a4.255 4.255 0 0 1 4.25-4.25zm62.724 93.808H30.513V20.75h66.974zm-4.25 17.692H34.763a4.255 4.255 0 0 1-4.25-4.25v-9.942h66.974v9.942a4.255 4.255 0 0 1-4.25 4.25z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                <path
                                    d="M34.763 45.625a1.751 1.751 0 0 0 1.75-1.75V34a1.75 1.75 0 0 0-3.5 0v9.875a1.75 1.75 0 0 0 1.75 1.75zM44.194 76.553a1.749 1.749 0 0 0 2.36-.748l14.1-27.19A1.751 1.751 0 1 0 57.546 47l-14.1 27.19a1.751 1.751 0 0 0 .748 2.363zM53.944 80.791a1.748 1.748 0 0 0 2.359-.748L74.8 44.376a1.749 1.749 0 1 0-3.1-1.611L53.2 78.432a1.749 1.749 0 0 0 .744 2.359zM68.094 76.553a1.749 1.749 0 0 0 2.36-.748l14.1-27.19A1.751 1.751 0 1 0 81.446 47l-14.1 27.19a1.751 1.751 0 0 0 .748 2.363zM64 107.9a4.75 4.75 0 1 0 4.75 4.75A4.756 4.756 0 0 0 64 107.9zm0 6a1.25 1.25 0 1 1 1.25-1.25A1.252 1.252 0 0 1 64 113.9zM56 14.5h12a1.75 1.75 0 0 0 0-3.5H56a1.75 1.75 0 0 0 0 3.5z"
                                    fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="contact_info">
                        <h4>Contact Details</h4>
                        <p>Telephone: {{$data->plant_tell1}}</p>
                        <p>Fax:{{$data->plant_fax1}}</p>
                        <p>Email:{{$data->plant_email1}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="map_area">
            {!!$data->plant_map1!!}
        </div>
    </div>
</section>
<section class="contact_area">
    <div class="container pb-3 pb-sm-5">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2 class="text-center">{{$data->form_title}}</h2>
                <p class="text-center">{{$data->form_desc}}</p>
                @if(Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if(Session::get('failure'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('failure') }}
                    </div>
                @endif
                <form action="{{ route('front.contact.enquiry') }}" method="post">
                    @csrf
                    <div class="row gy-3 mt-3 mt-sm-5">
                        <div class="col-sm-6">
                            <label>Contact Person<span>*</span></label>
                            <input type="text" name="full_name" class="textbox" value="{{old('full_name')}}">
                            @error('full_name') <p class="text-danger small">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Company Name<span>*</span></label>
                            <input type="text" name="company_name" class="textbox" value="{{old('company_name')}}">
                            @error('company_name') <p class="text-danger small">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>E-mail<span>*</span></label>
                            <input type="email" name="email" class="textbox" value="{{old('email')}}">
                            @error('email') <p class="text-danger small">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Phone No<span>*</span></label>
                            <input type="tel" name="mobile_no" class="textbox" value="{{old('mobile_no')}}">
                            @error('mobile_no') <p class="text-danger small">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-sm-12">
                            <label>Message<span>*</span></label>
                            <textarea name="message" class="textarea">{{old('message')}}</textarea>
                            @error('message') <p class="text-danger small">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-sm-12">
                            <button type="submit"
                                class="submit_btn">{{$data->form_submit_btn_text?$data->form_submit_btn_text:"Submit"}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
@endsection
