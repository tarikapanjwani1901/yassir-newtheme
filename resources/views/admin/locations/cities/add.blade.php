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
                    	Add City
                        </div>
                    
                    <div class="card-body">
                    	
                    	
                        <form method="post" id="addcity" enctype="multipart/form-data">
                           	<div class="row p-0">
                                	<div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Country<span class="required_field">*</span> </label>    
                                        {!! Form::select('country', $countries, '',['class' => 'select2 form-control required', 'id' => 'country']) !!}
                                    </div> 	
                                    </div>
                                	<div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">State<span class="required_field">*</span> </label>    
                                      <select name="state" id="state" class="form-control required select2">
                                            <option value="">Please select state</option>
                                        </select>
                                       
                                    </div> 	
                                    </div>
                                    <div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">City Name<span class="required_field">*</span> </label>    
                                       <input id="name" name="name" type="text" class="form-control required" autocomplete="off">
                                       
                                    </div> 	
                                    </div>
                                    <div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Status<span class="required_field">*</span> </label>    
                                        {!! Form::select('status', $status, '',['class' => 'select2 form-control required', 'id' => 'status']) !!}
                                    </div> 	
                                    </div>	
                                </div>
                              <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/cities')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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

            $(".select2").select2();
				jQuery(document).on("submit","#addcity",function(e){
					if($('#addcity').valid()){
						$('#addcity').submit();
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
$("#state").append('<option value="">Please select state</option>');
                  
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
					$("#state").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}
}
	jQuery(document).on("change","#country",function(){
	getState();
});

    </script>
@endsection
