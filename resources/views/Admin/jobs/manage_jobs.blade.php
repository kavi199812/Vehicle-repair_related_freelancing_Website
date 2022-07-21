@extends('Admin.adminlayout')
@section('content')


    <h3>ALL  AVAILABLE  JOBS </h3>
    <BR>
    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
    @endif

    <form action="">
        <input id="search" placeholder="search by Vehicle Name or Fault" type="search" name="search" class="form-control" value="{{$search}}"/>
        <br>
        <button class="btn btn-primary">search</button>
    </form>
    <br>

    <div class="table-responsive">

        <table class="table" style="padding: 10px;">
            <thead>
            <tr>
                <th>Vehicle Name</th>
                <th>Vehicle Model</th>
                <th>Vehicle Fault</th>

            </tr>
            </thead>

            @foreach($jobs as $data)

                <tr>
                    <td>{{$data->vehicle_name}}</td>
                    <td>{{$data->vehicle_modal}}</td>
                    <td>{{$data->fault}}</td>
                    <td>
                        <form action="{{ route('customer.jobs.destroy',$data->id) }}" method="post">
                            @csrf

                            @method('DELETE')
                            <input type="submit" value="DELETE" class="btn btn-danger"></br>
                        </form>
                    </td>
                </tr>
            @endforeach


        </table>
    </div>
    <br><br>
@stop
