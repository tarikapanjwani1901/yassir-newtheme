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
                    	Edit Cms
                        </div>
                   
                    <div class="card-body">
                        <form method="post" id="addcms" enctype="multipart/form-data">
                          <div class="row p-0">
                                	<div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Title<span class="required_field">*</span> </label>    
                                      	<input type="text" name="title" class="form-control required" placeholder="Title" value="{{ $cms[0]->title}}" />
                                    </div> 	
                                    </div>
                                	<div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label">Description<span class="required_field">*</span> </label>    
                                            <textarea rows='5' name="description" id="description" class='textarea form-control' style="width: 100%; height: 200px !important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $cms[0]->description  ?></textarea
                                        
                                    </div> 	
                                    </div>
                                    	
                                </div>
                              
                                
                                <!-- Form actions -->
                                <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/cms')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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
	  jQuery(document).on("submit","#addcms",function(e){
			
			if($('#addcms').valid()){
				$('#addcms').submit();
				return true;	
			}else{
				return false;		
			}	
		});
       
    });
</script>
@endsection