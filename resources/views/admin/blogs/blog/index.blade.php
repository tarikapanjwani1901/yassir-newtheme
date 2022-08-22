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
                    	Blog
                        	        <a href="{{url('/admin/blog/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New Blog">Add New Blog</a>
                         
                        </div>
               
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th class="ac" align="center">Image</th>
                                        <th width="50%">Title</th>
                                        <th>No of Comments</th>
                                        <th>No of Views</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($blog))
                                    <?php foreach ($blog as $key => $value) {
										$countComment = DB::table('blog_comments')->where('blog_id','=',$value->id)->whereNull('deleted_at')->get()->count();
										 ?>
                                        <tr id="tr_{{ $value->id }}">
                                            <td class="ac" align="center"><img src="../images/blog/{{ $value->id }}/{{ $value->image }}" class="testimonial-user"></td>
                                            <td><?php echo $value->title; ?></td>
                                            <td><?php echo $countComment; ?></td>
                                            <td><?php echo $value->views; ?></td>
                                             <td><?php echo $value->status; ?></td>
                                             <td><?php echo $value->created_at->diffForHumans(); ?></td>
                                            <td align="center">
                                                    <a href="blog/edit/{{ $value->id }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#delete_confirm"  data-id="{{ $value->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
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
                        {{ $blog->links() }}
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
                    <h4 class="modal-title">Remove Blog</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Blog?</p>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-footer">
                       <button type="button" id="close" class="btn btn-light close text-uppercase">Cancel</button>
                    <button type="button" id="btn_ok_1" class="btn btn-primary text-uppercase">Sure</button>
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
            url:'blog/delete/'+id,
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