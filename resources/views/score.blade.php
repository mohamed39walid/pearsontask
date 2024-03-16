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
            font-family: 'figtree', sans-serif;
            padding: 20px;
        }

        h1 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
        }

        .score-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #333333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .score {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .btn-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="score-container">
        <h1>Your Score</h1>
        <div class="score">{{$score}}</div>
        <a href="/home" class="btn-link">Continue</a>
    </div>
</body>
</html>
