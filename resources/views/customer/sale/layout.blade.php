<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<nav class="navbar navbar-light" style="background-color: #e3f2fd;padding: 10px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">KANDY VEHICLE</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a></li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                </ul>
            </li>
            <li><a href="#">Page 2</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>





<div class="container">
    @yield('content')
</div>

<footer class="bg-light text-center" style="background-color: #e3f2fd; padding: 20px;>
        <div class="container p-4">
<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Footer Content</h5>

        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
            voluptatem veniam, est atque cumque eum delectus sint!
        </p>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled mb-0">
            <li>
                <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
                <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
                <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
                <a href="#!" class="text-white">Link 4</a>
            </li>
        </ul>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Links</h5>

        <ul class="list-unstyled">
            <li>
                <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
                <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
                <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
                <a href="#!" class="text-white">Link 4</a>
            </li>
        </ul>
    </div>
    <!--Grid column-->
</div>
<!--Grid row-->
</div>
<!-- Grid container -->

<!-- Copyright -->
<div class="text-center p-3" style="background-color: gray; padding: 15px;">
    © 2020 Copyright:Kandy Vehicle

</div>
<!-- Copyright -->
</footer>

</body>
</html>


