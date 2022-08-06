@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row p-0">
        	@if (session('success'))
           <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            </div>
            @endif
            @if (session('error'))
            <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
                </div>
            </div>
        @endif

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header pb-3 pt-3 text-uppercase">
                    	Users
                        	        <a href="{{url('/admin/users/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New User">Add New User</a>
                         
                        </div>
                        

                    <div class="card-body ">
                            <form method="get" class="padd15" name="search" action="user_search"  autocomplete="off">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                       <div class="form-group">
                                            {!! Form::select('search_user_role', $user_role,$search_user_role,['class' => 'select2 form-control mb-5']) !!}
                                    
                                    	</div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                       <div class="form-group">
                                        <input type="search" value="{{$search_mobile_number}}" name="search_mobile_number" class="form-control" placeholder="Mobile Number">
                                    	</div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                        <input type="search" value="{{$search_first_name}}" name="search_first_name" class="form-control" placeholder="First Name">
                                    	</div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                        <input type="search" value="{{$search_last_name}}" name="search_last_name" class="form-control" placeholder="Last Name">
                                    	</div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                        <input type="search" value="{{$search_company_name}}" name="search_company_name" class="form-control" placeholder="Company Name">
                                    	</div>
                                    </div>
                                    
                                    
                                    
                                <div class="col-md-3">
                                          <div class="form-group"> 
                                        {!! Form::select('search_country', $countries,$search_country,['class' => 'select2 form-control mb-5 search_country', 'id' => 'search_country']) !!}
                                    </div>
                                    </div>

                                    <div class="col-md-3">
                                           <div class="form-group">
                                        {!! Form::select('search_state', $states,$search_state,['class' => 'select2 form-control mb-5 search_state', 'id' => 'search_state']) !!}
                                    </div>
                                   </div>

                                    <div class="col-md-3">
                                           <div class="form-group">
                                        {!! Form::select('search_city', $cities,$search_city,['class' => 'select2 form-control mb-5 search_city', 'id' => 'search_city']) !!}
                                    </div>
                                    </div>

                                    <div class="col-md-3">
                                           <div class="form-group">
                                        {!! Form::select('search_sub_city', $sub_cities,$search_sub_city,['class' => 'select2 form-control mb-5 search_sub_city', 'id' => 'search_sub_city']) !!}
                                    </div>
                                    </div>


                                    <div class="col-md-2">
                                     <div class="form-group">
                                        {!! Form::select('search_status', $status,$search_status,['class' => 'select2 form-control search_status size-1 form-control wide', 'id' => 'search_status']) !!}
                                    </div>
                                    </div>
                                    
                                     <div class="col-md-3">
                            	<input type="submit" class="btn btn-primary text-uppercase" value="Submit">
                                <a href="{{url('/admin/users')}}"  data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light text-uppercase" value="Reset"></a>
                            </div>

							</div>                                    
                            
                            </form>    
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Mobile Number</th>
                                        <th>First Name</th>
                                         <th>Last Name</th>
                                         <th>Company Name</th>
                                         <th>Country</th>
                                         <th>State</th>
                                         <th>City</th>
                                          <th>Sub City</th>
                                        <th>Status</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($users))
                                        <?php foreach ($users as $key => $value) { ?>
                                            <tr id="tr_{{ $value->id}}">
                                                <td><?php if($value->user_role=="1"){echo "Admin";}
												if($value->user_role=="3"){echo "Vendor";}
												if($value->user_role=="4"){echo "Sales";}
												if($value->user_role=="5"){echo "Customer";}
												if($value->user_role=="6"){echo "Marketing";} ?></td>
                                                <td><?php echo $value->mobile; ?></td>
                                                <td><?php echo $value->first_name; ?></td>
                                                <td><?php echo $value->last_name; ?></td>
                                                <td><?php echo $value->company_name; ?></td>
                                                <td><?php echo $value->country_name; ?></td>
                                                <td><?php echo $value->state_name; ?></td>
                                                <td><?php echo $value->city_name; ?></td>
                                                <td><?php echo $value->sub_city_name; ?></td>
                                                
                                                <td><?php echo $value->status; ?></td>
                                                <td  align="center">
                                                        <a href="users/edit/{{ $value->id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#user_delete_confirm"  data-id="{{ $value->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                   <?php if($value->status=="Active"){ ?>
                                                  <a href="#" data-toggle="modal"   data-id="{{ $value->id }}" data-title="Inactive" title="Inactive" class="statusUpdate btn btn-warning shadow btn-xs sharp"><i class="fas fa-lock"></i></a>
                                                  <?php }else{
                                                     ?>
                                                                      <a href="#" data-toggle="modal" data-title="Active"  title="Active"  data-id="{{ $value->id }}" class="statusUpdate btn btn-success shadow btn-xs sharp"><i class="fas fa-lock-open"></i></a>
                                					<?php  
                                                     } ?>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    @else
                                    <tr> 
                                        <td colspan="11">No records found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
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
                    <h4 class="modal-title">Remove User</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-footer">
                	
                	    <button type="button" id="close" class="btn btn-light close text-uppercase">Cancel</button>
                    <button type="button" id="btn_ok_1" class="btn btn-primary text-uppercase">Sure</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="statusUpdateModel" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">User Status</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to <span class="update_user_status text-lowercase" ></span> this user?</p>
                </div>
                <input type="hidden" name="user_id" id="user_id" value="">
                <input type="hidden" name="user_status" id="user_status" value="">
                <div class="modal-footer">
                	    <button type="button" id="close" class="btn btn-light close text-uppercase">Cancel</button>
                    <button type="button" id="update_user_status_btn" class="btn btn-primary text-uppercase">Sure</button>
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
			$('#statusUpdateModel').modal('hide');
        });
		
        $(document).on("click", ".statusUpdate", function () {
            var id = $(this).data('id');
			jQuery(".update_user_status").html(jQuery(this).attr("data-title"));
			
            $("#statusUpdateModel #user_status").val( jQuery(this).attr("data-title") );
           
		    $("#statusUpdateModel #user_id").val( id );
            $('#statusUpdateModel').modal('show');
        });

		$(document).on("click", ".onclick", function () {
            var id = $(this).data('id');
            $(".modal-dialog #id").val( id );
            $('#myModal').modal('show');
        });
		
        jQuery("#update_user_status_btn").on('click',function(){
        	var token = $('meta[name="csrf_token"]').attr('content');
            var id = jQuery("#user_id").val();
			 var user_status = jQuery("#user_status").val();
            $.ajax({
            type:'POST',
            url:'/admin/users/status/'+id+"/"+user_status,
            data:{_token: token},
            success:function(data){
                    if (data == 'success') {
                        $( ".close" ).trigger( "click" );
                        window.location.reload();
                    }
            }
            });
        });


        jQuery("#btn_ok_1").on('click',function(){
        	var token = $('meta[name="csrf_token"]').attr('content');
            var id = jQuery("#id").val();
            $.ajax({
            type:'POST',
            url:'/admin/users/delete/'+id,
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
$("#search_state").on('change',function(){

var state = $('#state').val();
  $("#search_city").empty();
  $("#search_city").append('<option value="">Pleasse select city</option>');
  
  $("#search_sub_city").empty();
  $("#search_sub_city").append('<option value="">Please select sub city</option>');
  $("#search_area").empty();
  $("#search_area").append('<option value="">Please select area</option>');

               
if (state !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getCity')}}?state="+this.value,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#search_city").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}

});

$("#search_city").on('change',function(){

var city = $('#city').val();
  $("#search_sub_city").empty();
  $("#search_sub_city").append('<option value="">Please select sub city</option>');
  $("#search_area").empty();
  $("#search_area").append('<option value="">Please select area</option>');
               
if (city !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getSubCity')}}?city="+this.value,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#search_sub_city").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}
});



function getState(){
var country = $('#search_country').val();

$("#search_state").empty();
$("#search_state").append('<option value="">Please select state</option>');
 $("#search_city").empty();
$("#search_city").append('<option value="">Pleasse select city</option>');

  $("#search_sub_city").empty();
  $("#search_sub_city").append('<option value="">Please select sub city</option>');

  $("#search_area").empty();
  $("#search_area").append('<option value="">Please select area</option>');

  
                  
if (country !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getState')}}?country="+country,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#search_state").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}
	
}
$("#search_country").on('change',function(){
getState();
});

    </script>
@endsection