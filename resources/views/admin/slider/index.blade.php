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
                    	Slider
                        	        <a href="{{url('/admin/slider/add')}}" class="btn btn btn-success text-uppercase" data-toggle="tooltip" title="Add New Slider">Add New Slider</a>
                         
                        </div>
               
                    <div class="card-body">
                    
                    <form method="get" class="padd15" name="search" action="slider_search"  autocomplete="off">
                        	
                            
                        <div class="row p-0">
                        	<div class="col-md-3">
                            	<div class="form-group">
                                    <input type="text" placeholder="Name" value="{{$search_name}}" name="search_name" class="form-control" />
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                            	<div class="form-group">
                                     {!! Form::select('search_slider_type', $type,$search_slider_type,['class' => 'select2 form-control', 'id' => 'search_slider_type']) !!}
                                
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                            	<div class="form-group">
                                      {!! Form::select('search_slider_status', $status,$search_slider_status,['class' => 'select2 form-control', 'id' => 'search_slider_status']) !!}
                                
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                           
                            <div class="col-md-3">
                            	<input type="submit" class="btn btn-primary" value="Submit">
                                
                            	
                                 <a href="{{url('/admin/slider')}}" data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light" value="Reset"></a>
                            </div>
                        </div>   
                        </form>
                        <div class="table-responsive mt-3">
                            <table class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($sliders))
                                    <?php foreach ($sliders as $key => $value) { ?>
                                        <tr id="tr_{{ $value->id}}">
                                            <td><?php echo $value->name; ?></td>
                                            <td><?php echo $value->slider_type; ?></td>
                                            <td><?php echo $value->slider_status; ?></td>
                                            <td align="center">
                                                    <a href="slider/edit/{{ $value->id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#delete_confirm"  data-id="{{ $value->id}}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
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
                        {{ $sliders->links() }}
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
                    <h4 class="modal-title">Remove Slider</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this slider?</p>
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
     jQuery(".select2").select2();
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
            url:'slider/delete/'+id,
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