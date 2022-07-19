@extends('layouts.app')
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
                                    <select class="default-select size-1 form-control wide mb-3" id="vendors" name="vendors" >
                                        <option value="">Select Vendor</option>
                                        @if (!empty($vendors_info))
                                            @foreach($vendors_info as $d)
                                                @if ($vendors == $d->vl_id)
                                                    <option value="{{$d->vl_id}}" selected="selected">{{$d->l_title}}</option>
                                                @else
                                                    <option value="{{$d->vl_id}}" >{{$d->l_title}}</option>
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
                                        <td>{{$bv->l_title}}</td> 
                                        <td>{{$bv->name}}</td> 
                                        <td>{{$bv->email}}</td> 
                                        <td>{{$bv->contact}}</td> 
                                        <td>{{date("d/M/Y", strtotime($bv->book_date))}}</td> 
                                        <td>{{date("h:i A", strtotime($bv->book_from_time))}} - {{ date("h:i A", strtotime($bv->book_to_time)) }}</td> 
                                        <td><a href="#" class="btn btn-danger btn-info btn-lg onclick" data-id="{{ $bv->id }}" data-toggle="modal" data-target="#myModal">Delete</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                <td colspan="7">No result found</td>
                                @endif
                            </tbody>
                        </table>
                        {{ $bookvisit->links() }}
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
                    <h4 class="modal-title">Remove Book Visit</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <input type="hidden" name="bookId" id="bookId" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" id="btn_ok_1" class="btn btn-primary">Sure</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')

    jQuery(document).ready(function () {
        
        jQuery('#datetimepicker6').datetimepicker();
        jQuery('#datetimepicker7').datetimepicker();


        jQuery(document).on("click", ".onclick", function () {
            var myBookId = $(this).data('id');
            jQuery(".modal-dialog #bookId").val( myBookId );
            jQuery("#myModal").dialog("open");

        });

        jQuery("#btn_ok_1").on('click',function(){
            var bvID = jQuery("#bookId").val();
            $.ajax({
                type:'POST',
                url:'bookvisit/delete/'+bvID,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data){
                        if (data == 'success') {
                            $( ".close" ).trigger( "click" );
                            $("#tr_"+bvID).css('display','none');
                        }
                }
            });
        });
    });
@endsection