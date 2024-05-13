<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>
</head>
<body class="text-white bg-dark">
    @include('layouts.navigation')
    @if(Auth()->user() && (Auth()->user()->role == 'admin' || Auth()->user()->role == 'superadmin'))
        <div class="m-3 text-center">
            <a href="/categorydashboard" class="btn btn-primary">Category dashboard</a>
            <a href="/tournmentdashboard" class="btn btn-primary">Tournment dashboard</a>
            <a href="/userdashboard" class="btn btn-primary">user dashboard</a>
            <a href="/eventdashboard" class="btn btn-primary">event dashboard</a>
        </div>
    @endif
    @if(Auth()->user() && (Auth()->user()->role == 'user'))
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh">
        <div class="m-auto text-center">
            <h1 style="font-size: 60px">Welcome to the tournment system</h1><br>
            <div class="row">  
            @foreach ($tournments as $tournment )     
                <div class="card m-3 ml-3 col-xs-12 col-md-3 m-auto">
                    <div class="card-body">
                        <h5 class="card-title m-3">Tournment Name: {{$tournment->name}}</h5>
                  <p class="card-text m-3">Tournment Description: {{$tournment->description}}</p>
                  <a href="/join_tournment/{{$tournment->id}}" class="btn btn-success m-auto text-center m-3 items-center">Join a tournment</a>
                  <a href="/yourscore" class="btn btn-success m-auto text-center mt-3 items-center">Show your score</a>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    @endif

</body>
</html>
