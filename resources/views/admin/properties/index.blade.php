@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">Properties</a>
        </div>

        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                  
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th class="ac" align="center">Property Name</th>
                                        <th>Vendor</th>
                                        <th>Property For</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>City</th>
                                        <th>Sub City</th>
                                        <th>Area</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($properties))
                                    <?php foreach ($properties as $key => $value) { ?>
                                        <tr id="tr_{{ $value->id }}">
                                            <td><?php echo $value->project_name; ?></td>
                                            <td><?php echo $value->company_name; ?></td>
                                            <td><?php echo $value->property_for; ?></td>
                                            <td><?php echo $value->category; ?></td>
                                            <td><?php echo $value->sub_category; ?></td>
                                            <td><?php echo $value->city_name; ?></td>
                                            <td><?php echo $value->sub_city_name; ?></td>
                                            
                                            <td><?php echo $value->area_name; ?></td>
                                            
                                            <td>
                                                <div class="d-flex">
                                                    <a href="properties/edit/{{ $value->id }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#tes_delete_confirm"  data-id="{{ $value->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
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
                        {{ $properties->links() }}
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
                    <h4 class="modal-title">Remove Porperty</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this property?</p>
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
            url:'/admin/properties/delete/'+id,
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
@endsection