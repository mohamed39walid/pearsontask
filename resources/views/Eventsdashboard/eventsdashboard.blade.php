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
    <title>Events Dashboard</title>
</head>
<body class="bg-dark text-white">
    @include('layouts.navigation')
    <h1 class="text-center m-5" style="font-size: 50px">Events Dashboard</h1>
    <div class="container">
        <table class="table custom-table">
            <thead class="table-dark">
                <th>Event Name</th>
                <th>Seats Number</th>
                <th>Event Description</th>
                <th>Is Individual</th>
                <th>Available Seats</th>
                <th>Tournment ID</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr class="table-dark">
                    <td>{{$event->event_name}}</td>
                    <td>{{$event->seats_number}}</td>
                    <td>{{$event->description}}</td>
                    <td>{{$event->is_individual}}</td>
                    <td>{{$event->available_seats}}</td>
                    <td>{{$event->tournment_id}}</td>
                    <td>
                        <a class="btn btn-primary" href="/updateeventform/{{$event->id}}">Update</a>
                        <a href="/confirmeventdelete/{{$event->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="/addevent">Add Event</a>
    </div>

</body>
</html>