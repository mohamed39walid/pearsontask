<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ffffff;
            background-color: #333333;
            color: #ffffff;
            border-radius: 5px;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
        }

        .result {
            color: #ffffff;
            margin-left: 10px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    {{-- {{$id}} --}}
    
    <h1>Questions</h1>
    <form id="questionForm" action="/answerquestions/{{$id}}/{{$sco_id}}/{{$selectvalue}}" method="post">
        @csrf
        @foreach ($questions as $question)
            <div>
                <h2>{{ $question->question }}</h2>
                <input type="hidden" name="question_ids[]" value="{{ $question->id }}">
                <input type="text" name="answers[]" class="answerInput">
                <span class="result"></span>
            </div>
        @endforeach
        <button type="submit">Submit Answers</button>
        @method('PUT')
    </form>

</body>
</html>