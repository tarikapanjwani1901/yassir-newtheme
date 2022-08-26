@extends('frontend.layouts.app')

@section('content')
<style>
.blogsize{
    margin-top: 0px !important;
    width:100% !important;;
}
.section-title-area {
 
  margin-top: 130px !important;
}
</style>


    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-self-center">
                    <div class="about-us-img-wrap ltn__img-shape-left  about-img-left">
                        <img src="/assests/front-end/img/blog/{{ $resultInfo->image }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-20">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About Us</h6>
                            <h1 class="section-title">{{ $resultInfo->title }}<span>.</span></h1>
                           
                            {!! $resultInfo->content !!}
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->


@endsection