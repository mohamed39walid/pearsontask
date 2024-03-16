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
    <title>Join Tournment</title>
</head>
<body class="bg-dark text-white">
    @include('layouts.navigation')
    <div class="container m-auto text-center bg-dark text-white d-flex justify-content-center align-items-center" style="height:80vh">
        <form action="/tournamentform/{{$id}}" method="post">
            @csrf
            <h1 style="font-size: 60px" class="m-3">Select Your Situation</h1>
            <select name="situationselect" class="text-dark form-select w-50 m-auto">
                <option selected value="individual">Individual</option>
                <option value="team">Team</option>
            </select>
            <br>
            <input class="btn btn-danger m-2" type="submit">
        </form>
        </div>
</body>
</html>