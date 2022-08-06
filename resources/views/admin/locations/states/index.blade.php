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
                    	States
                        	        <a href="{{url('/admin/states/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New State">Add New State</a>
                         
                        </div>
                        

                    <div class="card-body ">
                            <form method="get" class="padd15" name="search" action="state_search"  autocomplete="off">
                                <div class="row p-0">
                                    <div class="col-md-3">
                                       <div class="form-group">
                                        <input type="search" value="{{$search_keyword}}" name="search_keyword" class="form-control" placeholder="State">
                                    </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        {!! Form::select('search_country', $countries,$search_country,['class' => 'select2 form-control search_country size-1 form-control wide', 'id' => 'search_country']) !!}
                                    </div>
                                    </div>
                                    

                                    <div class="col-md-2">
                                     <div class="form-group">
                                        {!! Form::select('search_status', $status,$search_status,['class' => 'select2 form-control search_status size-1 form-control wide', 'id' => 'search_status']) !!}
                                    </div>
                                    </div>
                                    
                                     <div class="col-md-3">
                            	<input type="submit" class="btn btn-primary text-uppercase" value="Submit">
                                <a href="{{url('/admin/states')}}"  data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light text-uppercase" value="Reset"></a>
                            </div>

							</div>                                    
                            
                            </form>    
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>State Name</th>
                                        <th>Country Name</th>
                                        <th>Status</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($state))
                                        <?php foreach ($state as $key => $value) { ?>
                                            <tr id="tr_{{ $value->state_id}}">
                                                <td><?php echo $value->state_name; ?></td>
                                                <td><?php echo $value->country_name; ?></td>
                                                <td><?php echo $value->status; ?></td>
                                                <td  align="center">
                                                        <a href="states/edit/{{ $value->state_id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#state_delete_confirm"  data-id="{{ $value->state_id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                   
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    @else
                                    <tr> 
                                        <td colspan="4">No records found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $state->links() }}
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
                    <h4 class="modal-title">Remove State</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this state?</p>
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
                url:'/admin/states/delete/'+id,
                data:{_token: token},
                success:function(data){
                            window.location.reload();
                        
                }
                });
            });
        });

    </script>
@endsection