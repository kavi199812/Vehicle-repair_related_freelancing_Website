@extends('customer.jobs.layout2')
@section('content')
    <div class="card">
        <div class="card-header"><h1 style="align-content: center;">What is your Vehicle</h1></div>
        <div class="card-body">
            @if(session('customer.sale.create'))
                <h6 class="alert alert-success">{{'customer.sale.create'}}</h6>
            @endif

            <form action="{{route('vehicledelete.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <hr>
                <label>vehicle name</label></br>
                <input type="text" name="vehicle_name" id="name" class="form-control" placeholder="vehicle name" required></br>
                <spam class="text-danger">@error('vehicle_name'){{$message}} @enderror</spam>

                <label>vehicle modal</label></br>
                <input type="text" name="vehicle_model" id="address" class="form-control" placeholder="vehicle Modal" required></br>
                <spam class="text-danger">@error('vehicle_model'){{$message}} @enderror</spam>

                <label>Vehicle Price</label>
                <input type="number" name="vehicle_price" id="mobile" class="form-control" placeholder="Vehicle Price" required></br>

                <div class="form-group">

                <label>Vehicle Image</label>
                <input type="File" name="vehicle_img" id="vehicle_img" class="form-control" style="max-width: 500px;max-height: 100px;" onchange="previewFile(this)" placeholder="Fault" required></br>
                <img id="previewimg" alt="car image" style="max-width: 500px;max-height: 500px;" />
                </div>


                <spam class="text-danger">@error('fault'){{$message}} @enderror</spam>
                <input type="submit" value="Save" class="btn btn-primary"></br>
            </form>

            <br><br>

                <script>
                    function previewFile(input){
                        var file=$('input[type=file]').get(0).files[0];
                        if(file){
                            var reader = new FileReader();
                            reader.onload=function (){
                                $('#previewimg').attr('src',reader.result);
                            }
                            reader.readAsDataURL(file);

                        }
                    }
                </script>

        </div>
    </div>
@stop
