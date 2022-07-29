@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row p-0">
            <div class="col-lg-12">
                <div class="card">
                	<div class="card-header pb-3 pt-3 text-uppercase">
                    	Edit Testimonial
                        </div>
                

                    <div class="card-body">
                    <form method="post" id="addtestimonail" enctype="multipart/form-data">
                             <input type="hidden" name="id" value="{{ $testimonials[0]->t_id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                       <div class="row p-0">
                                	<div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Name<span class="required_field">*</span> </label>    
                                        <input value="{{ $testimonials[0]->t_name }}" id="name" name="name" type="text" class="form-control required" autocomplete="off">
                                   
                                    </div> 	
                                    </div>
                                	<div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Company<span class="required_field">*</span> </label>    
                                          <input value="{{ $testimonials[0]->t_company }}" id="company" name="company" type="text" class="form-control required"  autocomplete="off">
                                    </div> 	
                                    </div>
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Rating<span class="required_field">*</span> </label>    
                                       	  <select id="rating" name="rating" class="select2 form-control required">
                                         <option value="">Select Rating</option>
                                        <?php
                                            for ($i=5; $i > 0 ; $i--) {
                                                if ($i == $testimonials[0]->t_rating) { ?>
                                                    <option value="{{ $i }}" selected="selected">{{ $i }}</option>
                                                <?php } else { ?>
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                <?php }
                                            }
                                        ?>
                                    </select>
                                  
                                       </div> 	
                                    </div>
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Your message<span class="required_field">*</span> </label>    
                                          <textarea class="form-control required" id="message" name="message" rows="5" autocomplete="off" >{{ $testimonials[0]->t_quote }}</textarea></div>
                               
                                    </div> 	
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label" style="vertical-align:top;">Image<span class="required_field">*</span> </label>    
                               			<div class="fileinput <?php echo (!empty($testimonials[0]->t_image))?"fileinput-exists":"fileinput-new" ?> " data-provides="fileinput">
                                        
                                            <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new btn btn-primary text-uppercase">Select image</span>
                                            <input id="inputFile" accept="image/*" name="inputFile" type="file" class="form-control"/>
                                        </span>
                                        <div class="fileinput-preview thumbnail" style="max-width: 200px; max-height: 200px;">
                                           	  @if($testimonials[0]->t_image)
                                                        @if((substr($testimonials[0]->t_image, 0,5)) == 'https')
                                                            <img src="{{ $testimonials[0]->t_image }}" alt="img" class="img-responsive"/>
                                                        @else
                                                            <img src="{!! url('/').'/images/testimonial/'.$testimonials[0]->t_id .'/'. $testimonials[0]->t_image!!}" alt="img" class="img-responsive"/>
                                                        @endif
                                                    @endif
                                           </div>
                                        <br />
                                        @if(!empty($testimonials[0]->t_image))
                                        <a href="#" style="margin-left:90px;" class="btn btn-danger fileinput-exists mb-1 btn btn-danger text-uppercase" data-dismiss="fileinput">Remove</a>
                                         @else
                                        <a href="#" style="margin-left:90px;" class="btn btn-danger fileinput-exists mb-1 btn btn-danger text-uppercase" data-dismiss="fileinput">Remove</a>
                                        
                                         @endif 
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