@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row  p-0">
            <div class="col-lg-12">
                <div class="card">
                	<div class="card-header pb-3 pt-3 text-uppercase">
                    	Edit Advertisement
                    </div>

                    <div class="card-body">
                        <form method="post" id="add_advertise" enctype="multipart/form-data" method="post" files="true" action="{{ route('admin.advertise.update',[$advertise->id]) }}">
                            <div class="row p-0">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Select Vendor<span class="required_field">*</span> </label>    
                                        <select name="vendor_id" id="vendor_id" class="select2 form-control required">
                                            <option value="">Select Vendor</option>
                                            @foreach($vendors as $v)
                                                @if ($advertise->vendor_id == $v->id)
                                                    <option value="{{$v->id}}" selected="selected">{{$v->company_name}}</option>
                                                @else
                                                    <option value="{{$v->id}}">{{$v->company_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div> 	
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">Title<span class="required_field">*</span> </label>    
                                    <input id="title" name="title" type="text" value="{{ $advertise->title }}"  class="form-control required"  autocomplete="off">
                                    </div> 	
                                </div>
                                     	
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Image<span class="required_field">*</span> </label>    
                               			<div class="fileinput <?php echo (!empty($advertise->file_name))?"fileinput-exists":"fileinput-new" ?> " data-provides="fileinput">
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new btn btn-primary text-uppercase">Select image</span>
                                                    <input id="image" accept="image/*" name="image" type="file" class="form-control "/>
                                                </span>
                                                @if(!empty($advertise->file_name))
                                                    <a href="#" class="btn btn-danger fileinput-exists mb-1 btn btn-danger text-uppercase adv_image" data-dismiss="fileinput">Remove</a>
                                                @else
                                                    <a href="#" class="btn btn-danger fileinput-exists mb-1 btn btn-danger text-uppercase" data-dismiss="fileinput">Remove</a>
                                                @endif 
                                            </div>
                                      	    <div class="fileinput-preview thumbnail" style="max-width: 200px; max-height: 200px;">
                                                @if($advertise->file_name)
                                                    @if((substr($advertise->file_name, 0,5)) == 'https')
                                                        <img src="{{ $advertise->file_name }}" alt="img" class="img-responsive"/>
                                                    @else
                                                        <img src="{!! url('/').'/images/advertise/'.$advertise->id .'/'. $advertise->file_name!!}" alt="img" class="img-responsive"/>
                                                    @endif
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

            jQuery(document).on("click",".adv_image",function(e){
                $("#image").addClass('required');
            });

            jQuery(document).on("submit","#add_advertise",function(e){
                if($('#add_advertise').valid()){
                    $('#add_advertise').submit();
                    return true;	
                }else{
                    return false;		
                }	
		    });

        });
    </script>
@endsection
