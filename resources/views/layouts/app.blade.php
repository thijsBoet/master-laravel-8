<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App - @yield('title')</title>
    <style>
        body {
            font-family: Verdana, Arial, Helvetica, sans-serif
        }

        .error {
            display: inline-block;
            background-color: crimson;
            color: white;
            padding: 0.3rem;
            margin-top: 0.3rem;
        }

        .success {
            display: inline;
            background-color: darkgreen;
            color: white;
            padding: 0.3rem;
            margin-top: 0.3rem;
        }

    </style>
</head>

<body>
    <div>
        @if (session('status'))
            <div class="success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>

</html>
