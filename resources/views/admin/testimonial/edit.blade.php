@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">Edit Testimonial</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">

                    </div>

                    <div class="card-body">
                        <form method="post" id="addtestimonail" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ $testimonials[0]->t_id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group row label-floating is-empty">
                                <label class="control-label col-md-2 col-sm-3" for="name">Name</label>
                                <div class="col-md-10 col-sm-9">
                                <input id="name" name="name" type="text" class="form-control" autocomplete="off"  value="{{ $testimonials[0]->t_name }}"></div>
                            </div>

                            <div class="form-group row label-floating is-empty">
                                <label class="control-label  col-md-2 col-sm-3" for="name">Company</label><div class="col-md-10 col-sm-9">
                                <input id="company" name="company" type="text" class="form-control" autocomplete="off" value="{{ $testimonials[0]->t_company }}"></div>
                            </div>
                                    
                            <div class="form-group row label-floating is-empty">
                                <label class="control-label  col-md-2 col-sm-3" for="name">Rating</label>
                                <div class="col-md-10 col-sm-9">
                                    <select id="rating" name="rating" class="default-select size-1 form-control wide mb-3">
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

                            <div class="form-group row label-floating is-empty">
                                <label class="control-label col-md-2 col-sm-3" for="message">Your message</label><div class="col-md-10 col-sm-9">
                                <textarea class="form-control" id="message" name="message" autocomplete="off" rows="5">{{ $testimonials[0]->t_quote }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row label-floating is-empty is-fileinput">
                                <label class="control-label col-md-2 col-sm-3" for="inputFile">Image</label>
                                <div class="col-md-10 col-sm-9">
                                    <figure>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                    @if($testimonials[0]->t_image)
                                                        @if((substr($testimonials[0]->t_image, 0,5)) == 'https')
                                                            <img src="{{ $testimonials[0]->t_image }}" alt="img" class="img-responsive"/>
                                                        @else
                                                            <img src="{!! url('/').'/images/testimonial/'.$testimonials[0]->t_id .'/'. $testimonials[0]->t_image!!}" alt="img" class="img-responsive"/>
                                                        @endif
                                                    @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input id="inputFile" name="inputFile" type="file" class="form-control"/>
                                                </span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput" style="color: black !important;">Remove</a>
                                            </div>
                                        </div>
                                        </figure>
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class=" text-right">
                                        <input type="submit" value="Submit" name="submit">
                                    </div>
                                </div>

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
        jQuery('#addtestimonail').validate({
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
                }
            },
            highlight: function (element) {
                jQuery(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function (element) {
                element.text('OK!').addClass('valid')
                    .closest('.control-group').removeClass('error').addClass('success');
            }
        });
    });
@stop
</script>