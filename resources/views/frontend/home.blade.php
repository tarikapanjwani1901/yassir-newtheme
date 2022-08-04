@extends('frontend.layouts.app')

@section('content')
<!-- SLIDER AREA START (slider-4) -->
    <div class="ltn__slider-area ltn__slider-4 position-relative ltn__primary-bg fix">
        <div class="ltn__slide-one-active----- slick-slide-arrow-1----- slick-slide-dots-1----- arrow-white----- ltn__slide-animation-active">
            
            <!-- HTML5 VIDEO -->
            <video autoplay muted loop id="myVideo">
                <source src="/assests/front-end/media/3.mp4" type="video/mp4">
            </video>

            <!-- ltn__slide-item -->
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-7 bg-image--- bg-overlay-theme-black-30" data-bs-bg="/assests/front-end/img/slider/41.jpg">
            <div class="ltn__slide-item-inner text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="slide-item-car-dealer-form">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <h6 class="slide-sub-title white-color animated"><span><i class="fas fa-home"></i></span> Real Estate Agency</h6>
                                    <h1 class="slide-title text-uppercase white-color animated ">Find Your Dream <br> House By Us</h1>
                                </div>

                                <div class="ltn__car-dealer-form-tab">
                                    <div class="tab-content pb-10">
                                        <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                            <div class="widget ltn__search-widget p-0 border-0">
                                                <form action="#">
                                                    <input type="text" name="search" placeholder="Enter Locality / Project / Landmark" style="border-radius: 50px">
                                                    <button type="submit" style="border-radius: 50px"><i class="fas fa-search"></i></button>
                                                </form>
                                            </div>                                                
                                        </div>
                                        <div class="tab-pane fade" id="ltn__form_tab_1_2">
                                            <div class="car-dealer-form-inner">
                                                <form action="#" class="ltn__car-dealer-form-box row"> 
                                                    <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-car col-lg-3 col-md-6">
                                                        <select class="nice-select">
                                                            <option>Property Type</option>
                                                            <option>Apartment</option>
                                                            <option>Co-op</option>
                                                            <option>Condo</option>
                                                            <option>Single Family Home</option>
                                                        </select>
                                                    </div> 
                                                    <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-meter col-lg-3 col-md-6">
                                                        <select class="nice-select">
                                                            <option>Location</option>
                                                            <option>chicago</option>
                                                            <option>London</option>
                                                            <option>Los Angeles</option>
                                                            <option>New York</option>
                                                            <option>New Jersey</option>
                                                        </select>
                                                    </div> 
                                                    <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                                        <select class="nice-select">
                                                            <option>Sub Location</option>
                                                            <option>Bayonne</option>
                                                            <option>Greenville</option>
                                                            <option>Manhattan</option>
                                                            <option>Queens</option>
                                                            <option>The Heights</option>
                                                            <option>Upper East Side</option>
                                                            <option>West Side</option>
                                                        </select>
                                                    </div>
                                                    <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">
                                                        <div class="btn-wrapper text-center mt-0">
                                                            <a href="shop-right-sidebar.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search</a>
                                                        </div>
                                                    </div>
                                                </form>
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
    </div>
    <!-- SLIDER AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pt-50 pb-50 plr--7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Top Rated Aria of Rent</h6>
                        <h1 class="section-title">Trending Apartments For Rent</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/1.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">For Rent</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                           <!--  <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div> -->
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/2.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green---">For Sale</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Modern Apartments</a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                           <!--  <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div> -->
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/3.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">For Rent</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Comfortable Apartment</a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                           <!--  <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div> -->
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/4.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">For Rent</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Luxury villa in Rego Park </a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                          <!--   <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div> -->
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/5.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">For Rent</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Beautiful Flat in Manhattan </a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                            <!-- <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div> -->
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->

    <!-- SEARCH BY PLACE AREA START (testimonial-7) -->
    <div class="ltn__search-by-place-area before-bg-top bg-image-top--- pt-15 pb-70" data-bs-bg="/assests/front-end/img/bg/20.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">Area Properties</h6>
                        <h1 class="section-title">Find Your Dream House<br>
                            Search and Buy your Dream house</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__search-by-place-slider-1-active slick-arrow-1">
                <div class="col-lg-3">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/1.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>2 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">San Francisco</a></h6>
                            <h4><a href="product-details.html">Mission District Area</a></h4>
                            <div class="search-by-place-btn">
                                <a href="product-details.html">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/2.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>5 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">New York</a></h6>
                            <h4><a href="product-details.html">Pacific Heights Area</a></h4>
                            <div class="search-by-place-btn">
                                <a href="product-details.html">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/3.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>9 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">Sedona, Arizona</a></h6>
                            <h4><a href="product-details.html">Noe Valley Zones</a></h4>
                            <div class="search-by-place-btn">
                                <a href="product-details.html">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/2.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li>5 Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h6><a href="locations.html">New York</a></h6>
                            <h4><a href="product-details.html">Pacific Heights Area</a></h4>
                            <div class="search-by-place-btn">
                                <a href="product-details.html">View Property <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- SEARCH BY PLACE AREA END -->

<!-- FEATURE AREA START ( Feature - 6) -->
<div class="ltn__feature-area section-bg-1 pt-20 pb-20 mb-50---">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title-area ltn__section-title-2--- text-left">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Services</h6>
                        <h1 class="section-title">Our Main Focus</h1>
                    </div>                            
                    <div class="row ltn__custom-gutter--- justify-content-center">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                                <div class="ltn__feature-icon">
                                    <img src="/assests/front-end/img/icons/icon-img/23.png" alt="#">
                                </div>
                                <div class="ltn__feature-info">
                                    <p>Dedicated Relationship Manager*</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1 active">
                                <div class="ltn__feature-icon">
                                    <!-- <span><i class="flaticon-house-3"></i></span> -->
                                    <img src="/assests/front-end/img/icons/icon-img/property.png" alt="#">
                                </div>
                                <div class="ltn__feature-info">
                                    <!-- <h3><a href="service-details.html">Rent a home</a></h3> -->
                                    <p>500+ Businesses are Growing with Yas Sir</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                                <div class="ltn__feature-icon">
                                    <img src="/assests/front-end/img/icons/icon-img/100+city.png" alt="#">
                                </div>
                                <div class="ltn__feature-info">
                                    <p>100+ Properties Listed already</p>
                               </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                                <div class="ltn__feature-icon">
                                    <img src="/assests/front-end/img/icons/icon-img/costomer.png" alt="#">
                                </div>
                                <div class="ltn__feature-info">
                                    <p>1 Lac+ Customers are Looking for Your Product</p>
                               </div>
                            </div>
                        </div>
                    </div>
                 </div>

                 <div class="bg-body col-lg-4">
                    <div class="section-title-area ltn__section-title-2--- text-right mb-0">
                        <h1 class="section-title pt-20">Advice</h1>
                            <div class="col-md-12">
                                <a href="product-details.html" tabindex="0">
                                    <img src="/assests/front-end/img/ad-01.jpg">
                                </a> 
                             </div>      

                            <div class="mt-30">
                                 <a href="product-details.html" tabindex="0" class="pt-50">
                                    <img src="/assests/front-end/img/ad-02.jpg">
                                </a>     
                            <div class="col-md-12">
                                
                            </div>                 
                    </div> 
                </div>


            

        </div>
    </div>
    </div>
    <!-- FEATURE AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pt-60 pb-50 plr--7">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Properties Sale</h6>
                        <h1 class="section-title">Our Listings</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/1.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">For Sale</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/assests/front-end/img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/2.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green---">For Sale</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Modern Apartments</a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/assests/front-end/img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/3.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">For Sale</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Comfortable Apartment</a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/assests/front-end/img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/4.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">For Sale</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Luxury villa in Rego Park </a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/assests/front-end/img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-4 text-center---">
                        <div class="product-img">
                            <a href="product-details.html"><img src="/assests/front-end/img/product-3/5.jpg" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge bg-green">For Sale</li>
                                </ul>
                            </div>
                            <div class="product-img-location-gallery">
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-img-gallery">
                                    <ul>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a href="product-details.html">Beautiful Flat in Manhattan </a></h2>
                            <div class="product-description">
                                <p>Beautiful Huge 1 Family House In Heart Of <br>
                                    Westbury. Newly Renovated With New Wood</p>
                            </div>
                            <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                <li><span>3 <i class="flaticon-bed"></i></span>
                                    Bedrooms
                                </li>
                                <li><span>2 <i class="flaticon-clean"></i></span>
                                    Bathrooms
                                </li>
                                <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                    square Ft
                                </li>
                            </ul>
                        </div>
                        <div class="product-info-bottom">
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/assests/front-end/img/blog/author.jpg" alt="#"></a>
                                </div>
                                <div class="agent-brief">
                                    <h6><a href="team-details.html">William Seklo</a></h6>
                                    <small>Estate Agents</small>
                                </div>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="flaticon-heart-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->

    <!-- CATEGORY AREA START -->
    <div class="ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90 d-none" data-bs-bg="img/bg/5.jpg">
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


    <!-- BLOG AREA START (blog-3) -->
    <div class="ltn__blog-area pt-50--- pb-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">The Most Search Top Rated Projects</h6>
                        <h1 class="section-title">Top Rated Listing</h1>
                    </div>
                </div>
            </div>
            <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="/assests/front-end/img/blog/1.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Decorate</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">10 Brilliant Ways To Decorate Your Home</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="/assests/front-end/img/blog/2.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Interior</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">The Most Inspiring Interior Design Of 2021</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="/assests/front-end/img/blog/3.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Estate</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">Recent Commercial Real Estate Transactions</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>May 22, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="/assests/front-end/img/blog/4.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Room</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">Renovating a Living Room? Experts Share Their Secrets</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="/assests/front-end/img/blog/5.jpg" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>Trends</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">7 home trends that will shape your house in 2021</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-20 pb-90 ">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About Us</h6>
                            <h1 class="section-title">Today Sells Properties</h1>
                            <p>Houzez allow you to design unlimited panels and real estate custom
                                forms to capture leads and keep record of all information</p>
                        </div>
                        <ul class="ltn__list-item-1 ltn__list-item-1-before clearfix">
                            <li> Live Music Cocerts at Luviana</li>
                            <li>Our SecretIsland Boat Tour is Just for You</li>
                            <li>Live Music Cocerts at Luviana</li>
                            <li>Live Music Cocerts at Luviana</li>
                        </ul>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before ltn__flat-info">
                            <li><span>3 <i class="flaticon-bed"></i></span>
                                Bedrooms
                            </li>
                            <li><span>2 <i class="flaticon-clean"></i></span>
                                Bathrooms
                            </li>
                            <li><span>2 <i class="flaticon-car"></i></span>
                                Car parking
                            </li>
                            <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                square Ft
                            </li>
                        </ul>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before--- ltn__list-item-2-img mb-50">
                            <li>
                                <a href="img/img-slide/11.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/11.jpg" alt="Image">
                                </a>
                            </li>
                            <li>
                                <a href="img/img-slide/12.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/12.jpg" alt="Image">
                                </a>
                            </li>
                            <li>
                                <a href="img/img-slide/13.jpg" data-rel="lightcase:myCollection">
                                    <img src="img/img-slide/13.jpg" alt="Image">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-lg-12 align-self-center">
                    <div class="about-us-img-wrap about-img-right">
                        <img src="/assests/front-end/img/others/9.png" alt="About Us Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6" data-bs-bg="/assests/front-end/img/1.jpg--" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                        <div class="coll-to-info text-color-white">
                            <h2>Looking for a dream home?</h2>
                            <p>We can help you realize your dream of a new home</p>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-3 btn-white" href="contact.html">Explore Properties <i class="icon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->


@endsection