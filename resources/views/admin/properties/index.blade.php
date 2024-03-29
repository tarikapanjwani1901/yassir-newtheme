@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
       
        <div class="row  p-0">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header pb-3 pt-3 text-uppercase">
                    	Properties
                        	        <a href="{{url('/admin/properties/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New Property">Add New Property</a>
                         
                        </div>
                  
                 	<div class="card-body">
                    
       					 <form method="get" class="padd15" name="search" action="properties_search"  autocomplete="off">
                        	<div class="row pl-0 pt-0 status_property_list">
                            	<div class="col-md-3 p-0 d-flex">
                                	 <div class="unComplicatedProperty"></div>
                           				<label>Uncompleted Property</label>
                                </div>
                                <div class="col-md-3 d-flex">
                                	 <div class="inActiveProperty"></div>
                           				<label>Inactive Property</label>
                                </div>
                            </div>
                            
                        <div class="row p-0">
                        	<div class="col-md-2">
                            	<div class="form-group">
                                    <input type="text" placeholder="Property Name" value="{{$search_keyword}}" name="search_keyword" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                            	<div class="form-group">
                                
                                     <select name="search_vendor" id="search_vendor" class="form-control select2" >
                                       <option value="">Vendor</option>
                                       @foreach($vendors as $v)
                                       @if($search_vendor==$v->id)
                                       <option value="{{$v->id}}" selected="selected">{{$v->company_name}}</option>
                                       @else
                                       <option value="{{$v->id}}">{{$v->company_name}}</option>
                                       @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                            	<div class="form-group">
                                 {!! Form::select('search_for', $propertyFor,$search_for,['class' => 'select2 form-control', 'id' => 'search_for']) !!}
                                
                                </div>
                            </div>
                            <div class="col-md-3">
                            	<div class="form-group">
                                   {!! Form::select('search_sub_category', $SubCategory,$search_sub_category,['class' => 'select2 form-control', 'id' => 'search_sub_category']) !!}
                                   
                                   
                                </div>
                            </div>
                            <div class="col-md-2">
                            	<div class="form-group">
                                   {!! Form::select('search_completed_property', $completed_property,$search_completed_property,['class' => 'select2 form-control', 'id' => 'search_completed_property']) !!}
                                   
                                   
                                </div>
                            </div>
                            <div class="col-md-2">
                            	<div class="form-group">
                                   {!! Form::select('search_status', $status,$search_status,['class' => 'select2 form-control', 'id' => 'search_status']) !!}
                                   
                                   
                                </div>
                            </div>
                            
                           
                            <div class="col-md-3">
                            	<input type="submit" class="btn btn-primary" value="Submit">
                                
                            	
                                 <a href="{{url('/admin/properties')}}" data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light" value="Reset"></a>
                            </div>
                        </div>   
                        </form>          	
                        <div class="table-responsive">
                            <table class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th class="ac" align="center">Property Name</th>
                                        <th>Vendor</th>
                                        <th>Property For</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>City</th>
                                        <th>Sub City</th>
                                        <th>Completed Property</th>
                                        <th>Status</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($properties))
                                    <?php foreach ($properties as $key => $value) { 
										$class = "";
										if($value->status=="Inactive"){
											$class="InactiveRow";
										}
										else if($value->completed_property=="No"){
											$class="IncompltedRow";
										}
									?>
                                        <tr class="<?php echo $class;  ?>" id="tr_{{ $value->id }}">
                                            <td><?php echo $value->project_name; ?></td>
                                            <td><?php echo $value->company_name; ?></td>
                                            <td><?php echo $value->property_for; ?></td>
                                            <td><?php if($value->category=="IndustrialParkShades"){echo "Industrial Park/Shades";}
											else if($value->category=="VacantLandPlotting"){echo "Vacant Land/ Plotting";}else{
												echo $value->category;
												} ?></td>
                                            <td><?php echo $value->sub_category; ?></td>
                                            <td><?php echo $value->city_name; ?></td>
                                            <td><?php echo $value->sub_city_name; ?></td>
                                            
                                            <td><?php echo $value->completed_property; ?></td>
                                            
                                            <td><?php echo $value->status; ?></td>
                                            
                                            <td align="center">
                                                    <a href="properties/edit/{{ $value->id }}" title="Edit" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#tes_delete_confirm" title="Delete"  data-id="{{ $value->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
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
                                            <td colspan="10">No records found</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        {{ $properties->links() }}
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
                    <h4 class="modal-title">Remove Porperty</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this property?</p>
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
                    <h4 class="modal-title">Porperty Status</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to <span class="update_property_status text-lowercase" ></span> this property?</p>
                </div>
                <input type="hidden" name="property_id" id="property_id" value="">
                <input type="hidden" name="property_status" id="property_status" value="">
                <div class="modal-footer">
                	    <button type="button" id="close" class="btn btn-light close text-uppercase">Cancel</button>
                    <button type="button" id="update_property_status_btn" class="btn btn-primary text-uppercase">Sure</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customjs')
<script>
    jQuery(document).ready(function () {
		$(".select2").select2();
        $(document).on("click", ".close", function () {
            $('#myModal').modal('hide');
			$('#statusUpdateModel').modal('hide');
        });
		
        $(document).on("click", ".statusUpdate", function () {
            var id = $(this).data('id');
			jQuery(".update_property_status").html(jQuery(this).attr("data-title"));
			
            $("#statusUpdateModel #property_status").val( jQuery(this).attr("data-title") );
           
		    $("#statusUpdateModel #property_id").val( id );
            $('#statusUpdateModel').modal('show');
        });

		$(document).on("click", ".onclick", function () {
            var id = $(this).data('id');
            $(".modal-dialog #id").val( id );
            $('#myModal').modal('show');
        });
		
        jQuery("#update_property_status_btn").on('click',function(){
        	var token = $('meta[name="csrf_token"]').attr('content');
            var id = jQuery("#property_id").val();
			 var property_status = jQuery("#property_status").val();
            $.ajax({
            type:'POST',
            url:'/admin/properties/status/'+id+"/"+property_status,
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
            url:'/admin/properties/delete/'+id,
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
	</script>
@endsection