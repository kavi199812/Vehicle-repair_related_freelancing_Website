@extends('customer.profile.customerProfileLayout')
@section('content')

    <!-- Profile Area -->
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="upper"> <img src="/assets/img/hero-bg.jpg" class="img-fluid"> </div>
            <div class="user text-center">
                <div class="profile"> <img src="/assets/img/user1.png" class="rounded-circle" width="80"> </div>
            </div>
            <div class="mt-5 text-center">
                <h3 class="mb-0">{{auth('customer')->user()->name}}</h3>

                <h5 class="text-muted d-block mb-2">{{auth('customer')->user()->email}}</h5>

                <button class="btn btn-success btn-sm follow">Edit Profile</button>

                <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                    <div class="stats">
                        <h5 class="mb-0">Available jobs</h5> <p>5</p>
                    </div>
                    <div class="stats">
                        <h5 class="mb-0">Available Vehicles</h5> <p>2</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Profile Area End  -->
@stop
