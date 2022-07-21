@extends('customer.sale.layout2')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    @if(Session::get('status'))
                        <div class="alert alert-success">
                            {{Session::get('status')}}
                        </div>
                    @endif
                    <br>
                    <div class="card-body">
                       <a href="{{ url('customer/vehicledelete/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Your Vehicles
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">

                            <table class="table" style="padding: 10px;">
                                <thead>
                                <tr>
                                    <th>Vehicle id</th>
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Model</th>
                                    <th>Vehicle Price</th>
                                    <th>Vehicle Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($sale as $data)

                                    <tr>

                                        <td>{{$data->id}}</td>
                                        <td>{{$data->vehicle_name}}</td>
                                        <td>{{$data->vehicle_model}}</td>
                                        <td>LKR {{$data->vehicle_price}} /=</td>
                                        <td><i{{$data->vehicle_modal}}</td>
                                        <img src="{{asset('images')}}/{{$data->vehicle_img}}" style="max-height: 150px;max-width: 150px;">


                                        <td>
                                            <form action="{{ route('vehicledelete.destroy',[$data->id]) }}" method="post">
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
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <section class="news pt-0">
        <div class="container mt-md-5">
            <h2 class="mx-4 my-0 text-center">Your vehicle list</h2>
            <br>
            @foreach($sale as $data)
                <div class="card" style="width: 18rem;float: left; margin-right: 10px;margin-right: 80px;margin-bottom: 20px;">
                    <img class="card-img-top" style="height: 200px" src="{{asset('images')}}/{{$data->vehicle_img}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #0a53be"><b>{{$data->vehicle_name}}</b></h5>
                        <p>Vehicle Model :&nbsp;{{$data->vehicle_model}}</p>
                        <p>Vehicle Price :&nbsp;LKR&nbsp;{{$data->vehicle_price}}.00&nbsp;/=</p>

                    </div>
                </div>
            @endforeach

        </div>


    </section>

@endsection
