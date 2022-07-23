@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">Add City</a>
        </div>

        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-body">
                        <form method="post" id="addcity" enctype="multipart/form-data">
                            <fieldset>
                                <!-- Name input-->

                                <div class="form-group row label-floating is-empty">
                                    <label class="control-label col-md-2 col-sm-3" for="name">Country <span style="color:red"> * </span> </label>
                                    <div class="col-md-10 col-sm-9">
                                        {!! Form::select('country', $countries, '',['class' => 'form-control select2', 'id' => 'country']) !!}
                                        <span class="help-block">{{ $errors->first('country', ':message') }}</span>
                                    </div>
                                </div>
                                    
                                <div class="form-group row label-floating is-empty">
                                    <label class="control-label col-md-2 col-sm-3" for="name">State <span style="color:red"> * </span> </label>    
                                    <div class="col-md-10 col-sm-9">
                                        <select name="state" id="state" class="form-control select2">
                                            <option value="">Please select state</option>
                                        </select>
                                        <span class="help-block">{{ $errors->first('state', ':message') }}</span>
                                    </div>
                                </div>
                                    
                                <div class="form-group row label-floating is-empty">
                                    <label class="control-label col-md-2 col-sm-3" for="name">City Name <span style="color:red"> * </span> </label>    
                                    <div class="col-md-10 col-sm-9">
                                        <input id="name" name="name" type="text" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                
                                <div class="form-group row label-floating is-empty">
                                    <label class="control-label col-md-2 col-sm-3" for="name">Status <span style="color:red"> * </span> </label>    
                                    <div class="col-md-10 col-sm-9">
                                        {!! Form::select('status', $status, '',['class' => 'form-control select2', 'id' => 'status']) !!}
                                        <span class="help-block">{{ $errors->first('status', ':message') }}</span>
                                    </div>
                                </div>
                                    
                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class=" text-right">
                                        <input type="submit" value="Submit" name="submit">
                                    </div>
                                </div>

                            </fieldset>
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

            $('#addcity').validate({
                rules: {
                    
                    country: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    name: {
                        minlength: 2,
                        required: true
                    },
                    status: {
                        required: true
                    },
                },
                highlight: function (element) {
                    $(element).closest('.control-group').removeClass('success').addClass('error');
                },
                errorPlacement: function (error, element) {
                    if(element.attr("name")=='country' || element.attr("name")=='state' || element.attr("name")=='status'){
                        error.insertAfter(element.next('.select2'));
                    }
                    else{
                        error.insertAfter(element);
                    }
                },
                success: function (element) {
                    element.text('OK!').addClass('valid')
                        .closest('.control-group').removeClass('error').addClass('success');
                }
            });
        });

        $("#country").on('change',function(){

            var category = "";
            var search_country = $('#country').val();
            
            $("#state").empty();
            $("#state").append('<option value="">Please select state</option>');
                
            if (search_country !== '') {

                //Populate Sub Category Drop Down
                $.ajax({
                    type:"GET",
                    dataType: "json",
                    url:"{{url('/admin/getState')}}?country="+this.value,
                    success:function(data){
                        if ( data ) {
                            $.each( data, function( key, value ) {
                                $("#state").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    }
                })
                
            }
        });

    </script>
@endsection
