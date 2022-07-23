@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">All Sub Cities</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-12">


                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>City Name</th>
                                        <th>State Name</th>
                                        <th>Country Name</th>
                                        <th>Status</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($cities))
                                        <?php foreach ($cities as $key => $value) { ?>
                                            <tr id="tr_{{ $value->city_id}}">
                                                <td><?php echo $value->city_name; ?></td>
                                                <td><?php echo $value->state_name; ?></td>
                                                <td><?php echo $value->country_name; ?></td>
                                                <td><?php echo $value->status; ?></td>
                                                <td class="ac">
                                                    <div class="d-flex">
                                                        <a href="cities/edit/{{ $value->state_id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#cities_delete_confirm"  data-id="{{ $value->city_id }}" class="onclick btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                        @else
                                        <tr> 
                                            <td colspan="6">No records found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $cities->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>