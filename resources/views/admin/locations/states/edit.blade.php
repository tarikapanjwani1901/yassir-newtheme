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
                    	Edit State
                        </div>
                   
                    <div class="card-body">
                        <form method="post" id="addstate" enctype="multipart/form-data">
                          <div class="row p-0">
                                	<div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Country<span class="required_field">*</span> </label>    
                                        {!! Form::select('country', $countries,  $state[0]->country_id,['class' => 'select2 form-control required', 'id' => 'countries']) !!}
                                    </div> 	
                                    </div>
                                	<div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">State Name<span class="required_field">*</span> </label>    
                                         <input id="name" name="name" value="{{ $state[0]->name}}" type="text" class="form-control required" autocomplete="off" >
                                    </div> 	
                                    </div>
                                    <div class="col-md-4">
                                   		<div class="form-group">
                                         <label class="control-label">Status<span class="required_field">*</span> </label>    
                                        {!! Form::select('status', $status,  $state[0]->status,['class' => 'select2 form-control required', 'id' => 'status']) !!}
                                    </div> 	
                                    </div>	
                                </div>
                              
                                
                                <!-- Form actions -->
                                <div class="form-group text-center">
                                    <div class=" text-right">
                                        <input type="submit" class="btn btn-primary text-uppercase" value="Submit" name="submit">
                                        <a href="{{url('/admin/states')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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
		jQuery(document).on("submit","#addstate",function(e){
			
			if($('#addstate').valid()){
				$('#addstate').submit();
				return true;	
			}else{
				return false;		
			}	
		});
       
    });
</script>
@endsection