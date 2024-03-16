<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }

        .card {
            background-color: #1e1e1e;
            border: 1px solid #383838;
            color: #ffffff;
        }

        .card-title {
            color: #ffffff;
        }

        .card-text {
            color: #bfbfbf;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-check-label {
            color: #ffffff;
        }

        .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        .form-check-input:checked + .form-check-label {
            color: #ffffff;
        }

        #submitBtn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')
    <div class="container-fluid mt-4">
        <form method="POST" action="/tournmentquestions/{{$id}}/{{$selectvalue}}">
            @csrf
            <div class="row row-cols-1 row-cols-md-3">
                @php $cardCounter = 0; @endphp
                @foreach ($events as $event)
                @if($id == $event->tournment_id && $selectvalue == $event->is_individual)
                @php
                $checkboxId = "checkbox_" . $event->id;
                $cardCounter++;
                @endphp
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$event->event_name}}</h5>
                            <p class="card-text">{{$event->description}}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="{{$checkboxId}}" name="event_ids[]" value="{{$event->id}}">
                                <label class="form-check-label" for="{{$checkboxId}}">Sign the event</label>
                            </div>
                        </div>
                    </div>
                </div>
                @if($cardCounter % 3 == 0)
                </div>
                <div class="row row-cols-1 row-cols-md-3">
                @endif
                @endif
                @endforeach
            </div>
            <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            // Get all checkboxes
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var checkedCount = 0;

            // Count the number of checked checkboxes
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkedCount++;
                }
            });

            // If at least 5 checkboxes are not checked, prevent form submission and show an alert
            if (checkedCount < 5) {
                event.preventDefault();
                alert('Please select at least 5 events.');
            }
        });

    </script>
</body>
</html>
