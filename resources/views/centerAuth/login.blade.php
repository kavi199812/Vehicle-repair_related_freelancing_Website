@extends('centerAuth.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 45px; align-content: center">
            <div class="col-md-4 col-md-offset-4" style="align: center;">
                <h1>Repair Center login</h1>
                <br>
                <form action="{{route('center-auth.check')}}" method="post">

                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <labbel>Email</labbel>
                        <input type="text" class="form-control" name="email" placeholder="email">
                        <spam class="text-danger">@error('email'){{$message}} @enderror</spam>
                    </div>
                    <br>
                    <div class="form-group">
                        <labbel>Password</labbel>
                        <input type="password" class="form-control" name="password" placeholder="password">
                        <spam class="text-danger">@error('password'){{$message}} @enderror</spam>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>

                <h6 style="padding-top: 30px;padding-right: 30px;">Not Registared yet  <a href="../center-auth/register"> Register Now</a></h6>

            </div>


            <div class="col-md-4 col-md-offset-4" style="align:right;">

                <div class="country-wrap">
                    <br><br><br>

                    <div class="mountain-1"></div>
                    <div class="mountain-2"></div>

                    <div class="sun"></div>
                    <div class="grass"></div>
                    <div class="street">
                        <div class="car">
                            <!--<div class="car-base"></div>-->
                            <div class="car-body">
                                <div class="car-top-back">
                                    <div class="back-curve"></div>
                                </div>
                                <div class="car-gate"></div>
                                <div class="car-top-front">
                                    <div class="wind-sheild"></div>
                                </div>
                                <div class="bonet-front"></div>
                                <div class="stepney"></div>
                            </div>
                            <div class="boundary-tyre-cover">
                                <div class="boundary-tyre-cover-back-bottom"></div>
                                <div class="boundary-tyre-cover-inner"></div>
                            </div>
                            <div class="tyre-cover-front">
                                <div class="boundary-tyre-cover-inner-front"></div>
                            </div>
                            <div class="base-axcel">

                            </div>
                            <div class="front-bumper"></div>
                            <div class="tyre">
                                <div class="gap"></div>
                            </div>
                            <div class="tyre front">
                                <div class="gap"></div>
                            </div>
                            <div class="car-shadow"></div>
                        </div>
                    </div>
                    <div class="street-stripe"></div>
                    <div class="hill">
                        <div class="tree-1">
                            <div class="branch-1"></div>
                            <div class="branch-2"></div>
                            <div class="branch-3"></div>
                        </div>
                        <div class="tree-1">
                        <div class="branch"></div>
                        <div class="trunk"></div>
                    </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <br><br>
@endsection
