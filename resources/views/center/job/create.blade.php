@extends('center.job.layout')
@section('content')

<div class="card">
    <div class="card-header"><h1 style="align-content: center;">Send Your offer</h1></div>
    <div class="card-body">

        @if(Session::get('status'))
            <div class="alert alert-success">
                {{Session::get('status')}}
            </div>
        @endif


        <form action="{{ route('vehicle-center.store') }}" method="post">
            @csrf
            <hr>
            <label>Your Budget</label></br>
            <input type="number" name="cost" id="cost" class="form-control" placeholder="LKR" required></br>
            <spam class="text-danger">@error('cost'){{$message}} @enderror</spam>

            <label>Description</label></br>
            <textarea type="text" name="discription" id="discription" class="form-control" placeholder="Explain your idea" required></textarea></br>
            <spam class="text-danger">@error('discription'){{$message}} @enderror</spam>

            <label>Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email" required></br>
            <spam class="text-danger">@error('email'){{$message}} @enderror</spam>

            <label>Mobile Number</label>
            <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Type your Contact number" required></br>
            <spam class="text-danger">@error('mobile'){{$message}} @enderror</spam>

            <input type="hidden" name="job_id" id="job_id" class="form-control" value="{{$id}}" >

            <input type="hidden" name="fault" id="fault" class="form-control" value="{{$fault}}" >

            <input type="hidden" name="customer_id" id="customer_id" class="form-control" value="{{$cus_id}}" >

            <label>Your center Location</label>
            <input type="text" name="location" id="location" class="form-control" placeholder="Enter Your Center location Here" required></br>
            <spam class="text-danger">@error('location'){{$message}} @enderror</spam>

            <input type="submit" value="Send Offer" class="btn btn-success"></br>

        </form>

        <br><br>

    </div>
</div>

@stop
