@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">Testimonial</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th class="ac" align="center">Image</th>
                                        <th>Quote</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($testimonials))
                                    <?php foreach ($testimonials as $key => $value) { ?>
                                        <tr id="tr_{{ $value->t_id }}">
                                            <td class="ac" align="center"><img src="../../images/testimonial/{{ $value->t_id }}/{{ $value->t_image }}" class="testimonial-user"></td>
                                            <td><?php echo $value->t_quote; ?></td>
                                            <td><?php echo $value->t_name; ?></td>
                                            <td><?php echo $value->t_company; ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="testimonials/edit/{{ $value->t_id }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#tes_delete_confirm"  data-id="{{ $value->t_id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    @else
                                        <tr> 
                                            <td colspan="10">No records found</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        {{ $testimonials->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>
@endsection


@section('customjs')
    jQuery(document).ready(function () {
        $(document).on("click", ".onclick", function () {
            var myBookId = $(this).data('id');
            $(".modal-dialog #bookId").val( myBookId );
        });

        jQuery("#btn_ok_1").on('click',function(){
            var testimonialID = jQuery("#bookId").val();
            $.ajax({
            type:'POST',
            url:'testimonials/delete/'+testimonialID,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                    if (data == 'success') {
                        $( ".close" ).trigger( "click" );
                        $("#tr_"+testimonialID).css('display','none');
                    }
            }
            });
        });
    });
@endsection