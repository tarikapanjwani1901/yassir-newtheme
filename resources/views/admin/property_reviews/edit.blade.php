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
                    	Edit Review
                        </div>
                    <div class="card-body">
                    <form method="post" id="form" enctype="multipart/form-data">
                       <div class="row p-0">
                                	<div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Property<span class="required_field">*</span> </label>    
                                         {!! Form::select('property_id', $properties, $r->property_id,['class' => 'select2 form-control required']) !!}
                                   
                                    </div> 	
                                    </div>
                                	<div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">User<span class="required_field">*</span> </label>    
                                       {!! Form::select('user_id', $users, $r->user_id,['class' => 'select2 form-control required']) !!}

                                    </div> 	
                                    </div>
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Rating<span class="required_field">*</span> </label>    
                                       	  <select id="rating" name="rating" class="select2 form-control required">
                                        <option value="">Select Rating</option>
                                        <option value="5" <?php  echo ($r->rating==5)?"selected":""?>>5</option>
                                        <option value="4" <?php  echo ($r->rating==4)?"selected":""?>>4</option>
                                        <option value="3" <?php  echo ($r->rating==3)?"selected":""?>>3</option>
                                        <option value="2" <?php  echo ($r->rating==2)?"selected":""?>>2</option>
                                        <option value="1" <?php  echo ($r->rating==1)?"selected":""?>>1</option>
                                    </select>
                                  
                                       </div> 	
                                    </div>
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Comment<span class="required_field">*</span> </label>    
                                          <textarea class="form-control required" id="comment" name="comment" rows="5" autocomplete="off" >{{$r->comment}}</textarea></div>
                               
                                    </div> 	
                                    
                                		
                                </div>
                              <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/reviews')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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