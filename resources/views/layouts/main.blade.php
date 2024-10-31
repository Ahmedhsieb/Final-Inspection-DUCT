<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset("Assets/Design/css/bootstrap.min.css")}}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>

        <a href="#x" class="navbar-toggler" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </a>

        <div id="x" class="collapse navbar-collapse row justify-content-between">
            <ul class="navbar-nav col-md-9 col-sm-6">

                <li class="nav-item dropdown ms-4">
                    <a href="" class="nav-link dropdown-toggle" id="dropdown" data-bs-toggle="dropdown"
                       aria-expanded="false">Create</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown">
                        <a href="/param/create" class="dropdown-item">Parameter</a>
                        <a href="/order/create" class="dropdown-item">Order</a>
                    </div>
                </li>

                <li class="nav-item dropdown ms-4">
                    <a href="" class="nav-link dropdown-toggle" id="dropdown" data-bs-toggle="dropdown"
                       aria-expanded="false">Trashed</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown">
                        <a href="/param?trash='true'" class="dropdown-item">Parameters Trash</a>
                        <a href="/order?trash='true'" class="dropdown-item">Orders Trash</a>
                    </div>
                </li>

                <li class="nav-item dropdown ms-4">
                    <a href="" class="nav-link dropdown-toggle" id="dropdown" data-bs-toggle="dropdown"
                       aria-expanded="false">Show</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown">
                        <a href="/param" class="dropdown-item">Parameters</a>
                        <a href="/order" class="dropdown-item">Orders</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>

</nav>


<div class="ps-3 pe-3" style="padding-top: 4em">

    <div class="row" style="padding-left: 7rem">
        <div class="col-4">
            <img src="{{asset('Assets/Images/daniaAirLogo.png')}}" alt="">
        </div>
        <h3 class="text-center m-5 fw-bold text-secondary fs-1 col-3">{{env('APP_NAME')}}</h3>
        <div class="col-2" style="margin-left: 150px">
            <img src="{{asset('Assets/Images/BQSRLogo.png')}}" alt="">
        </div>
    </div>
</div>

<hr class="m-3 border-3 border-dark">


    @yield('content')

    <script src="{{asset("Assets/Design/js/popper.min.js")}}"></script>
    <script src="{{asset("Assets/Design/js/jquery-3.7.1.min.js")}}"></script>
    <script src="{{asset("Assets/Design/js/bootstrap.bundle.min.js")}}"></script>
@stack('js')

</body>

</html>
