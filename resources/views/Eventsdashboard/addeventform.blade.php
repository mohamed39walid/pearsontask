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
    <title>Add Event</title>
</head>
<body class="bg-dark text-white">
    <div class="container">
        @include('layouts.navigation')
        <h1 class="text-center m-4">Add Event</h1>
        <form class="bg-dark text-white w-50 m-auto" action="/addevent" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Event Name</label>
                <input type="text" class="form-control rounded" name="eventname">
            </div>
            @error('eventname')
            <span class="text-danger">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Event Description	</label>
                <input type="text" class="form-control rounded" name="eventdescription">
            </div>
            @error('eventdescription')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Is Individual</label>
                <select class="text-dark form-select rounded" name="isindividual">
                    <option value={{true}}>
                        Yes
                    </option>
                    <option value=2>
                        No
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Choose the tournment</label>
                <select class="text-dark form-select rounded" name="tournmentid">
                    @foreach ($tournments as $tournment)
                        <option class="text-dark form-control" value={{$tournment->id}}>{{$tournment->name}}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" value="Add Event" type="submit">
            <a class="btn btn-success" href="/eventdashboard">Back</a>
        </form>
    </div>
</body>
</html>
