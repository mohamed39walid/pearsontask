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
    <title>Tournment Dashboard</title>
</head>
<body class="bg-dark text-white">
    @include('layouts.navigation')
    <h1 class="text-center m-5" style="font-size: 50px">Tournment Dashboard</h1>
    <div class="container">
        <table class="table custom-table">
            <thead class="table-dark">
                <th>Tournment Name</th>
                <th>Tournment Description</th>
                <th>Events Number</th>
                <th>Category ID</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($tournments as $tournment)
                <tr class="table-dark">
                    <td>{{$tournment->name}}</td>
                    <td>{{$tournment->description}}</td>
                    <td>{{$tournment->events_number}}</td>
                    <td>{{$tournment->category_id}}</td>
                    <td>
                        <a class="btn btn-primary" href="/tournmentupdate/{{$tournment->id}}">Update</a>
                        <a href="/tournmentdelete/{{$tournment->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="/addtournment">Add Tournment</a>
    </div>

</body>
</html>