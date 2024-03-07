<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Update Category</title>
</head>

<body class="bg-dark text-white">
    <div class="container">
        <h1 class="text-center m-3">Update Category</h1>
        <form class="bg-dark text-white w-50 m-auto" action="/updatecategory/{{$id}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" name="categoryname" value={{$category->name}}>
            </div>
            @error('categoryname')
            <span class="text-danger">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Category Description</label>
                <input type="text" class="form-control" name="categorydescription" value={{$category->description}}>
            </div>
            @error('categorydescription')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <input class="btn btn-primary" value="Update Category" type="submit">
            <a class="btn btn-success" href="/categorydashboard">Back</a>
            @method('PUT')
        </form>

    </div>
</body>
</html>