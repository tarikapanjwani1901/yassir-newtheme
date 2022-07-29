@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">Inquiry List</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form class="reportform padd15" action="" method="get" name="inquiry" autocomplete="off">
                            <div class="row">
                                
                                <div class="col-md-3">
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

                                <div class="col-md-3">
                                    <input type="search" name="inquiry_name" id="inquiry_name" placeholder="search" class=" form-control" >
                                </div>

                                <div class="col-md-2">
                                    <input id="datetimepicker6" style="" name="from" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" value="" placeholder="Start date"/>
                                </div>

                                <div class="col-md-2">
                                    <input id="datetimepicker7" name="to" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" value="" placeholder="End date"/>
                                </div>

                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-primary" value="Submit" id="submit">
                                </div>

                                <div class="col-md-1">
                                    <a href="{{url('/')}}/admin/inquiry" data-toggle="tooltip" title="" data-original-title="Reset" class="btn btn-primary exporting"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </form>    

                    </div>
                

                <div class="card-body">
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
                    <button type="button" id="btn_ok_1" class="btn btn-primary">Sure</button>
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