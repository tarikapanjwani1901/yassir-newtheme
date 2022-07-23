@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">Add Testimonial</a>
        </div>

        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-body">
                    <form method="post" id="addtestimonail" enctype="multipart/form-data">
                        <fieldset>
                            <!-- Name input-->
                                <div class="form-group row label-floating is-empty">
                                    <label class="control-label col-md-2 col-sm-3" for="name">Name <span style="color:red"> * </span> </label>    <div class="col-md-10 col-sm-9">
                                    <input id="name" name="name" type="text" class="form-control" autocomplete="off" required>
                                    </div></div>
                                <div class="form-group row label-floating is-empty">
                                    <label class="control-label col-md-2 col-sm-3" for="name">Company <span style="color:red"> * </span> </label>    <div class="col-md-10 col-sm-9">
                                    <input id="company" name="company" type="text" class="form-control"  autocomplete="off" required>
                                    </div></div>
                                <div class="form-group row label-floating is-empty">
                                    <label class="control-label col-md-2 col-sm-3" for="name">Rating <span style="color:red"> * </span> </label>    <div class="col-md-10 col-sm-9">
                                    <select id="rating" name="rating" class="default-select form-control wide mb-3" required>
                                        <option value="">Select Rating</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select>
                                    </div>
                                </div>
                                <!-- Message body -->
                                <div class="form-group row label-floating is-empty">
                                    <label class="control-label col-md-2 col-sm-3" for="message">Your message <span style="color:red"> * </span> </label>    <div class="col-md-10 col-sm-9">
                                    <textarea class="form-control" id="message" name="message" rows="5" autocomplete="off"  required></textarea></div>
                                </div>
                                <div class="form-group row label-floating is-empty is-fileinput">
                                    <label class="control-label col-md-2 col-sm-3" for="inputFile">Image  </label>    <div class="col-md-10 col-sm-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                            <img src="http://placehold.it/200x200" alt="profile pic">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                            <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input id="inputFile" name="inputFile" type="file" class="form-control"/>
                                        </span>
                                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div></div>
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
    $('#addtestimonail').validate({
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            company: {
                minlength: 2,
                required: true
            },
            message: {
                minlength: 2,
                required: true
            },
            inputFile: {
                required: true
            }
        },
        errorPlacement: function (error, element) {
            if(element.attr("name")=='rating'){
                error.insertAfter(element.next('.dropdown-toggle'));
            }
            /*else if(element.attr("name")=='inputFile'){
                error.insertAfter(element.next('.btn-file'));
            }*/
            else{
               error.insertAfter(element);
            }
        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
        }
    });
});
</script>
@stop