<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Category Dashboard</title>
</head>
<style>
    /* Custom CSS */
    .custom-table {
      background-color: #f0f0f0; /* Light gray background color */
    }
  </style>
<body class="bg-dark text-white">
    <h1 class="text-center m-5">Category Dashboard</h1>
    <div class="container">
        <table class="table custom-table">
            <thead class="table-dark">
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="table-dark">
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a class="btn btn-primary" href="/categoryupdate/{{$category->id}}">Update</a>
                        <a href="/confirmdelete/{{$category->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="/addcategoryform">Add Category</a>
    </div>
</body>
</html>
