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
    <title>Add Tournment</title>
</head>
<body class="bg-dark text-white">
    <div class="container">
        @include('layouts.navigation')
        <h1 class="text-center m-4">Add Tournment</h1>
        <form class="bg-dark text-white w-50 m-auto" action="/addtournment" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tournment Name</label>
                <input type="text" class="form-control rounded" name="tournmentname">
            </div>
            @error('tournmentname')
            <span class="text-danger">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Tournment Description</label>
                <input type="text" class="form-control rounded" name="tournmentdescription">
            </div>
            @error('tournmentdescription')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Events Number</label>
                <input type="number" class="form-control rounded" name="eventsnumber">
            </div>
            @error('eventsnumber')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <select class="text-dark form-select rounded" name="categoryid">
                    @foreach ($categories_name as $category_name)
                        <option class="text-dark form-control" value={{$category_name->id}}>{{$category_name->name}}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" value="Add Tournment" type="submit">
            <a class="btn btn-success" href="/tournmentdashboard">Back</a>
        </form>
    </div>
</body>
</html>
