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
                    	Vsitor Search Records
                         
                        </div>
               
                    <div class="card-body">
                    
                    <form method="get" class="padd15" name="search" action="visitor_search_record_filter"  autocomplete="off">
                        	
                            
                        <div class="row p-0">
                        	<div class="col-md-3">
                            	<div class="form-group">
                                    <input type="text" placeholder="Keyword" value="{{$search_keyword}}" name="search_keyword" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                            	<div class="form-group">
                                    <input type="text" placeholder="Device" value="{{$search_device}}" name="search_device" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                            	<div class="form-group">
                                    <input type="text" placeholder="OS" value="{{$search_os}}" name="search_os" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-3">
                            	<div class="form-group">
                                    <input type="text" placeholder="Ip address" value="{{$search_ip_address}}" name="search_ip_address" class="form-control" />
                                </div>
                            </div>
                            
                            
                                <div class="col-md-3">
                                <div class="form-group">
                               
                                    <input id="datetimepicker6" value="{{$from}}"  name="from" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" placeholder="Start date"/>
                              	</div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                               
                                    <input id="datetimepicker7" value="{{$to}}" name="to" type="text" class="form-control dt1" data-date-format="YYYY-MM-DD" placeholder="End date"/>
                               </div>
                                </div>
                            
                                                       
                            <div class="col-md-3">
                            	<input type="submit" class="btn btn-primary" value="Submit">
                                
                            	
                                 <a href="{{url('/admin/visitor_search_record')}}" data-toggle="tooltip" title="Reset"><input type="button" class="btn btn-light" value="Reset"></a>
                            </div>
                        </div>   
                        </form>
                        <div class="table-responsive mt-3">
                            <table class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th>Search keyword</th>
                                        <th>Device</th>
                                        <th>OS</th>
                                        <th>Ip Address</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($visitor_search_records))
                                    <?php foreach ($visitor_search_records as $key => $s) { ?>
                                        <tr id="tr_{{ $s->id}}">
                                           <td>{{$s->search_keyword}}</td>
                                        <td>{{$s->device}}</td>
                                        <td>{{$s->ios}}</td>
                                        <td>{{$s->ip}}</td>
                                        <td><?php echo date('d/M/Y', strtotime($s->created_at)) ?></td>
                                        </tr>
                                    <?php } ?>
                                    @else
                                        <tr> 
                                            <td colspan="5">No records found</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        {{ $visitor_search_records->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>

@endsection


@section('customjs')
<script type="text/javascript">
    jQuery(document).ready(function () {
		jQuery('#datetimepicker6').datepicker({ dateFormat: 'yy-mm-dd' });
	    jQuery('#datetimepicker7').datepicker({ dateFormat: 'yy-mm-dd' });

    });
</script>
@stop