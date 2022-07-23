@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <a href="javascript:void(0)">Add State</a>
        </div>

        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-body">
                        <form method="post" id="addstate" enctype="multipart/form-data">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
    jQuery(document).ready(function () {

    });
@endsection
