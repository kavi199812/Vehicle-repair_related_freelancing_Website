@extends('Admin.adminlayout')
@section('content')


    <div class="card-body">
        <h3>ALL  AVAILABLE  CENTERS </h3>
        <BR>

        <form action="">
            <input id="search" placeholder="search by center name or mail" type="search" name="search" class="form-control" value="{{$search}}"/>
            <br>
            <button class="btn btn-primary">search</button>
        </form>
        <br>


        <div class="table-responsive">

            <table class="table" style="padding: 10px;">
                <thead>
                <tr>
                    <th>Center Name</th>
                    <th>Center Mail</th>
                    <th>Center Address</th>


                </tr>
                </thead>

                @foreach($jobs as $data)

                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->address}}</td>
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


    <br><br>
@stop
