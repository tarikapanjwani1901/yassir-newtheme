@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row  p-0">
            <div class="col-lg-12">
                <div class="card">
                	<div class="card-header pb-3 pt-3 text-uppercase">
                    	Create Advertisement
                    </div>

                    <div class="card-body">
                        <form method="post" id="add_advertise" enctype="multipart/form-data" method="post" files="true" action="{{ route('admin.advertise.store') }}">
                            <div class="row p-0">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Select Section<span class="required_field">*</span> </label>    
                                        <select name="section" id="section" class="select2 form-control required">
                                            <option value="">Select Section</option>
                                            @foreach($section as $k=>$v)
                                                <option value="{{ $k }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div> 	
                                </div>

                                <div class="col-md-6 position_both_div" style="display:none;">
                                    <div class="form-group">
                                        <label class="control-label">Select Position<span class="required_field">*</span> </label>    
                                        <select name="position_both" id="position_both" class="select2 form-control required">
                                            <option value="">Select Position</option>
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                        </select>
                                    </div> 	
                                </div>

                                <div class="col-md-6 position_middle_div" style="display:none;">
                                    <div class="form-group">
                                        <label class="control-label">Select Position<span class="required_field">*</span> </label>    
                                        <select name="position_middle" id="position_middle" class="select2 form-control required">
                                            <option value="">Select Position</option>
                                            <option value="middle">Middle</option>
                                        </select>
                                    </div> 	
                                </div>

                                <div class="col-md-6 priority_div" style="display:none;">
                                    <div class="form-group">
                                    <label class="control-label">Priority<span class="required_field">*</span> </label>    
                                    <input id="priority" name="priority" type="number" class="form-control required"  autocomplete="off">
                                    </div> 	
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Select Vendor<span class="required_field">*</span> </label>    
                                        <select name="vendor_id" id="vendor_id" class="select2 form-control required">
                                            <option value="">Select Vendor</option>
                                            @foreach($vendors as $v)
                                                <option value="{{$v->id}}">{{$v->company_name}}</option>
                                            @endforeach
                                        </select>
                                    </div> 	
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">Title<span class="required_field">*</span> </label>    
                                    <input id="title" name="title" type="text" class="form-control required"  autocomplete="off">
                                    </div> 	
                                </div>
                                     
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">Link<span class="required_field">*</span> </label>    
                                    <input id="link" name="link" type="text" class="form-control required"  autocomplete="off">
                                    </div> 	
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">Expiry Date<span class="required_field">*</span> </label>    
                                    <input id="expiry_date" name="expiry_date" type="text" class="form-control required"  autocomplete="off">
                                    </div> 	
                                </div>

                                <div class="col-md-12">
                                   		<div class="form-group">
                                         <label class="control-label" style="vertical-align:top;">Image<span class="required_field">*</span> </label>    
                               			<div class="fileinput fileinput-new" data-provides="fileinput">
                                        
                                            <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new btn btn-primary text-uppercase">Select image</span>
                                            <input id="image" accept="image/*" name="image" type="file" class="form-control required"/>
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
                                    <a href="{{url('/admin/advertise')}}"  data-toggle="tooltip" title="Cancel"><input type="button" class="btn btn-danger text-uppercase" value="Cancel"></a>
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

            jQuery('#expiry_date').datepicker({ dateFormat: 'yy-mm-dd' });

            $("#section").on('change',function(){
                if(this.value=='1'){
                    $(".position_both_div").hide();
                    $(".position_middle_div").show();
                    $(".priority_div").hide();
                }

                else if(this.value=='2'){
                    $(".position_both_div").show();
                    $(".position_middle_div").hide();
                    $(".priority_div").hide();
                }

                else if(this.value=='3'){
                    $(".position_both_div").hide();
                    $(".position_middle_div").hide();
                    $(".priority_div").show();
                }

                else if(this.value=='4'){
                    $(".position_both_div").hide();
                    $(".position_middle_div").show();
                    $(".priority_div").hide();
                }

                else if(this.value=='5'){
                    $(".position_both_div").hide();
                    $(".position_middle_div").show();
                    $(".priority_div").hide();
                }

                else {
                    $(".position_both_div").hide();
                    $(".position_middle_div").hide();
                    $(".priority_div").hide();
                }

            });

            $(".select2").select2();
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
