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
                    	CMS
                         
                        </div>
                        

                    <div class="card-body ">
                             
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th class="ac">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($cms))
                                        <?php foreach ($cms as $key => $value) { ?>
                                            <tr id="tr_{{ $value->id}}">
                                                <td><?php echo $value->title; ?></td>
                                                <td  align="center">
                                                        <a href="cms/edit/{{ $value->id}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="../{{ $value->link}}" target="_blank" class="btn btn-warning shadow btn-xs sharp"><i class="fas fa-eye"></i></a>
                                                   
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    @else
                                    <tr> 
                                        <td colspan="2">No records found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $cms->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
@endsection

@section('customjs')
    
@endsection