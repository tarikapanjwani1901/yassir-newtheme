@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        
        <div class="row p-0">
            <div class="col-lg-12">
                <div class="card">
                	 <div class="card-header pb-3 pt-3 text-uppercase">
                    	Edit Sub City
                        </div>
              
                    <div class="card-body">
                    <form method="post" id="addcity" enctype="multipart/form-data">
                    
                    		<div class="row p-0">
                                	<div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Country<span class="required_field">*</span> </label>    
                                        {!! Form::select('country', $countries, $sub_cities[0]->country_id,['class' => 'select2 form-control required', 'id' => 'country']) !!}
                                    </div> 	
                                    </div>
                                	<div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">State<span class="required_field">*</span> </label>    
                                       {!! Form::select('state', $states,$sub_cities[0]->state_id,['class' => 'form-control required select2', 'id' => 'state']) !!} 
                                       
                                       
                                    </div> 	
                                    </div>
                                    <div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">City<span class="required_field">*</span> </label>    
                                        {!! Form::select('city', $cities,$sub_cities[0]->city_id,['class' => 'form-control required select2', 'id' => 'city']) !!}
                                     
                                       
                                    </div> 	
                                    </div>
                                    <div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Sub City Name<span class="required_field">*</span> </label>    
                                       <input id="name" name="name" type="text" value="{{ $sub_cities[0]->sub_city_name}}" class="form-control required" autocomplete="off">
                                       
                                    </div> 	
                                    </div>
                                    <div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Status<span class="required_field">*</span> </label>    
                                        {!! Form::select('status', $status, $sub_cities[0]->status,['class' => 'select2 form-control required', 'id' => 'status']) !!}
                                    </div> 	
                                    </div>	
                                </div>
                              <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/sub_cities')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
                                    </div>
                                </div>
                             
                            
                            <input type="hidden" name="id" value="{{ $sub_cities[0]->city_id}}">
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

    $("#country").on('change',function(){

        var search_country = $('#country').val();
        $("#state").empty();
        $("#state").append('<option value="">Please select state</option>');
        $("#city").empty();
        $("#city").append('<option value="">Please select city</option>');
          
        if (search_country !== '') {

            //Populate Sub Category Drop Down
            $.ajax({
                type:"GET",
                dataType: "json",
                url:"{{url('/admin/getState')}}?country="+this.value,
                success:function(data){
                    if ( data ) {
                        
                        $.each( data, function( key, value ) {
                            $("#state").append('<option value="'+key+'">'+value+'</option>');
                        });
                    }
                }
            })
            
        }
    });
    $("#state").on('change',function(){

        var search_state = $('#state').val();
            $("#city").empty();
            $("#city").append('<option value="">Please select city</option>');
                    
        if (search_state !== '') {

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
	 });
    </script>
@endsection
