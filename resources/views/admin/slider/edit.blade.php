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
                    	Edit Slider
                        </div>
                

                    <div class="card-body">
                    <form method="post" id="form" enctype="multipart/form-data">
                             <input type="hidden" name="id" value="{{ $slider[0]->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                       <div class="row p-0">
                                	<div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Name<span class="required_field">*</span> </label>    
                                        <input value="{{ $slider[0]->name }}" id="name" name="name" type="text" class="form-control required" autocomplete="off">
                                   
                                    </div> 	
                                    </div>
                                    
                                    
                                    <div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Type<span class="required_field">*</span> </label>    
                                        
                                           {!! Form::select('slider_type', $type,$slider[0]->slider_type,['class' => 'select2 form-control','id'=>'slider_type']) !!}
                                
                                  
                                       </div> 	
                                    </div>
                                    <div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Status<span class="required_field">*</span> </label>    
                                        
                                           {!! Form::select('slider_status', $status,$slider[0]->slider_status,['class' => 'select2 form-control']) !!}
                                
                                  
                                       </div> 	
                                    </div>
                                	
                                    
                                     	
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label" style="vertical-align:top;">File<span class="required_field">*</span> </label>    
                               			<div class="fileinput <?php echo (!empty($slider[0]->slider_file))?"fileinput-exists":"fileinput-new" ?> " data-provides="fileinput">
                                        
                                            <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new btn btn-primary text-uppercase">Select File</span>
                                            @if($slider[0]->slider_file)
                                          	  <input id="inputFile" accept="image/*|video/*" name="inputFile" type="file" class="form-control"/>
                                          
                                            @else
                                            <input id="inputFile" accept="image/*|video/*" name="inputFile" type="file" class="form-control requiresd"/>
                                            @endif
                                        </span>
                                        <div class="fileinput-preview thumbnail" style="max-width: 200px; max-height: 200px; display:none;">
                                           
                                           </div>
                                        @if(!empty($slider[0]->slider_file))
                                        <a id="downloafile" href="/images/slider/{{$slider[0]->slider_file}}" download class="fileinput-exists btn btn-primary">Download</a>
                                        <a href="#" class="btn btn-danger fileinput-exists ml-0 btn btn-danger text-uppercase" data-dismiss="fileinput">Remove</a>
                                         @else
                                        <a href="#" style="margin-left:90px;" class="btn btn-danger ml-0 btn btn-danger text-uppercase" data-dismiss="fileinput">Remove</a>
                                        
                                         @endif 
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
	 	jQuery("#downloafile").hide();
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