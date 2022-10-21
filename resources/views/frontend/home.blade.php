@extends('frontend.homelayouts.app')

@section('content')
<style>
        <style>
        img.trending-bottom-pro-list{
        width: 424px !important;
        height: 324px !important;
    }
    img.blog-img{
        width: 326px !important;
        height: 245px !important;
    }
    </style>

<div class="body-wrapper">
    <div class="ltn__utilize-overlay"></div>
    <!-- SLIDER AREA START (slider-4) -->
    <div class="ltn__slider-area ltn__slider-4 position-relative ltn__primary-bg fix">
        <div
            class="ltn__slide-one-active----- slick-slide-arrow-1----- slick-slide-dots-1----- arrow-white----- ltn__slide-animation-active">
            <!-- HTML5 VIDEO -->
            @if($slider->slider_type=="Image")
            <img src="images/slider/{{$slider->id}}/{{ $slider->slider_file }}" alt="#">
            @else
            <video autoplay muted loop id="myVideo">
                <source src="images/slider/{{$slider->id}}/{{ $slider->slider_file }}" type="video/mp4">
            </video>
            @endif
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-7 bg-image--- bg-overlay-theme-black-30"
                data-bs-bg="img/slider/41.jpg">
                <div class="ltn__slide-item-inner text-end">
                    <div class="ltn__slide-item-inner text-center mobile-search search-mt">
                        <div class="container mobile-search">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-car-dealer-form">
                                        <div class="ltn__car-dealer-form-tab">
                                            <div class="ltn__tab-menu text-uppercase">
                                                <div class="nav">
                                                    <a class="active show" data-bs-toggle="tab"
                                                        href="#ltn__form_tab_1_1">Buy</a>
                                                    <a data-bs-toggle="tab" href="#ltn__form_tab_1_1"></i>Sell</a>
                                                    <a data-bs-toggle="tab" href="#ltn__form_tab_1_1" class="">Rent</a>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                                    <div class="car-dealer-form-inner">
                                                        <form action="#" class="ltn__car-dealer-form-box row">
                                                            <div
                                                                class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-meter col-lg-3 col-md-6">
                                                                <select class="nice-select" style="display: none;">
                                                                    <option>Select City</option>
                                                                    <option>Bayonne</option>
                                                                    <option>Greenville</option>
                                                                    <option>Manhattan</option>
                                                                    <option>Queens</option>
                                                                    <option>The Heights</option>
                                                                    <option>Upper East Side</option>
                                                                    <option>West Side</option>
                                                                </select>
                                                                <div class="nice-select" tabindex="0"><span
                                                                        class="current">Select City</span>
                                                                    <ul class="list">
                                                                        <li data-value="Sub Location"
                                                                            class="option selected">Select City</li>
                                                                        <li data-value="Bayonne" class="option">
                                                                            Ahmedabad</li>
                                                                        <li data-value="Greenville" class="option">
                                                                            Surat</li>
                                                                        <li data-value="Manhattan" class="option">
                                                                            Manhattan</li>
                                                                        <li data-value="Queens" class="option">
                                                                            Rajkot</li>
                                                                        <li data-value="The Heights" class="option">
                                                                            The Heights</li>
                                                                        <li data-value="Upper East Side" class="option">
                                                                            Bhavnagar</li>
                                                                        <li data-value="West Side" class="option">
                                                                            Baroda</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-meter col-lg-2 col-md-6">
                                                                <input type="text" name="name"
                                                                    placeholder="Add More...">
                                                            </div>
                                                            <div
                                                                class="ltn__car-dealer-form-item ltn__custom-icon           ltn__icon-calendar col-lg-3 col-md-6">
                                                                <select class="nice-select" style="display: none;">
                                                                    <option>Property Type</option>
                                                                    <option>Apartment</option>
                                                                    <option>Co-op</option>
                                                                    <option>Condo</option>
                                                                    <option>Single Family Home</option>
                                                                </select>
                                                                <div class="nice-select" tabindex="0"><span
                                                                        class="current">Property Type</span>
                                                                    <ul class="list">
                                                                        <li data-value="Property Type"
                                                                            class="option selected">Property Type
                                                                        </li>
                                                                        <li data-value="Apartment" class="option">
                                                                            Apartment</li>
                                                                        <li data-value="Co-op" class="option">Co-op
                                                                        </li>
                                                                        <li data-value="Condo" class="option">Condo
                                                                        </li>
                                                                        <li data-value="Single Family Home"
                                                                            class="option">Single Family Home</li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-ring col-lg-3 col-md-6">
                                                                <select class="nice-select" style="display: none;">
                                                                    <option>Budget</option>
                                                                    <option>15 Lac to 23Lac</option>
                                                                    <option>25 Lac to 40Lac</option>
                                                                    <option>40 Lac to 60Lac</option>
                                                                    <option>60 Lac to 2cr</option>
                                                                </select>
                                                                <div class="nice-select" tabindex="0"><span
                                                                        class="current">Budget</span>
                                                                    <ul class="list">
                                                                        <li data-value="Bedrooms"
                                                                            class="option selected">Min - Max Price
                                                                        </li>
                                                                        <li data-value="1" class="option">15 Lac to
                                                                            23Lac</li>
                                                                        <li data-value="2" class="option">25 Lac to
                                                                            40Lac</li>
                                                                        <li data-value="3" class="option">40 Lac to
                                                                            60Lac</li>
                                                                        <li data-value="4" class="option">60 Lac to
                                                                            2cr</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-ring col-lg-2 col-md-12">
                                                                <a href="#"
                                                                    class="btn theme-btn-1 btn-effect-1 text-uppercase">Search</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 align-self-center text-end pt-50">
                                    <div class="slide-item-car-dealer-form">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h1 class="text-uppercase white-color animated">
                                                {{$slider->name }} <a href="product-details.html"
                                                    title="Get more details!"><i
                                                        class="fa-solid fa-circle-arrow-right"></i></a>
                                            </h1>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pt-50 pb-50 plr--7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h1 class="section-title">Top Trending Properties</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__search-by-place-slider-1-active slick-arrow-1 slick-track-sale">
                @if(isset($trendingTopProList) && sizeof($trendingTopProList)>0)
                    @foreach($trendingTopProList as $k=>$row)
                    @if(!empty($row->imageList->first()->image))
                    @php
                        $img = '/images/properties/'.$row->id.'/'.$row->imageList->first()->image;
                    @endphp
                    @else
                    @php
                        $img = '/images/default/properties/default.jpg';
                    @endphp
                    @endif
                <div class="col-lg-3">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <!-- <a href="product-details.html"><img src="/images/properties/{{$row->id}}/{{$row->imageList->first()->image ?? '/images/default/properties/default.jpg'}}" alt="#" class="propertyImg"></a> -->
                            <a href="{{ route('properties.details', ['id' => $row->id]) }}"><img src="{{ $img }}" alt="#" class="propertyImg"></a>

                            <div class="product-badge">
                                <ul>
                                    <li class="product-price">
                                        Redy to Move
                                    </li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <h5 class="product-title-rent">{{$row->project_name }}
                                            </h5>
                                            <a href="locations.html"><i class="flaticon-pin"></i>
                                                {{ $row->address }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="{{ route('properties.details', ['id' => $row->id]) }}">{{$row->project_name }}</a>
                            </h4>
                            <span><i class="flaticon-pin"></i> {{ $row->address }}</span><br>
                            <span>2 & 3 BHK</span>

                            <div class="product-price">
                                <span>$34,900 <label> {{ $row->userInfo->userRole->name}}</label></span>

                                <a href="{{ route('properties.details', ['id' => $row->id]) }}"
                                    class="btn-details theme-btn-1 btn-effect-1 text-uppercase" tabindex="0">Details</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <img src="https://cdcblog.com/demo/img/banner-1.png" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pt-30 pb-30 plr--7">
        <div class="container-fluid">
            <div class="row ltn__search-by-place-slider-1-active slick-arrow-1 slick-track-sale">
                @if(isset($trendingTopProList) && sizeof($trendingTopProList)>0)
                    @foreach($trendingTopProList as $k=>$row)
                    @if(!empty($row->imageList->first()->image))
                    @php
                        $img = '/images/properties/'.$row->id.'/'.$row->imageList->first()->image;
                    @endphp
                    @else
                    @php
                        $img = '/images/default/properties/default.jpg';
                    @endphp
                    @endif
                <div class="col-lg-3 trending-slide4x4">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="{{ route('properties.details', ['id' => $row->id]) }}"><img src="{{ $img }}" alt="#"
                                    class="trending-bottom-pro-list"></a>

                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <h5 class="product-title-rent">{{$row->project_name }}
                                            </h5>
                                            <a href="locations.html"><i class="flaticon-pin"></i>
                                                {{ $row->address }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="{{ route('properties.details', ['id' => $row->id]) }}">{{$row->project_name }}</a>
                            </h4>
                            <span><i class="flaticon-pin"></i> {{ $row->address }}</span><br>
                            <span>2 & 3 BHK</span>

                            <div class="product-price">
                                <span>$34,900 <label>{{ $row->userInfo->userRole->name}}</label></span>

                                <a href="{{ route('properties.details', ['id' => $row->id]) }}"
                                    class="btn-details theme-btn-1 btn-effect-1 text-uppercase" tabindex="0">Details</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-6 text-center">
                <img src="https://www.ishahomes.com/img/slide/desktop2-codefield.jpg" class="img-fluid h-100">
            </div>
            <div class="col-md-6 text-center">
                <img src="https://www.ishahomes.com/img/project-img/isha-code-field/slider/newoffer.jpg"
                    class="img-fluid">
            </div>
        </div>
    </div>

</div>
<!-- SEARCH BY PLACE AREA START (testimonial-7) -->
<div class="ltn__search-by-place-area before-bg-top bg-image-top--- pt-15 pb-2" data-bs-bg="img/bg/20.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title-area ltn__section-title-2--- text-center---">
                    <h1 class="section-title">Property For Rent</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__search-by-place-slider-1-active slick-arrow-1 slick-track-sale">
            @if(isset($trendingBottomProList) && sizeof($trendingBottomProList)>0)
                @foreach($trendingBottomProList as $k=>$row)
                @if(!empty($row->imageList->first()->image))
                @php
                    $img = '/images/properties/'.$row->id.'/'.$row->imageList->first()->image;
                @endphp
                @else
                @php
                    $img = '/images/default/properties/default.jpg';
                @endphp
                @endif
            <div class="col-lg-2 p-sale">
                <div class="ltn__search-by-place-item-sale">
                    <div class="search-by-place-img">
                        <a href="{{ route('properties.details', ['id' => $row->id]) }}"><img src="{{ $img }}" alt="#"></a>
                    </div>
                    <div class="search-by-place-info-sale">
                        <h4 class="product-title"><a href="{{ route('properties.details', ['id' => $row->id]) }}">{{$row->project_name }}</a>
                        </h4>
                        <span><i class="flaticon-pin"></i>{{ $row->address }}</span><br>
                        <span>2 & 3 BHK</span>

                        <div class="product-price">
                            <span>$34,900 <label>{{ $row->userInfo->userRole->name}}</label></span>

                            <a href="{{ route('properties.details', ['id' => $row->id]) }}" class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                tabindex="0">Details</a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
       


    </div>
</div>
<!-- SEARCH BY PLACE AREA END -->
<div class="container">
    <div class="row mb-5 pt-15">
        <div class="col-12 text-center">
            <img src="https://cdcblog.com/demo/img/banner-4.png" class="img-fluid">
        </div>
    </div>
</div>
<!-- CATEGORY AREA START -->
<div class="ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90 d-none"
    data-bs-bg="img/bg/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title white-color">Top Categories</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__category-slider-active slick-arrow-1">
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="shop.html">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="shop.html">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="shop.html">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="shop.html">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="shop.html">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="shop.html">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CATEGORY AREA END -->
<!-- BRAND LOGO AREA START -->
<div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1 pt-290 pb-110 plr--9 d-none">
    <div class="container-fluid">
        <div class="row ltn__brand-logo-active">
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="/assests/front-end/img/brand-logo/1.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="/assests/front-end/img/brand-logo/2.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="/assests/front-end/img/brand-logo/3.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="/assests/front-end/img/brand-logo/4.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="/assests/front-end/img/brand-logo/5.png" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="/assests/front-end/img/brand-logo/3.png" alt="Brand Logo">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BRAND LOGO AREA END -->

<!-- Buy Propert start -->
<div class="ltn__testimonial-area bg-image pt-30 pb-20" data-bs-bg="assests/front-end/img/bg/8.jpg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title-area ltn__section-title-2--- text-center---">
                    <h1 class="section-title">Property For Resale </h1>
                </div>
            </div>
        </div>
        <div class="row ltn__testimonial-slider-2-active slick-arrow-3">
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-buy">
                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                    <div class="ltn__testimonial-img">
                        <img src="/assests/front-end/img/blog/4.jpg" alt="#">
                    </div>
                    <div class="ltn__testimoni-info-buy">
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-name-designation">
                                <h4>Property Name</h4>
                                <h6>2 BHK Flate</h6>

                                <span class="pt-5"><i class="flaticon-pin"></i> Address of the property</span>
                                <h6 class="pt-2">$34,900 onwards</h6>
                            </div>
                        </div>
                        <div class="search-by-place-btn text-end">
                            <a href="product-details.html" tabindex="0"> <span>View Details
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a><span>
                        </div>

                        <div class="ltn__testimoni-bg-icon">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- comming soon Project Start -->

<div class="container pb-60 pt-30">
    <div class="row mb-30">
        <h2 class="text-center ">Comming Soon New Projects</h2>

        <div class="col-md-4">
            <img class="h-100"
                src="https://www.themediaant.com/blog/wp-content/uploads/2017/08/original_360329__A8KIaHquTkTHpVzeFpOVaIlK-1024x576.jpg">
        </div>
        <div class="col-md-4">
            <img class="h-100"
                src="https://static.designxel.com/psd/wp-content/uploads/2013/5/14/graphic-creative-real-estate-advertising-psd.jpg">
        </div>
        <div class="col-md-4">
            <img class="h-100"
                src="https://s3.amazonaws.com/bookadsnow-live/meta_tags/17170/original/Accommodations_Wanted_.jpg">
        </div>
    </div>
</div>


<!-- BLOG AREA START (blog-3) -->
<div class="ltn__blog-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h1 class="section-title">Leatest News Feeds</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Blog Item -->
            @if(isset($blogList) && sizeof($blogList)>0)
                @foreach($blogList as $k=>$row)
                @if(!empty($row->image))
                @php
                    $img = '/images/blog/'.$row->id.'/'.$row->image;  
                @endphp
                @else
                @php
                    $img = '/images/default/properties/default.jpg';
                @endphp
                @endif
            <div class="col-6 col-xl-3 col-lg-3 col-md-6 col-sm-6 mt-2">
                <div class="ltn__blog-item">
                    <div class="ltn__blog-img">
                        <!-- <a href="blog-details.html"><img src="/assests/front-end/img/blog/1.jpg" alt="#"></a> -->
                        <a href="{{ route('blog.details', ['id' => $row->id]) }}"><img src="{{$img}}" alt="#" class="blog-img"></a>
                    </div>
                </div>
                <div class="ltn__blog-brief">
                    <h3 class="ltn__blog-title"><a href="{{ route('blog.details', ['id' => $row->id]) }}">{{ $row->title}}</a></h3>
                    <div class="ltn__blog-meta-btn">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{ date('F j, Y', strtotime($row->created_at)) }}</li>
                            </ul>
                        </div>
                        <div class="ltn__blog-btn">
                            <a href="{{ route('blog.details', ['id' => $row->id]) }}">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
                @endif





        </div>
    </div>
    <!-- BLOG AREA END -->
    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-20 ">
        <div class="container-fluid">
            <div class="row">


                <div class="col-lg-12 align-self-center">
                    <div class="about-us-img-wrap about-img-right">
                        <img src="/assests/front-end/img/others/9.png" alt="About Us Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('style')
    
    @endpush
    @push('script')
    @endpush