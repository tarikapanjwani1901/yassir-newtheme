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
                    	Reviews
                        	        <a href="{{url('/admin/reviews/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New Review">Add New Review</a>
                         
                        </div>
               
                    <div class="card-body">
                    
                    <form class="padd15" action="reviews_search" method="get" name="reviews_search" autocomplete="off">
                            <div class="row p-0">
                                
                                <div class="col-md-4">
                                <div class="form-group">
                               
                                       {!! Form::select('search_property', $properties, $search_property,['class' => 'select2 form-control required']) !!}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                               
                                {!! Form::select('search_user', $users, $search_user,['class' => 'select2 form-control required']) !!}
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                <div class="form-group">
                               
                                <select id="search_rating" name="search_rating" class="select2 form-control required">
                                        <option value="">Select Rating</option>
                                        <option value="5" <?php echo ($search_rating==5)?"selected":"" ?>>5</option>
                                        <option value="4"  <?php echo ($search_rating==4)?"selected":"" ?>>4</option>
                                        <option value="3"  <?php echo ($search_rating==3)?"selected":"" ?>>3</option>
                                        <option value="2"  <?php echo ($search_rating==2)?"selected":"" ?>>2</option>
                                        <option value="1"  <?php echo ($search_rating==1)?"selected":"" ?>>1</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                <div class="form-group">
                               
                                    <input  value="{{$search_from}}"  name="search_from" type="text" class="form-control date_picker dt1" data-date-format="YYYY-MM-DD" placeholder="Start date"/>
                              	</div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                               
                                    <input  value="{{$search_to}}" name="search_to" type="text" class="form-control date_picker dt1" data-date-format="YYYY-MM-DD" placeholder="End date"/>
                               </div>
                                </div>
								<div class="col-md-3">
                            	<input type="submit" class="btn btn-primary text-uppercase" value="Submit">
                                
                            	
                                 <a href="{{url('/admin/reviews')}}" data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light text-uppercase" value="Reset"></a>
                            </div>			
                               
                            </div>
                        </form>
                        <div class="table-responsive mt-3">
                            <table class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th class="ac" align="center">Property Name</th>
                                        <th >Name</th>
                                        <th>Rating</th>
                                        <th>Rating Comment</th>
                                        <th>Date</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($reviews))
                                    <?php foreach ($reviews as $key => $value) { ?>
                                        <tr id="tr_{{ $value->id }}">
                                            <td><?php echo $value->property_name; ?></td>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td><?php echo $value->rating; ?></td>
                                            
                                            <td><?php echo $value->comment; ?></td>
                                            
                                              <td><?php echo $value->created_at; ?></td>
                                            <td align="center">
                                                    <a href="reviews/edit/{{ $value->id }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#delete_confirm"  data-id="{{ $value->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
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
                        {{ $reviews->links() }}
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
                    <h4 class="modal-title">Remove Review</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this review?</p>
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
		  
    jQuery('.date_picker').datepicker({ dateFormat: 'yy-mm-dd' });
    
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
            url:'reviews/delete/'+id,
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