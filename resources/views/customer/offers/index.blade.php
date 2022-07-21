@extends('customer.offers.layout')
@section('content')
    <div class="container">

        <form action="" class="col-md-12">
            <table>
                <th class="col-12"><input id="search" placeholder="search by Vehicle repair center location" type="search" name="search" class="form-control" value="{{$search}}"/></th>
                <th><button class="btn btn-primary">search</button></th>
            </table>
        </form>
        <br><br>

        @foreach($jobs as $data)

        <div class="card">
            <h5 class="card-header"><span class="m-0 font-weight-bold text-primary">Related Job :</span> {{$data->fault}}<br><br><span style="color:black;font-size: 15px;float: right">Offer Date & Time :{{$data->created_at}} </span> </h5>
            <div class="card-body">

                <div class="card" style="width: 100%;">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h6 class="m-0 font-weight-bold text-primary">📌 Center Location :</h6> <h6 style="margin-left: 25px;">{{$data->location}}</h6></li>
                        <li class="list-group-item"><h6 class="m-0 font-weight-bold text-primary"> 💡 Their Idea for your vehicle Fault :</h6> <h6 style="margin-left: 25px;">  {{$data->discription}}</h6></li>
                        <li class="list-group-item"><h6 class="m-0 font-weight-bold text-primary">📧 Center Mail :</h6> <h6 style="margin-left: 25px;"> {{$data->email}}</h6></li>
                        <li class="list-group-item"><h6 class="m-0 font-weight-bold text-primary">☎ Center Tel : </h6><h6 style="margin-left: 25px;"> {{$data->mobile}}</h6></li>
                        <li class="list-group-item"><h6 class="m-0 font-weight-bold text-primary">$ Offer Price : </h6><h6 style="margin-left: 25px;"> {{$data->cost}}</h6></li>
                    </ul>
                    <ul><br>
                        <form action="{{ route('offeraccept.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="job_id" id="job_id" class="form-control" value="{{$data->job_id}}" >
                            <input type="hidden" name="center_id" id="center_id" class="form-control" value="{{$data->center_id}}" >
                            <input type="hidden" name="customer_id" id="customer_id" class="form-control" value="{{$data->customer_id}}" >
                            <input type="hidden" name="offer_id" id="offer_id" class="form-control" value="{{$data->id}}" >
                            <input type="hidden" name="offer_price" id="offer_id" class="form-control" value="{{$data->cost}}" >
                            <input type="submit" value="Accept Offer" class="btn btn-success">
                        </form>
                    </ul>
                </div>
                </div>
        @endforeach
                </div>
    </div>
    </div>

    <br><br>
@endsection

