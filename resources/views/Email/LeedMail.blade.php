<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seminar Leeds</title>
    <style>
        body {
            font-family: arial, sans-serif;
        }

        h2 {
            font-size: 30px;
            color: #dc2626;
        }

        p {
            font-size: 20px;
            color: #444;
        }

        a {
            font-size: 16px;
            display: inline-block;
            padding: 15px 20px;
            border-radius: 5px;
            background-color: rgb(31, 91, 255);
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <img src="https://creativeitinstitute.com/front/images/logo.png" alt="">
    {{-- <h2>{{ config('app.name') }}</h2> --}}
    <p>Hellow There, please check out tomorrow's seminars leed in the attachments. You can also view the full report in
        our website. Click the link below 👇🏻</p>
    <a href="{{ route('dashboard') }}">View In Website</a>
</body>

</html>