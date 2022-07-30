@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">

        <div class="row p-0">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header pb-3 pt-3 text-uppercase">
                    	Cities
                        	        <a href="{{url('/admin/cities/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New City">Add New City</a>
                         
                        </div>
                    
                    <div class="card-body">
                            <form method="get" class="padd15" name="search" action="cities_search"  autocomplete="off">
                                <div class="row p-0">
                                    <div class="col-md-2">
                                     <div class="form-group">
                                    <input type="search" value="{{$search_keyword}}" name="search_keyword" class="form-control" placeholder="City" >
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                     <div class="form-group">
                                    {!! Form::select('search_country', $countries,$search_country,['class' => 'select2 form-control search_country', 'id' => 'search_country']) !!}
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                     <div class="form-group">
                                    {!! Form::select('search_state', $states,$search_state,['class' => 'select2 form-control search_state', 'id' => 'search_state']) !!}
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                     <div class="form-group">
                                    {!! Form::select('search_status', $status,$search_status,['class' => 'select2 form-control search_status', 'id' => 'search_status']) !!}
                                    </div>              
                                    
                                    </div>
                                   <div class="col-md-3">
                            	<input type="submit" class="btn btn-primary text-uppercase" value="Submit">
                                <a href="{{url('/admin/cities')}}"  data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light text-uppercase" value="Reset"></a>
                            </div>
        	                    </div>
                            </form>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>City Name</th>
                                        <th>State Name</th>
                                        <th>Country Name</th>
                                        <th>Status</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($cities))
                                        <?php foreach ($cities as $key => $value) { ?>
                                            <tr id="tr_{{ $value->city_id}}">
                                                <td><?php echo $value->city_name; ?></td>
                                                <td><?php echo $value->state_name; ?></td>
                                                <td><?php echo $value->country_name; ?></td>
                                                <td><?php echo $value->status; ?></td>
                                                <td  align="center">
                                                        <a href="cities/edit/{{ $value->city_id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#cities_delete_confirm"  data-id="{{ $value->city_id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                   
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        @else
                                        <tr> 
                                            <td colspan="6">No records found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $cities->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Remove City</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this city?</p>
            </div>
            <input type="hidden" name="id" id="id" value="">
            <div class="modal-footer">
            	
            	<button type="button" id="close" class="btn btn-light close text-uppercase">Cancel</button>
                        
                <button type="button" id="btn_ok_1" class="btn btn-primary text-uppercase">Sure</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('customjs')
    <script type="text/javascript">
        jQuery(document).ready(function () {

            $(".select2").select2();
            
            $(document).on("click", ".close", function () {
                $('#myModal').modal('hide');
            });

            $(document).on("click", ".onclick", function () {
                var id = $(this).data('id');
                $(".modal-dialog #id").val( id );
                $('#myModal').modal('show');
            });

            jQuery("#btn_ok_1").on('click',function(){
                var token = $('meta[name="csrf_token"]').attr('content');
                var id = jQuery("#id").val();
                $.ajax({
                    type:'POST',
                    url:'/admin/cities/delete/'+id,
                    data:{_token: token},
                    success:function(data){
                        if (data == 'success') {
                            $( ".close" ).trigger( "click" );
                            $("#tr_"+id).css('display','none');
                            window.location.reload();
                        }
                    }
                });
            });

        });

getState();
function getState(){
var country = $('#search_country').val();
@php 
$search_state_r="";
if(isset($_REQUEST['search_state'])){
	$search_state_r = $_REQUEST['search_state'];
}
@endphp
	

var search_state = "{{$search_state_r}}";
$("#search_state").empty();
$("#search_state").append('<option value="">Please select state</option>');
                  
if (country !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getState')}}?country="+country,
        success:function(data){
            if ( data ) {
                var selected_state;
                $.each( data, function( key, value ) {
					selected_state = "";
					if(search_state==key){
						selected_state = "selected";
					}
                    $("#search_state").append('<option value="'+key+'" '+selected_state+'>'+value+'</option>');
                });
            }
        }
    })
  
}
	
}
jQuery(document).on("change","#search_country",function(){
	getState();
});
</script>
@endsection