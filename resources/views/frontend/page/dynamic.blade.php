@extends('frontend.layouts.app')

@section('content')
<div class="ltn__utilize-overlay"></div>
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">What We Do</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="#"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                <li>{{$cmsInfo->title}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pb-115">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-20">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">{{$cmsInfo->title}}</h6>
                            {!! $cmsInfo->description !!}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->


@endsection