@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
      
        <div class="row  p-0">
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
                    	General Setting
                        </div>
                       
                    <div class="card-body">
                        <form method="post" id="form" enctype="multipart/form-data">
                        		<input type="hidden" name="id"  value="{{$settings->id}}" />
                             	<div class="row p-0">
                                	
                                    <div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Phone Number<span class="required_field">*</span> </label>    
                                     	 <input type="text" value="{{$settings->phone_number}}" placeholder="Phone Number" name="phone_Number" class="form-control required" />
                                    </div> 	
                                    </div>
                                    
                                    <div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Email<span class="required_field">*</span> </label>    
                                         <input type="text" value="{{$settings->email}}"  placeholder="Email" name="email" class="form-control email required" />
                                    </div> 	
                                    </div>
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Address<span class="required_field">*</span> </label>    
                                     	 <input type="text" value="{{$settings->address}}"  placeholder="Address" name="address" class="form-control required" />
                                    </div> 	
                                    </div>
                                	
                                    	
                                	
                                		
                                </div>
                                
                                
                                
                                <div class="row p-0">
                                	
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Description<span class="required_field">*</span> </label>    
                                        <textarea style="resize:none;" placeholder="Description" name="description" class="form-control">{{$settings->description}}</textarea>
                                    </div> 	
                                    </div>
                                    
                                    
                                    	
                                </div>
                                 <h4 style="border-bottom:1px dotted #000; margin-left:0px; margin-top:10px; padding-bottom:10px;">Social Media</h4>
                           <div class="row p-0">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Facebook</label>
                                    <input type="text" class="form-control url" value="{{$settings->facebook}}"   name="facebook" placeholder="Facebook" >
                                 </div>
                              </div>
                              
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Twitter</label>
                                    <input type="text" class="form-control url" value="{{$settings->twitter}}"   name="twitter" placeholder="Twitter" >
                                 </div>
                              </div>
                              
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Instagram</label>
                                    <input type="text" class="form-control url" value="{{$settings->instagram}}"   name="instagram" placeholder="Instagram" >
                                 </div>
                              </div>
                              
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Youtube</label>
                                    <input type="text" class="form-control url" value="{{$settings->youtube}}"   name="youtube" placeholder="Youtube" >
                                 </div>
                              </div>
                              
                              </div>
                              
                              <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                    </div>
                                </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery(".select2").select2();
		jQuery(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery(document).on("submit","#form",function(e){
			
			if($('#form').valid()){
				$('#form').submit();
				return true;	
			}else{
				return false;		
			}	
		});
       
    });
	
getState();	
	
function getState(){
var country = $('#country').val();

$("#state").empty();
$("#state").append('<option value="">Select State</option>');
 $("#city").empty();
$("#city").append('<option value="">Select City</option>');

  $("#sub_city").empty();
  $("#sub_city").append('<option value="">Select Sub City</option>');

  
  
                  
if (country !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getState')}}?country="+country,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}
	
}
$("#country").on('change',function(){
getState();
});
$("#state").on('change',function(){

var state = $('#state').val();
  $("#city").empty();
  $("#city").append('<option value="">Select City</option>');
  
  $("#sub_city").empty();
  $("#sub_city").append('<option value="">Select Sub City</option>');
 
               
if (state !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getCity')}}?state="+this.value,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}

});

$("#city").on('change',function(){

var city = $('#city').val();
  $("#sub_city").empty();
  $("#sub_city").append('<option value="">Select Sub City</option>');
               
if (city !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getSubCity')}}?city="+this.value,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#sub_city").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}
});
</script>
@endsection