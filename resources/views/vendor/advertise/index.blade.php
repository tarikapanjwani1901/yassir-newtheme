@extends('layouts.vendor.app')
@section('content')
    <div class="container-fluid">
        <div class="row  p-0">
            <div class="col-lg-12">
                <div class="card">
                	<div class="card-header pb-3 pt-3 text-uppercase">
                    	List Advertisement
                        <a href="{{url('/vendor/advertise/create')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New Testimonial">Create New Advertisement</a>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="ac w1">Title</th>
                                        <th class="w2">Vendor Name</th>
                                        <th class="ac w7">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($advertise))
                                        @foreach($advertise as $ad)
                                            <tr id="tr_{{$ad->id}}">
                                                <td class="w2">{{ $ad->title }}</td>
                                                <td class="w3">{{ $ad->company_name }}</td>
                                                <td class="ac w7">
                                                    <a href="advertise/edit/{{ $ad->id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#cities_delete_confirm"  data-id="{{ $ad->id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                        <td colspan="10">No result found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $advertise->links() }}
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
                    <h4 class="modal-title">Remove Advertisement</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Advertisement?</p>
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
                    url:'/vendor/advertise/delete/'+id,
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