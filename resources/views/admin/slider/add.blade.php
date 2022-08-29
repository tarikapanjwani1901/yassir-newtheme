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
                    	Add Slider
                        </div>
                    <div class="card-body">
                    <form method="post" id="form" enctype="multipart/form-data">
                       <div class="row p-0">
                                	<div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Name<span class="required_field">*</span> </label>    
                                        <input id="name" name="name" type="text" class="form-control required" autocomplete="off">
                                   
                                    </div> 	
                                    </div>
                                	
                                    <div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Type<span class="required_field">*</span> </label>    
                                        
                                           {!! Form::select('slider_type', $type,'',['class' => 'select2 form-control','id'=>'slider_type']) !!}
                                
                                  
                                       </div> 	
                                    </div>
                                    <div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Status<span class="required_field">*</span> </label>    
                                        
                                           {!! Form::select('slider_status', $status,'',['class' => 'select2 form-control']) !!}
                                
                                  
                                       </div> 	
                                    </div>
                                     	
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label" style="vertical-align:top;">File<span class="required_field">*</span> </label>    
                               			<div class="fileinput fileinput-new" data-provides="fileinput">
                                        
                                            <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new btn btn-primary text-uppercase">Select File</span>
                                            <input id="inputFile" accept="image/*" name="inputFile" type="file" class="form-control required"/>
                                        </span>
                                           <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                       	<br />
                                        <a href="#" class="btn btn-danger fileinput-exists mb-1 btn btn-danger text-uppercase" data-dismiss="fileinput">Remove</a>
                                            </div>
                                      	     
                                        </div>
                                       
                                    </div> 	
                                    </div>
                                		
                                </div>
                              <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/slider')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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
jQuery("#inputFile").change(function(){
	 var slider_type = jQuery("#slider_type").val();
	 if(slider_type=="Video"){
		 jQuery(".fileinput-preview").hide();
	  }else{
		 	jQuery(".fileinput-preview").show(); 
		 }
 });
 jQuery(document).on("change","#slider_type",function(){
		checkSliderType(); 
	});
  function checkSliderType(){
		var slider_type = jQuery("#slider_type").val();
	  if(slider_type=="Video"){
			jQuery("#inputFile").attr("accept",'video/*');  
		}else{
			jQuery("#inputFile").attr("accept",'image/*');	
		}
  }  
	
	jQuery(document).ready(function () {
  	checkSliderType();

  	$(".select2").select2();
        jQuery(document).on("submit","#form",function(e){
			
			if($('#form').valid()){
				$('#form').submit();
				return true;	
			}else{
				return false;		
			}	
		});
    
});
</script>
@stop