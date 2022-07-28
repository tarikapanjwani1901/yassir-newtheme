@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
       
        <div class="row p-0">
            <div class="col-lg-12">
                <div class="card">
        
                        <div class="card-header pb-3 pt-3 text-uppercase">
                    	Testimonial
                        	        <a href="{{url('/admin/testimonials/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New Testimonial">Add New Testimonial</a>
                         
                        </div>
               
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th class="ac" align="center">Image</th>
                                        <th width="60%">Quote</th>
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
                                            <td align="center">
                                                    <a href="testimonials/edit/{{ $value->t_id }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#tes_delete_confirm"  data-id="{{ $value->t_id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Remove Testimonial</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Testimonial?</p>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-footer">
                    <button type="button" id="btn_ok_1" class="btn btn-primary">Sure</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customjs')
<script type="text/javascript">
    jQuery(document).ready(function () {
       $(document).on("click", ".close", function () {
                $('#myModal').modal('hide');
            });

            $(document).on("click", ".onclick", function () {
                var id = $(this).data('id');
                $(".modal-dialog #id").val( id );
                $('#myModal').modal('show');
            });

        jQuery("#btn_ok_1").on('click',function(){
              var token = $('meta[name="csrf_token"]').attr('content');
                var id = jQuery("#id").val();
              
            $.ajax({
            type:'POST',
            url:'testimonials/delete/'+id,
            data:{_token: token},
                  
            success:function(data){
                    if (data == 'success') {
                        $( ".close" ).trigger( "click" );
                       window.location.reload();
                    }
            }
            });
        });
    });
</script>
@stop