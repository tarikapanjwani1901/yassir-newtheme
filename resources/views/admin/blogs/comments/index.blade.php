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
                    	Blog Comments
                        	        <a href="{{url('/admin/blog_comments/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New Comment">Add New Comment</a>
                         
                        </div>
                        

                    <div class="card-body ">
                            <form method="get" class="padd15" name="search" action="blog_comments_search"  autocomplete="off">
                                <div class="row p-0">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          {!! Form::select('search_blog', $blogs, $search_blog,['class' => 'select2 form-control']) !!}
                                    </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                       <div class="form-group">
                                        <input type="search" value="{{$search_name}}" name="search_name" class="form-control" placeholder="Name">
                                    </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                       <div class="form-group">
                                        <input type="email" value="{{$search_email}}" name="search_email" class="form-control" placeholder="Email">
                                    </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          {!! Form::select('search_status', $status, $search_status,['class' => 'select2 form-control']) !!}
                                    </div>
                                    </div>
                                    
                                    

                                    
                                    
                                     <div class="col-md-2">
                            	<input type="submit" class="btn btn-primary text-uppercase" value="Submit">
                                <a href="{{url('/admin/blog_comments')}}"  data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light text-uppercase" value="Reset"></a>
                            </div>

							</div>                                    
                            
                            </form>    
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Blog Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($blog_comments))
                                        <?php foreach ($blog_comments as $key => $value) { 
								
										?>
                                            <tr id="tr_{{ $value->id}}">
                                                <td><?php echo $value->blog_name; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><div class="badge badge-<?php if($value->status=="Approve"){echo "success";}elseif($value->status=="Pending"){echo "primary";}else{echo "danger";} ?>"><?php echo $value->status; ?></div></td>
                                                
                                                <td><?php echo $value->created_at; ?></td>
                                                <td  align="center">
                                                        <a href="blog_comments/edit/{{ $value->id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#blog_comments_delete_confirm"  data-id="{{ $value->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                   
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    @else
                                    <tr> 
                                        <td colspan="6">No records found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $blog_comments->links() }}
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
                    <h4 class="modal-title">Remove comment</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this comment?</p>
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

            $(".select2").select2();
            
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
                url:'/admin/blog_comments/delete/'+id,
                data:{_token: token},
                success:function(data){
                            window.location.reload();
                        
                }
                });
            });
        });

    </script>
@endsection