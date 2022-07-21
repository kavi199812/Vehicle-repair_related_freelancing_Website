@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-header"><h1 style="align-content: center">Edit Vehicle Repairs</h1></div>
        <div class="card-body">

            @if(Session::get('status'))
                <div class="alert alert-success">
                    {{Session::get('status')}}
                </div>
            @endif

            <form action="{{ route('jobs.update',$job->id) }}" method="post">
                @csrf
                @method('put')
                <hr>
                <label>vehicle name</label></br>
                <input type="text" name="vehicle_name" id="name" class="form-control" value="{{$job->vehicle_name}}" placeholder="vehicle name"></br>
                <spam class="text-danger">@error('vehicle_name'){{$message}} @enderror</spam>
                <label>vehicle modal</label></br>
                <input type="text" name="vehicle_modal" id="address" class="form-control" value="{{$job->vehicle_modal}}" placeholder="vehicle Modal"></br>
                <spam class="text-danger">@error('vehicle_modal'){{$message}} @enderror</spam>

                <label>Fault</label>
                <input type="text" name="fault" id="mobile" class="form-control" value="{{$job->fault}}" placeholder="Fault"></br>

                <spam class="text-danger">@error('fault'){{$message}} @enderror</spam>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

            <br><br>

        </div>
    </div>
@stop
