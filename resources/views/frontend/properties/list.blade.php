@extends('frontend.layouts.app')

@section('content')
<style>
.blogsize {
    margin-top: 0px !important;
    width: 100% !important;
    ;
}
</style>
<div class="ltn__utilize-overlay"></div>
<!-- BREADCRUMB AREA START -->
<!-- BLOG AREA START (blog-3) -->
<div class="ltn__product-slider-area ltn__product-gutter pt-50 pb-50 plr--7">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">properties</h6>
                    <h1 class="section-title">Top properties Listing</h1>
                </div>
            </div>
        </div>
        <div class="row  ltn__feature-item ltn__feature-item-6 text-center bg-white box-shadow-1 active">
            <!-- Blog Item -->
            @if(isset($result) && sizeof($result)>0)
           
            @foreach ($result as $row)
           
          
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__product-item ltn__product-item-4 text-center---">
                    <div class="product-img">
                        <a href="product-details.html" tabindex="0">
                            
                            <!-- <img src="/assests/front-end/img/product-3/3.jpg" alt="#"> -->
                            <img src="/images/properties/{{$row->id}}/{{$row->imageList->first()->image ?? ''}}" alt="#">
                        </a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge bg-green">For Rent </li>
                            </ul>
                        </div>
                        <div class="product-img-location-gallery">
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="locations.html" tabindex="0"><i class="flaticon-pin"></i> {{ $row->address }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-img-gallery">
                                <ul>
                                    <li>
                                        <a href="product-details.html" tabindex="0"><i class="fas fa-camera"></i> 4</a>
                                    </li>
                                    <li>
                                        <a href="product-details.html" tabindex="0"><i class="fas fa-film"></i> 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-price">
                            <span>{{ $row->total_price}}</span>
                        </div>
                         <h2 class="product-title"><a href="#">{{$row->project_name }}</a></h2>
                       
                        <ul class="ltn__list-item-2 ltn__list-item-2-before">
                            <li><span>{{ $row->number_of_bedrooms}} <i class="flaticon-bed"></i></span>
                                Bedrooms
                            </li>
                            <li><span>{{ $row->number_of_bathrooms}} <i class="flaticon-clean"></i></span>
                                Bathrooms
                            </li>
                            <li><span>{{ $row->carpet_area}} <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                square Ft
                            </li>
                        </ul>
                    </div>
                    <div class="product-info-bottom">
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal" tabindex="0">
                                        <i class="flaticon-expand"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal" tabindex="0">
                                        <i class="flaticon-heart-1"></i></a>
                                </li>
                                <li>
                                    <a href="product-details.html" title="Product Details" tabindex="0">
                                        <i class="flaticon-add"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- BLOG AREA END -->


@endsection