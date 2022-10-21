@extends('frontend.homelayouts.app')

@section('content')
<div class="body-wrapper">
    <div class="ltn__utilize-overlay"></div>
    <!-- BREADCRUMB AREA START -->
    <div class="clearfix"></div>
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-100 mt-11">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  custom-shop-option">
                    <div class="ltn__shop-options mt-118">
                        <ul>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select" id="sortByPro" onchange="sortByProperties('{{ $type }}')">
                                   
                                        <option value="">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="new arrivals">Sort by new arrivals</option>
                                        <option value="low to high">Sort by price: low to high</option>
                                        <option value="high to low">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <!-- <div class="showing-product-number text-right" id="showingProduct">
                                    <span>Showing {{($result->currentpage()-1)*$result->perpage()+1}} to
                                        {{ $result->currentpage()*(($result->perpage() < $result->total()) ? $result->perpage(): $result->total())}}
                                        of {{ $result->total()}} results</span>
                                      
                                </div> -->
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row mb-5">
                                    <div class="col-lg-12 custom-shop-option">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                        <form method="post" onsubmit="return searchForProperties('{{ $type }}')">
                                            <input type="text" id="searchKey" name="searchKey" placeholder="Search your keyword..." >
                                            <button type="submit"><i class="fas fa-search"></i></button>
                                        </form>
                                        </div>
                                    </div>
                                    <h2>Find property by categories</h2>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-xl-3 col-lg-3 mt-2">
                                            <div class="p-2 pb-0  category bg">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h5>House</h5>
                                                        <p>{{ $totalHouse }} listed house </p>
                                                    </div>
                                                    <div class="col-4 icon">
                                                        <i class="fas fa-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 col-lg-3 mt-2">
                                            <div class=" category bg p-2 pb-0">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h5>Apartement </h5>
                                                        <p>{{ $totalApartement }} listed apartement </p>
                                                    </div>
                                                    <div class="col-4 icon">
                                                        <i class="fa-solid fa-building"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 col-lg-3 mt-2">
                                            <div class=" category bg p-2 pb-0">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h5>Commercial </h5>
                                                        <p>{{$totalCommercial}} listed commercial </p>
                                                    </div>
                                                    <div class="col-4 icon">
                                                        <i class="fa-solid fa-shop"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 col-lg-3 mt-2">
                                            <div class=" category bg p-2 pb-0">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h5>Office</h5>
                                                        <p>{{ $totalOffice }} listed office </p>
                                                    </div>
                                                    <div class="col-4 icon">
                                                        <i class="fa-solid fa-hotel"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h2 class="pb-3">
                                        Latest Property Listed
                                    </h2>
                                    <div class="col-lg-8 order-lg-2 mb-100 category-list">
                                        
                                        <div class="row" id="propertyRentSell">
                                            @include('frontend.properties.property_data')
                                        </div>
                                    </div>
                                    <div class="col-lg-4  mb-100">
                                        <aside class="sidebar ltn__shop-sidebar">
                                            <!-- Advance Information widget -->
                                            <div class="widget ltn__menu-widget">
                                                <!-- Price Filter Widget -->
                                                <div class="widget--- ltn__price-filter-widget">
                                                    <h4 class="ltn__widget-title ltn__widget-title-border---">Filter by
                                                        price</h4>
                                                    <div class="price_filter">
                                                        <div class="price_slider_amount">
                                                            <input type="submit" value="Your range:">
                                                            <input type="text" class="amount" name="price"
                                                                placeholder="Add Your Price">
                                                        </div>
                                                        <div
                                                            class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                            <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                                style="left: 0%; width: 29.2929%;"></div><span
                                                                class="ui-slider-handle ui-state-default ui-corner-all"
                                                                tabindex="0" style="left: 0%;"></span><span
                                                                class="ui-slider-handle ui-state-default ui-corner-all"
                                                                tabindex="0" style="left: 29.2929%;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </aside>
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
<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
<input type="hidden" id="minRange" value="0" />
<input type="hidden" id="maxRange" value="0" />
                                    

                                        
                    
                    

@endsection
@push('script')
<script>
    
   var proType = "{{ $type }}";
  
    $( ".slider-range" ).slider({
        range: true,
        min: 1000,
        max: 500000,
        values: [1000, 500000],
        stop: function( event, ui ) {
            $( ".amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            $( "#minRange" ).val(ui.values[0]);
            $( "#maxRange" ).val(ui.values[1]);
          
            var searchKey = $('#searchKey').val();
            var sortByPro = $('#sortByPro').val();
            var page = $('#hidden_page').val();
            var minRange =ui.values[ 0 ];
            var maxRange =ui.values[ 1 ];
            getProperties(proType,searchKey,sortByPro,page,minRange,maxRange,minRange,maxRange);
        }

        
    },);
    $( ".amount" ).val( "$" + $( ".slider-range" ).slider( "values", 0 ) +
    " - $" + $( ".slider-range" ).slider( "values", 1 ) ); 
   
    
$(document).on('click', '.ltn__pagination a', function(event){
  event.preventDefault();
  
   var page = $(this).attr('href').split('page=')[1];
   $('#hidden_page').val(page);
   var searchKey = $('#searchKey').val();
    var sortByPro = $('#sortByPro').val();
    var minRange = $('#minRange').val();
    var maxRange = $('#maxRange').val();
    $('li').removeClass('active');
        $(this).parent().addClass('active');
    getProperties(proType,searchKey,sortByPro,page,minRange,maxRange) 
 });

 function searchForProperties(proType){
    // console.log(12321123);
    var searchKey = $('#searchKey').val();
    var sortByPro = $('#sortByPro').val();
    var page = $('#hidden_page').val();
    var minRange = $('#minRange').val();
    var maxRange = $('#maxRange').val();
    getProperties(proType,searchKey,sortByPro,page,minRange,maxRange) 
    return false;
 }
 function sortByProperties(proType){
    var sortByPro = $('#sortByPro').val();
    var searchKey = $('#searchKey').val();
    var page = $('#hidden_page').val();
    var minRange = $('#minRange').val();
    var maxRange = $('#maxRange').val();
     getProperties(proType,searchKey,sortByPro,page,minRange,maxRange) 
 }

function getProperties(proType,searchKey,sortByPro,page,minRange,maxRange) {
    
    $.ajax({
        url: "{{ route('properties.type.ajax') }}",
        type: "post",
        data: {
            proType: proType,
            _token: '{{ csrf_token() }}',
            searchKey: searchKey,
            sortByPro:sortByPro,
            page:page,
            minRange:minRange,
            maxRange:maxRange,
        },
        // dataType:'json',
        success: function(response) {
            
            $('#propertyRentSell').html();
            $('#propertyRentSell').html(response);

        }
    });
}
</script>
@endpush