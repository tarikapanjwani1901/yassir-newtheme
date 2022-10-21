@if(isset($result) && sizeof($result)>0)
<span class="text-right">Showing {{($result->currentpage()-1)*$result->perpage()+1}} to
                                        {{ $result->currentpage()*(($result->perpage() < $result->total()) ? $result->perpage(): $result->total())}}
                                        of {{ $result->total()}} results</span>

@foreach($result as $k=>$row)
@if(!empty($row->image))
@php
$img = '/images/properties/'.$row->id.'/'.$row->imageList->first()->image;
@endphp
@else
@php
$img = '/images/default/properties/default.jpg';
@endphp
@endif

<div class="col-xl-6 col-sm-6 col-12 mb-3">
    <div class="ltn__product-item ltn__product-item-4 text-center---">
        <div class="product-img"><a href="{{ route('properties.details', ['id' => $row->id]) }}" tabindex="0"><img src="{{ $img }}" alt="#"></a>
            <div class="product-badge">
                <ul>
                    <li class="product-price">Redy to Move</li>
                </ul>
            </div>
            <div class="product-img-location-gallery">
                <div class="product-img-location">
                    <ul>
                        <li>
                            <h5 class="product-title-rent">{{$row->project_name }}</h5><a href="locations.html"
                                tabindex="0"><i class="flaticon-pin"></i> {{ $row->address }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-info">
            <h4 class="product-title"><a href="{{ route('properties.details', ['id' => $row->id]) }}" tabindex="0">{{$row->project_name }}</a></h4>
            <span><i class="flaticon-pin"></i>{{ $row->address }}</span><br><span>2 &amp;
                3 BHK</span>
            @if( $row->sub_category=='Residential')
            @php
            $price = $row->residentialInfo->expected_price ?? '0';
            @endphp
            @else
            @php
            $price = $row->total_price ?? '0';
            @endphp
            @endif
            <div class="product-price"><span>${{$price}}
                    <label>{{ $row->userInfo->userRole->name}}</label></span><a href="{{ route('properties.details', ['id' => $row->id]) }}"
                    class="btn-details theme-btn-1 btn-effect-1 text-uppercase" tabindex="0">Details</a></div>
        </div>
    </div>
</div>

@endforeach

@endif
@if(isset($result) && sizeof($result)>0)
{{ $result->links('frontend.properties.custom_pagination')}}
@else
<h3 class="text-center">No Data found</h3>
@endif