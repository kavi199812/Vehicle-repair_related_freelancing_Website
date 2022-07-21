@extends('Admin.report.layout')
@section('content')


    <div class="card-body">

        <div class="row">
            <div class="col">
                <h3>JOBS  REPORT</h3>
            </div>
            <div class="col">
                <a href="reports/export/" class="btn btn-success btn-sm" title="Add New Contact">
                    <i class="fa fa-plus" aria-hidden="true"></i> Export Report
                </a>
            </div>

        </div>

        <BR>
        <div class="table-responsive">

            <table class="table" style="padding: 10px;">
                <thead>
                <tr>
                    <th>Vehicle Name</th>
                    <th>Vehicle Model</th>
                    <th>Fault</th>
                </tr>
                </thead>

                @foreach($jobs as $data)

                    <tr>
                        <td>{{$data->vehicle_name}}</td>
                        <td>{{$data->vehicle_modal}}</td>
                        <td>{{$data->fault}}</td>
                    </tr>
                @endforeach


            </table>
        </div>

    </div>
    <br><br>
@stop
