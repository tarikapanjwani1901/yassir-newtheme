@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">All States</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form method="get" class="padd15" name="search" action="state_search"  autocomplete="off">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="search" value="{{$search_keyword}}" name="search_keyword" class="form-control" placeholder="City">
                                </div>
                                
                                <div class="col-md-3">
                                    {!! Form::select('search_country', $countries,$search_country,['class' => 'form-control search_country default-select size-1 form-control wide mb-3 ', 'id' => 'search_country']) !!}
                                </div>

                                <div class="col-md-3">
                                    {!! Form::select('search_status', $status,$search_status,['class' => 'form-control search_status default-select size-1 form-control wide mb-3', 'id' => 'search_status']) !!}
                                </div>

                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>

                                <div class="col-md-1">
                                    <a href="{{url('/admin/states')}}" data-toggle="tooltip" title="Reset"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </form>    

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>State Name</th>
                                        <th>Country Name</th>
                                        <th>Status</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($state))
                                        <?php foreach ($state as $key => $value) { ?>
                                            <tr id="tr_{{ $value->state_id}}">
                                                <td><?php echo $value->state_name; ?></td>
                                                <td><?php echo $value->country_name; ?></td>
                                                <td><?php echo $value->status; ?></td>
                                                <td class="ac">
                                                    <div class="d-flex">
                                                        <a href="states/edit/{{ $value->state_id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#state_delete_confirm"  data-id="{{ $value->state_id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    @else
                                    <tr> 
                                        <td colspan="4">No records found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $state->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('customjs')

@stop