@extends('frontend.layouts.app')

@section('content')
<style>
.blogsize{
    margin-top: 0px !important;
    width:100% !important;;
}
.section-title-area {
  margin-top: 100px !important;
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
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Blogs</h6>
                        <h1 class="section-title">Top Blogs Listing</h1>
                    </div>
                </div>
            </div>
            <div class="row  ltn__feature-item ltn__feature-item-6 text-center bg-white box-shadow-1 active">
                <!-- Blog Item -->
                @foreach ($result as $row)
                    
                
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                        <!-- /assests/front-end/img/blog/1.jpg -->
                            <a href="blog-details.html"><img src="/assests/front-end/img/blog/{{ $row->image }}" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief blogsize">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>
                                        @foreach ($row->blog_tag as $tag)
                                            {{ $tag->tag_name->title }}@if (!$loop->last),@endif
                                        @endforeach
                                    </a>
                                    </li>
                                </ul>
                            </div>
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
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->


@endsection


