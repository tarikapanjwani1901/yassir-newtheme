@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
      
        <div class="row  p-0">
            <div class="col-lg-12">
                <div class="card">
                	<div class="card-header pb-3 pt-3 text-uppercase">
                    	Add Testimonial
                        </div>
                    <div class="card-body">
                    <form method="post" id="addtestimonail" enctype="multipart/form-data">
                       <div class="row p-0">
                                	<div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Name<span class="required_field">*</span> </label>    
                                        <input id="name" name="name" type="text" class="form-control required" autocomplete="off">
                                   
                                    </div> 	
                                    </div>
                                	<div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Company<span class="required_field">*</span> </label>    
                                          <input id="company" name="company" type="text" class="form-control required"  autocomplete="off">
                                    </div> 	
                                    </div>
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Rating<span class="required_field">*</span> </label>    
                                       	  <select id="rating" name="rating" class="select2 form-control required">
                                        <option value="">Select Rating</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select>
                                  
                                       </div> 	
                                    </div>
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Your message<span class="required_field">*</span> </label>    
                                          <textarea class="form-control required" id="message" name="message" rows="5" autocomplete="off" ></textarea></div>
                               
                                    </div> 	
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label" style="vertical-align:top;">Image<span class="required_field">*</span> </label>    
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
                              <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/testimonials')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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
        jQuery(document).on("submit","#addtestimonail",function(e){
			
			if($('#addtestimonail').valid()){
				$('#addtestimonail').submit();
				return true;	
			}else{
				return false;		
			}	
		});
    
});
</script>
@stop