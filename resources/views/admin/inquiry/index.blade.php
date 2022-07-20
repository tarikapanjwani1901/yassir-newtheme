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
                                    <th>Id</th>
                                    <th>Property Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Info</th>
                                    <th>Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = ($inquires->currentpage()-1)*$inquires->perpage() + 1 @endphp
                                @if(count($inquires))
                                    @foreach($inquires as $inquire)
                                        <tr id="tr_{{$inquire->id}}">
                                            <td> {{$i++}}</td>
                                            <td> {{ ucfirst($inquire->l_title) }} </td>
                                            <td> {{ ucfirst($inquire->name) }} </td>
                                            <td> {{ ucfirst($inquire->email) }} </td>
                                            <td> {{ $inquire->contact }} </td>
                                            <td> {{ $inquire->message }} </td>
                                            <td> <?php echo date('M j h:ia', strtotime($inquire->created_at)) ?> </td>
                                        </tr>
                                    @endforeach
                                @else
                                <td colspan="7">No Result Found</td>
                                @endif
                            </tbody>
                        </table>
                        {{$inquires->links()}}
                    </div>
                </div>
            
        </div>
    </div>

@endsection

@section('customjs')
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker();
    });
@endsection