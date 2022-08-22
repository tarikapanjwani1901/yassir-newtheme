@extends('layouts.admin.app')
@section('content')
<style>
.select2-search.select2-search--inline {
	display: none;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
	border: 0;
	background: #ccc;
	border-radius: 6px;
	padding: 1px 6px;
}
</style>
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
                    	Add Blog
                        </div>
                    <div class="card-body">
                    <form method="post" id="form" enctype="multipart/form-data">
                       <div class="row p-0">
                                	<div class="col-md-9">
                                   		<div class="form-group">
                                         <label class="control-label">Title<span class="required_field">*</span> </label>    
                                          <input id="title" name="title" type="text" class="form-control required"  autocomplete="off">
                                    </div> 	
                                    </div>
                                    <div class="col-md-3">
                                   		<div class="form-group">
                                         <label class="control-label">Status<span class="required_field">*</span> </label>    
                                     	       {!! Form::select('status', $status, '',['class' => 'select2 form-control required']) !!}
                                    </div> 	
                                    </div>
                                    <div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Category</label>    
                                          {!! Form::select('category[]', $category,'',['class' => 'select2','multiple', 'id' => 'category']) !!}
                               
                                   
                                    </div> 	
                                    </div>
                                	<div class="col-md-6">
                                   		<div class="form-group">
                                         <label class="control-label">Tag</label>    
                                         {!! Form::select('tag[]', $tags,'',['class' => 'select2','multiple', 'id' => 'tags']) !!}
                               
                                    </div> 	
                                    </div>
                                    
                                    
                                    
                                    <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Description</label>    
                                         
                                            <textarea rows='10' name="description" id="description" class='textarea form-control' style="width: 100%; height: 900px !important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea
                                        
                                    >
                                         </div>
                               
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
                                        <a href="{{url('/admin/blog')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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
	 jQuery('.textarea').summernote({
			   codemirror: { // codemirror options
    theme: 'monokai'
  },
        placeholder: 'write content here...',
        fontNames: ['Lato', 'Arial', 'Courier New'],

    });
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