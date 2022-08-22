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
                    	Edit Blog Tag
                        </div>
                   
                    <div class="card-body">
                        <form method="post" id="form" enctype="multipart/form-data">
                          <div class="row p-0">
                                	
                                	<div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Tag Name<span class="required_field">*</span> </label>    
                                         <input id="title" name="title" value="{{ $d->title}}" type="text" class="form-control required" autocomplete="off" >
                                    </div> 	
                                    </div>
                                 	
                                </div>
                              
                                
                                <!-- Form actions -->
                                <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/blog_tag')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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
@endsection