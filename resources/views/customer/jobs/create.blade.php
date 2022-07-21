@extends('customer.jobs.layout2')
@section('content')
    <div class="card">
        <div class="card-header"><h1 style="align-content: center;">What is your Vehicle Fault</h1></div>
        <div class="card-body">

            @if(Session::get('status'))
                <div class="alert alert-success">
                    {{Session::get('status')}}
                </div>
            @endif

            <form action="{{ route('customer.jobs.store') }}" method="post">
                @csrf
                <hr>
                <label>vehicle Brand name</label></br>
                <input type="text" name="vehicle_name" id="name" class="form-control" placeholder="vehicle Brand name"></br>
                <spam class="text-danger">@error('vehicle_name'){{$message}} @enderror</spam>
                <label>vehicle modal</label></br>
                <input type="text" name="vehicle_modal" id="address" class="form-control" placeholder="vehicle Modal"></br>
                <spam class="text-danger">@error('vehicle_modal'){{$message}} @enderror</spam>

                <label>Fault</label>

                <textarea type="text" name="fault" id="mobile" class="form-control" placeholder="Explain your vehicle fault Fault"></textarea></br>

                <spam class="text-danger">@error('fault'){{$message}} @enderror</spam>
                <input type="submit" value="Send Your Job" class="btn btn-success"></br>

            </form>

            <br><br>

        </div>
    </div>
@stop
