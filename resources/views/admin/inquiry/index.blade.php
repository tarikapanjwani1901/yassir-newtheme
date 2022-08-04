@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
       
        <div class="row p-0">
            <div class="col-lg-12">
                <div class="card">
                 <div class="card-header pb-3 pt-3 text-uppercase">
                    	Inquiry List</div>
               
                    

                <div class="card-body">
					<form class="reportform padd15" action="" method="get" name="inquiry" autocomplete="off">
                            <div class="row p-0">
                                
                                <div class="col-md-3">
                                <div class="form-group">
                               
                                    <select class="select2 size-1 form-control wide mb-3" id="vendors" name="vendors" >
                                        <option value="">Select Vendor</option>
                                        @if (!empty($vendors_info))
                                            @foreach($vendors_info as $d)
                                                @if ($vendors == $d->id)
                                                <option value="{{$d->id}}" selected="selected">{{$d->company_name}}</option>
                                                @else
                                                <option value="{{$d->id}}" >{{$d->company_name}}</option>
                                                @endif  
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                <div class="form-group">
                               
                                    <input type="search" name="inquiry_name" value="{{$inquiry_name}}" id="inquiry_name" placeholder="search" class=" form-control" >
                                    </div>
                                </div>

                                <div class="col-md-2">
                                <div class="form-group">
                               
                                    <input id="datetimepicker6" value="{{$from}}"  name="from" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" placeholder="Start date"/>
                              	</div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                               
                                    <input id="datetimepicker7" value="{{$to}}" name="to" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" placeholder="End date"/>
                               </div>
                                </div>
								<div class="col-md-3">
                            	<input type="submit" class="btn btn-primary text-uppercase" value="Submit">
                                
                            	
                                 <a href="{{url('/admin/inquiry')}}" data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light text-uppercase" value="Reset"></a>
                            </div>			
                               
                            </div>
                        </form>    
                   
                    <div class="table-responsive">
                        <table class="table table-responsive-md table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Vendor Name</th>
                                    <th>Property Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Info</th>
                                    <th>Date & Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = ($inquires->currentpage()-1)*$inquires->perpage() + 1 @endphp
                                @if(count($inquires))
                                    @foreach($inquires as $inquire)
                                        <tr id="tr_{{$inquire->id}}">
                                            <td> {{$i++}}</td>
                                            <td> {{$inquire->company_name}} </td> 
                                            <td> {{ ucfirst($inquire->project_name) }} </td>
                                            <td> {{ ucfirst($inquire->name) }} </td>
                                            <td> {{ ucfirst($inquire->email) }} </td>
                                            <td> {{ $inquire->contact }} </td>
                                            <td> {{ $inquire->message }} </td>
                                            <td> <?php echo date('M j h:ia', strtotime($inquire->created_at)) ?> </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#bookvisit_delete_confirm"  data-id="{{ $inquire->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <td colspan="9">No Result Found</td>
                                @endif
                            </tbody>
                        </table>
                        {{$inquires->links()}}
                    </div>
                </div>
            
        </div>
    </div>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Remove Item</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item?</p>
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
    $(".select2").select2();
    
    jQuery('#datetimepicker6').datepicker({ dateFormat: 'yy-mm-dd' });
    jQuery('#datetimepicker7').datepicker({ dateFormat: 'yy-mm-dd' });

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
            url:'/admin/inquiry/delete/'+id,
            data:{_token: token},
            success:function(data){
                if (data == 'success') {
                    $( ".close" ).trigger( "click" );
                    $("#tr_"+id).css('display','none');
                    window.location.reload();
                }
            }
        });
    });

</script>
@endsection 