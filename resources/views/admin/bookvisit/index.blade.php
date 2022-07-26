@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">Book Visit</a>
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
                                    @if(isset($start_date) && isset($start_date)!='')
                                        <input id="datetimepicker6" style="" name="from" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" value="{{$start_date}}" placeholder="Start date"/>
                                    @else
                                        <input id="datetimepicker6" style="" name="from" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" value="" placeholder="Start date"/>
                                    @endif
                                </div>

                                <div class="col-md-2">
                                    @if(isset($end_date) && isset($end_date)!='')
                                    <input id="datetimepicker7" name="to" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" value="{{$end_date}}"  placeholder="End date"/>
                                    @else
                                    <input id="datetimepicker7" name="to" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" value=""  placeholder="End date"/>
                                    @endif
                                </div>

                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-primary" value="Submit" id="submit">
                                </div>

                                <div class="col-md-1">
                                    <a href="{{url('/')}}/admin/bookvisit" data-toggle="tooltip" title="" data-original-title="Reset" class="btn btn-primary exporting"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </form>    

                    </div>
                

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md table-bordered">
                            <thead>
                                <tr>
                                    <th>Vendor Name</th>
                                    <th>Property Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Booking Date</th>
                                    <th>Timing</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php // echo "<pre>"; print_r($product); exit; ?>
                                @if(count($bookvisit))
                                    @foreach($bookvisit as $bv)
                                        <tr id="tr_{{$bv->id}}">
                                        <td>{{$bv->company_name}}</td> 
                                        <td>{{$bv->project_name}}</td> 
                                        <td>{{$bv->name}}</td> 
                                        <td>{{$bv->email}}</td> 
                                        <td>{{$bv->contact}}</td> 
                                        <td>{{date("d/M/Y", strtotime($bv->book_date))}}</td> 
                                        <td>{{date("h:i A", strtotime($bv->book_from_time))}} - {{ date("h:i A", strtotime($bv->book_to_time)) }}</td> 
                                        <td>
                                            
                                            <a href="#" data-toggle="modal" data-target="#bookvisit_delete_confirm"  data-id="{{ $bv->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                <td colspan="9">No result found</td>
                                @endif
                            </tbody>
                        </table>
                        {{ $bookvisit->links() }}
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
    jQuery(document).ready(function () {
        
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
                url:'/admin/bookvisit/delete/'+id,
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
    });
</script>
@endsection