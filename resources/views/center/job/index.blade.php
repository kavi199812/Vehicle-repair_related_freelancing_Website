@extends('center.logedcenterlayout')
@section('content')


    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <br>

                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <div class="card-body" >
                       <center><h1>All Available Jobs</h1></center>
                        <br>
                        <form action="" class="col-8">
                            <table>
                                <th class="col-12"><input id="search" placeholder="search by Vehicle Name or Fault" type="search" name="search" class="form-control" value="{{$search}}"/></th>
                                <th><button class="btn btn-primary">search</button></th>
                            </table>

                        </form>
                        <br>
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


                                        <td>
                                            <a class="btn btn-success" href="{{ route('vehicle-center.edit',$data->id) }}">Send Offer</a>
                                        </td>

                                    </tr>
                                @endforeach


                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@stop
