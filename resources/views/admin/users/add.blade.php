@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
      
        <div class="row  p-0">
            <div class="col-lg-12">
                <div class="card">
                	<div class="card-header pb-3 pt-3 text-uppercase">
                    	Add User
                        </div>
                       
                    <div class="card-body">
                        <form method="post" id="adduser" enctype="multipart/form-data">
                             	<div class="row p-0">
                                	<div class="col-md-2">
                                   		<div class="form-group">
                                         <label class="control-label">Status<span class="required_field">*</span> </label>    
                                     	       {!! Form::select('status', $status, '',['class' => 'select2 form-control required']) !!}
                                    </div> 	
                                    </div>
                                    <div class="col-md-2">
                                   		<div class="form-group">
                                         <label class="control-label">User Role<span class="required_field">*</span> </label>    
                                     	       {!! Form::select('user_role', $user_role, '',['class' => 'select2 form-control required']) !!}
                                    </div> 	
                                    </div>
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">User Name<span class="required_field">*</span> </label>    
                                     	 <input type="text" placeholder="User Name" name="user_name" class="form-control required" />
                                    </div> 	
                                    </div>
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">First Name<span class="required_field">*</span> </label>    
                                     	 <input type="text" placeholder="First Name" name="first_name" class="form-control required" />
                                    </div> 	
                                    </div>
                                	<div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Last Name<span class="required_field">*</span> </label>    
                                         <input type="text" placeholder="Last Name" name="last_name" class="form-control required" />
                                    </div> 	
                                    </div>
                                    	
                                	<div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Email<span class="required_field">*</span> </label>    
                                         <input type="text" placeholder="Email" name="email" class="form-control email required" />
                                    </div> 	
                                    </div>
                                	
                                    
                                	<div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Mobile Number<span class="required_field">*</span> </label>    
                                     	 <input type="text" placeholder="Mobile Number" name="mobile" class="form-control number required" />
                                    </div> 	
                                    </div>
                                	<div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Company Name<span class="required_field">*</span> </label>    
                                         <input type="text" placeholder="Company Name" name="company_name" class="form-control required" />
                                    </div> 	
                                    </div>
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">GST Number<span class="required_field">*</span> </label>    
                                         <input type="text" placeholder="GST Number" name="gst_number" class="form-control required" />
                                    </div> 	
                                    </div>
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Date of Birth<span class="required_field">*</span> </label>    
                                     	 <input type="text" placeholder="Date Of Birth" name="dob" class="form-control datepicker required" />
                                    </div> 	
                                    </div>
                                	
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Gender<span class="required_field">*</span> </label>    
                                          {!! Form::select('gender', $gender, '',['class' => 'select2 form-control required']) !!}
                                    </div> 	
                                    </div>	
                                </div>
                                
                                
                                
                                <div class="row p-0">
                                	
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Bio (brief intro)<span class="required_field">*</span> </label>    
                                        <textarea style="resize:none;" name="bio" class="form-control"></textarea>
                                    </div> 	
                                    </div>
                                    
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label" style="vertical-align:top;">Profile Photo<span class="required_field">*</span> </label>    
                               			<div class="fileinput fileinput-new" data-provides="fileinput">
                                        
                                            <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new btn btn-primary text-uppercase">Select image</span>
                                            <input id="inputFile" accept="image/*" name="inputFile" type="file" class="form-control required"/>
                                        </span>
                                           <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                       	<br />
                                        <a href="#" style="margin-left:90px;" class="btn btn-danger fileinput-exists mb-1 btn btn-danger text-uppercase" data-dismiss="fileinput">Remove</a>
                                            </div>
                                      	     
                                        </div>
                                       
                                    </div> 	
                                    </div>
                                    	
                                </div>
                                 <h4 style="border-bottom:1px dotted #000; margin-left:0px; margin-top:10px; padding-bottom:10px;">Address</h4>
                           <div class="row p-0">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="control-label">Country <span class="required_field">*</span></label>
                                    <select class="form-control required select2" name="country" id="country">
                                       @foreach($country as $k=>$v)
                                        <option value="{{$k}}">{{$v}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="control-label">State <span class="required_field">*</span></label>
                                     {!! Form::select('state', $state,'',['class' => 'select2 required form-control', 'id' => 'state']) !!}

                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="control-label">City <span class="required_field">*</span></label>
                                     {!! Form::select('city', $city,'',['class' => 'select2 required form-control', 'id' => 'city']) !!}
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="control-label">Sub City <span class="required_field">*</span></label>
                                     {!! Form::select('sub_city', $sub_city,'',['class' => 'select2 required form-control', 'id' => 'sub_city']) !!}
                                 </div>
                              </div>
                              <div class="col-md-9">
                                 <div class="form-group">
                                    <label class="control-label" for="address">Address <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required"  name="address" id="address" placeholder="Address" >
                                 </div>
                              </div>
                              
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="control-label">Zipcode <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required"  name="zipcode" id="zipcode" placeholder="Zip Code"  >
                                 </div>
                              </div>
                           </div>
                              
                              <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/users')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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
		jQuery(document).on("submit","#adduser",function(e){
			
			if($('#adduser').valid()){
				$('#adduser').submit();
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