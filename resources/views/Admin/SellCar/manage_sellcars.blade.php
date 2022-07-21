@extends('Admin.adminlayout')
@section('content')
    <div class="card-body">
        <br/>
        <h1>All Avalable Vehicles </h1>
        <br/>
        <div class="table-responsive">

            <table class="table" style="padding: 10px;">
                <thead>
                <tr>
                    <th>Vehicle Name</th>
                    <th>Vehicle Model</th>
                    <th>Vehicle Price</th>
                    <th>Vehicle Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($sale as $data)

                    <tr>

                        <td>{{$data->vehicle_name}}</td>
                        <td>{{$data->vehicle_model}}</td>
                        <td>LKR {{$data->vehicle_price}} /=</td>
                        <td><i{{$data->vehicle_modal}}</td>
                        <img src="{{asset('images')}}/{{$data->vehicle_img}}" style="max-height: 150px;max-width: 150px;">


                        <td>
                            <form action="{{ route('customer.jobs.destroy',$data->id) }}" method="post">
                                @csrf
                                <a class="btn btn-primary" href="{{ route('customer.jobs.edit',$data->id) }}">Edit</a>

                                @method('DELETE')
                                <input type="submit" value="DELETE" class="btn btn-danger"></br>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </table>
        </div>

    </div>
@stop
