<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PropertyPanda</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="/assests/front-end/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="/assests/front-end/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="/assests/front-end/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/assests/front-end/css/style.css">
    <link rel="stylesheet" href="/assests/front-end/css/custom.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/assests/front-end/css/responsive.css">
</head>

<body>
    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="body-wrapper">

        <!-- HEADER AREA START (header-5) -->
        @include('frontend.layouts.header')
        <!-- HEADER AREA END -->
        <!-- Utilize Cart Menu Start -->
        <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <span class="ltn__utilize-menu-title">Login</span>
                    <!-- user-menu -->
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="mini-cart-product-area ltn__scrollbar">

                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-info">
                            <ul>
                                <li><a href="#"><span><i class="fa fa-sign-in" aria-hidden="true"></i></span>&nbsp;
                                        &nbsp; Sign in</a></li>
                                <li><a href="#"><span><i class="fa fa-registered" aria-hidden="true"></i></span>&nbsp;
                                        &nbsp; Register</a></li>
                                <li><a href="#"><span><i class="fa fa-user"></i></span>&nbsp; &nbsp;My Account</a></li>
                                <li><a href="#"><span><i class="fa fa-heart" aria-hidden="true"></i></span>&nbsp; &nbsp;
                                        Wishlist</a></li>
                                <li><a href="#"><span><i class="fa fa-cogs" aria-hidden="true"></i></span>&nbsp; &nbsp;
                                        Services</a></li>
                                <li><a href="#"><span><i class="fa fa-phone" aria-hidden="true"></i></span>&nbsp; &nbsp;
                                        Contact Us</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Utilize Cart Menu End -->

        <!-- Utilize Mobile Menu Start -->
        <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <div class="site-logo">
                        <a href="index-6.html"><img src="/assests/front-end/img/logo-2.png" alt="Logo"
                                style="width: 50%;"></a>
                    </div>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="ltn__utilize-menu-search-form">
                    <form action="#">
                        <input type="text" placeholder="Search...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="ltn__utilize-menu">
                    <ul>
                        <li><a href="#">Buy</a>
                            <ul class="sub-menu menu-pages-img-show">
                                <li>
                                    <a href="index-6.html">Buy</a>
                                    <img src="/assests/front-end/img/home-demos/home-1.jpg" alt="#">
                                </li>
                                <li>
                                    <a href="#">Rent</a>
                                    <img src="/assests/front-end/img/home-demos/home-2.jpg" alt="#">
                                </li>
                                <li>
                                    <a href="#">Sell</a>
                                    <img src="/assests/front-end/img/home-demos/home-1.jpg" alt="#">
                                </li>
                            </ul>
                        </li>
                        <li><a href="product-details.html">Product details</a></li>
                        <li><a href="product-list.html">Product List</a></li>

                    </ul>
                </div>
                <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                    <ul>
                        <li>
                            <a href="account.html" title="My Account">
                                <span class="utilize-btn-icon">
                                    <i class="far fa-user"></i>
                                </span>
                                My Account
                            </a>
                        </li>
                        <li>
                            <a href="wishlist.html" title="Wishlist">
                                <span class="utilize-btn-icon">
                                    <i class="far fa-heart"></i>
                                    <sup>3</sup>
                                </span>
                                Wishlist
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ltn__social-media-2">
                    <ul>
                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Utilize Mobile Menu End -->

        <div class="ltn__utilize-overlay"></div>

        <!-- SLIDER AREA START (slider-4) -->
        <div class="ltn__slider-area ltn__slider-4 position-relative ltn__primary-bg fix">
            <div
                class="ltn__slide-one-active----- slick-slide-arrow-1----- slick-slide-dots-1----- arrow-white----- ltn__slide-animation-active">

                <!-- HTML5 VIDEO -->
               
                <?php 
                    $slider =  DB::table('slider')->where('slider_status','active')->latest('id')->first();
                    if($slider->slider_type=="image"){
                ?>
                <img src="images/slider/{{$slider->id}}/{{ $slider->slider_file }}" alt="#">
                <?php        
                    }else{
                ?>
                <video autoplay muted loop id="myVideo">
                    <source src="images/slider/{{$slider->id}}/{{ $slider->slider_file }}" type="video/mp4">
                </video>
                <?php
                    }
                ?>

                




                <!-- ltn__slide-item -->
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-7 bg-image--- bg-overlay-theme-black-30"
                    data-bs-bg="img/slider/41.jpg">
                    <div class="ltn__slide-item-inner text-end">
                        <!-- <div class="container">
                        <div class="row">
                            
                        </div>
                    </div> -->
                        <!-- search area start tabs-wrapper -->
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
                                                        <a data-bs-toggle="tab" href="#ltn__form_tab_1_1"
                                                            class="">Rent</a>
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
                                                                            <li data-value="Upper East Side"
                                                                                class="option">Bhavnagar</li>
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
                                                    <div class="tab-pane fade" id="ltn__form_tab_1_2">
                                                        <div class="car-dealer-form-inner">
                                                            <form action="#" class="ltn__car-dealer-form-box row">
                                                                <div
                                                                    class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-4 col-md-6">
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
                                                                    class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-car col-lg-4 col-md-6">
                                                                    <select class="nice-select" style="display: none;">
                                                                        <option>Location</option>
                                                                        <option>chicago</option>
                                                                        <option>London</option>
                                                                        <option>Los Angeles</option>
                                                                        <option>New York</option>
                                                                        <option>New Jersey</option>
                                                                    </select>
                                                                    <div class="nice-select" tabindex="0"><span
                                                                            class="current">Location</span>
                                                                        <ul class="list">
                                                                            <li data-value="Location"
                                                                                class="option selected">Location</li>
                                                                            <li data-value="chicago" class="option">
                                                                                chicago</li>
                                                                            <li data-value="London" class="option">
                                                                                London</li>
                                                                            <li data-value="Los Angeles" class="option">
                                                                                Los Angeles</li>
                                                                            <li data-value="New York" class="option">New
                                                                                York</li>
                                                                            <li data-value="New Jersey" class="option">
                                                                                New Jersey</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-meter col-lg-4 col-md-6">
                                                                    <select class="nice-select" style="display: none;">
                                                                        <option>Sub Location</option>
                                                                        <option>Bayonne</option>
                                                                        <option>Greenville</option>
                                                                        <option>Manhattan</option>
                                                                        <option>Queens</option>
                                                                        <option>The Heights</option>
                                                                        <option>Upper East Side</option>
                                                                        <option>West Side</option>
                                                                    </select>
                                                                    <div class="nice-select" tabindex="0"><span
                                                                            class="current">Sub Location</span>
                                                                        <ul class="list">
                                                                            <li data-value="Sub Location"
                                                                                class="option selected">Sub Location
                                                                            </li>
                                                                            <li data-value="Bayonne" class="option">
                                                                                Bayonne</li>
                                                                            <li data-value="Greenville" class="option">
                                                                                Greenville</li>
                                                                            <li data-value="Manhattan" class="option">
                                                                                Manhattan</li>
                                                                            <li data-value="Queens" class="option">
                                                                                Queens</li>
                                                                            <li data-value="The Heights" class="option">
                                                                                The Heights</li>
                                                                            <li data-value="Upper East Side"
                                                                                class="option">Upper East Side</li>
                                                                            <li data-value="West Side" class="option">
                                                                                West Side</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-ring col-lg-4 col-md-6">
                                                                    <select class="nice-select" style="display: none;">
                                                                        <option>Bedrooms</option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                    </select>
                                                                    <div class="nice-select" tabindex="0"><span
                                                                            class="current">Bedrooms</span>
                                                                        <ul class="list">
                                                                            <li data-value="Bedrooms"
                                                                                class="option selected">Bedrooms</li>
                                                                            <li data-value="1" class="option">1</li>
                                                                            <li data-value="2" class="option">2</li>
                                                                            <li data-value="3" class="option">3</li>
                                                                            <li data-value="4" class="option">4</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-cog col-lg-4 col-md-6">
                                                                    <div
                                                                        class="input-item input-item-name ltn__custom-icon">
                                                                        <input type="text" name="name"
                                                                            placeholder="Min size (in sqft)">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-cog col-lg-4 col-md-6">
                                                                    <div
                                                                        class="input-item input-item-name ltn__custom-icon">
                                                                        <input type="text" name="name"
                                                                            placeholder="Max size (in sqft)">
                                                                    </div>
                                                                </div>
                                                                <div class="car-price-filter-range col-lg-12">
                                                                    <div class="price_filter">
                                                                        <div class="price_slider_amount">
                                                                            <input type="submit" value="Your range:">
                                                                            <input type="text" class="amount"
                                                                                name="price"
                                                                                placeholder="Add Your Price">
                                                                        </div>
                                                                        <div
                                                                            class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                            <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                                                style="left: 0%; width: 29.2929%;">
                                                                            </div><span
                                                                                class="ui-slider-handle ui-state-default ui-corner-all"
                                                                                tabindex="0"
                                                                                style="left: 0%;"></span><span
                                                                                class="ui-slider-handle ui-state-default ui-corner-all"
                                                                                tabindex="0"
                                                                                style="left: 29.2929%;"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="btn-wrapper text-center">
                                                                        <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                                                        <a href="shop-right-sidebar.html"
                                                                            class="btn theme-btn-1 btn-effect-1 text-uppercase">Search
                                                                            Inventory</a>
                                                                    </div>
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

        <!-- ABOUT US AREA END -->




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
                   
                    <div class="col-lg-3">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/1.jpg"
                                        alt="#"></a>
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
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-3">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/2.jpg"
                                        alt="#"></a>

                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-3">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/3.jpg"
                                        alt="#"></a>

                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-3">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/4.jpg"
                                        alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal"
                                                data-bs-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div><!-- ltn__product-item -->
                    <div class="col-lg-3">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/1.jpg"
                                        alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal"
                                                data-bs-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-3">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/2.jpg"
                                        alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal"
                                                data-bs-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
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
                    <!-- ltn__product-item -->
                    <div class="col-lg-3 trending-slide4x4">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/1.jpg"
                                        alt="#"></a>
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
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-3 trending-slide4x4">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/2.jpg"
                                        alt="#"></a>

                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-3 trending-slide4x4">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/3.jpg"
                                        alt="#"></a>

                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-3 trending-slide4x4">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/4.jpg"
                                        alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal"
                                                data-bs-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div><!-- ltn__product-item -->
                    <div class="col-lg-3 trending-slide4x4">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/1.jpg"
                                        alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal"
                                                data-bs-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-3 trending-slide4x4">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="/assests/front-end/img/product-3/2.jpg"
                                        alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal"
                                                data-bs-target="#quick_view_modal">
                                                <i class="flaticon-expand"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <h5 class="product-title-rent">New Apartment Nice View
                                                </h5>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Address of the
                                                    property</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="product-details.html">New Apartment Nice View</a>
                                </h4>
                                <span><i class="flaticon-pin"></i> Address of the property</span><br>
                                <span>2 & 3 BHK</span>

                                <div class="product-price">
                                    <span>$34,900 <label>onwards</label></span>

                                    <a href="product-details.html"
                                        class="btn-details theme-btn-1 btn-effect-1 text-uppercase"
                                        tabindex="0">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
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




    
        <!-- ABOUT US AREA END -->
        <!-- centre Part -->
        @yield('content')
        <!-- centre Part -->
        <!--**********************************
        Footer start
    ***********************************-->
        @include('frontend.layouts.footer')
        <!--**********************************
        Footer end
    ***********************************-->

        <!-- MODAL AREA START (Quick View Modal) -->
        <div class="ltn__modal-area ltn__quick-view-modal-area">
            <div class="modal fade" id="quick_view_modal" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <!-- <i class="fas fa-times"></i> -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="modal-product-img">
                                                <img src="/assests/front-end/img/product/4.png" alt="#">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="modal-product-info">
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                    </ul>
                                                </div>
                                                <h3><a href="product-details.html">3 Rooms Manhattan</a></h3>
                                                <div class="product-price">
                                                    <span>$34,900</span>
                                                    <del>$36,500</del>
                                                </div>
                                                <hr>
                                                <div class="modal-product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Dignissimos repellendus repudiandae incidunt quidem pariatur
                                                        expedita, quo quis modi tempore non.</p>
                                                </div>
                                                <div class="modal-product-meta ltn__product-details-menu-1 d-none">
                                                    <ul>
                                                        <li>
                                                            <strong>Categories:</strong>
                                                            <span>
                                                                <a href="#">Parts</a>
                                                                <a href="#">Car</a>
                                                                <a href="#">Seat</a>
                                                                <a href="#">Cover</a>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ltn__product-details-menu-2 d-none">
                                                    <ul>
                                                        <li>
                                                            <div class="cart-plus-minus">
                                                                <input type="text" value="02" name="qtybutton"
                                                                    class="cart-plus-minus-box">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="theme-btn-1 btn btn-effect-1"
                                                                title="Add to Cart" data-bs-toggle="modal"
                                                                data-bs-target="#add_to_cart_modal">
                                                                <i class="fas fa-shopping-cart"></i>
                                                                <span>ADD TO CART</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <hr> -->
                                                <div class="ltn__product-details-menu-3">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="" title="Wishlist" data-bs-toggle="modal"
                                                                data-bs-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart"></i>
                                                                <span>Add to Wishlist</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="" title="Compare" data-bs-toggle="modal"
                                                                data-bs-target="#quick_view_modal">
                                                                <i class="fas fa-exchange-alt"></i>
                                                                <span>Compare</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="ltn__social-media">
                                                    <ul>
                                                        <li>Share:</li>
                                                        <li><a href="#" title="Facebook"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#" title="Twitter"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#" title="Linkedin"><i
                                                                    class="fab fa-linkedin"></i></a></li>
                                                        <li><a href="#" title="Instagram"><i
                                                                    class="fab fa-instagram"></i></a></li>

                                                    </ul>
                                                </div>
                                                <label class="float-end mb-0"><a class="text-decoration"
                                                        href="product-details.html"><small>View
                                                            Details</small></a></label>
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
        <!-- MODAL AREA END -->

        <!-- MODAL AREA START (Add To Cart Modal) -->
        <div class="ltn__modal-area ltn__add-to-cart-modal-area">
            <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="modal-product-img">
                                                <img src="/assests/front-end/img/product/1.png" alt="#">
                                            </div>
                                            <div class="modal-product-info">
                                                <h5><a href="product-details.html">3 Rooms Manhattan</a></h5>
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully
                                                    added to your Cart</p>
                                                <div class="btn-wrapper">
                                                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View
                                                        Cart</a>
                                                    <a href="checkout.html"
                                                        class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br>
                                                    Use discount code at checkout</p>
                                                <div class="payment-method">
                                                    <img src="/assests/front-end/img/icons/payment.png" alt="#">
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
        </div>
        <!-- MODAL AREA END -->

        <!-- MODAL AREA START (Wishlist Modal) -->
        <div class="ltn__modal-area ltn__add-to-cart-modal-area">
            <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="modal-product-img">
                                                <img src="/assests/front-end/img/product/7.png" alt="#">
                                            </div>
                                            <div class="modal-product-info">
                                                <h5><a href="product-details.html">3 Rooms Manhattan</a></h5>
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully
                                                    added to your Wishlist</p>
                                                <div class="btn-wrapper">
                                                    <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View
                                                        Wishlist</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br>
                                                    Use discount code at checkout</p>
                                                <div class="payment-method">
                                                    <img src="/assests/front-end/img/icons/payment.png" alt="#">
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
        </div>
        <!-- MODAL AREA END -->

    </div>
    <!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->

    <script src="/assests/front-end/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="/assests/front-end/js/main.js"></script>

    <script type="text/javascript">
    $(window).scroll(function(e) {
        var $el = $('.sticky-search');
        var isPositionFixed = ($el.css('position') == 'fixed');
        if ($(this).scrollTop() > 200 && !isPositionFixed) {
            $el.css({
                'position': 'fixed',
                'top': '70px'
            });
        }
        if ($(this).scrollTop() < 200 && isPositionFixed) {
            $el.css({
                'position': 'static',
                'top': '70px'
            });
        }
    });
    
    </script>

</body>

</html>