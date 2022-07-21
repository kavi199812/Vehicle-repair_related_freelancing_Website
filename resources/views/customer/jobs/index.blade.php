@extends('customer.jobs.layout2')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <br>

                    @if(Session::get('status'))
                        <div class="alert alert-success">
                            {{Session::get('status')}}
                        </div>
                    @endif

                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                    @endif

                    <div class="card-body" >
                        <form action="" class="col-12">
                        <table>
                            <th class="col-12"><input id="search" placeholder="search by Vehicle Name or Fault" type="search" name="search" class="form-control" value="{{$search}}"/></th>
                            <th><button class="btn btn-primary">search</button></th>
                        </table>
                        </form>

                        <br>
                        <a href="{{ url('customer/jobs/create') }}" class="btn btn-success btn-sm" title="Add New Contact" style="margin-left: 25px">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Job
                        </a>
                        <br/>
                        <br/>
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
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('customer.jobs.edit',$data->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('customer.jobs.destroy',$data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="DELETE" class="btn btn-danger"></br>
                                        </form>
                                    </td>
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
@endsection

