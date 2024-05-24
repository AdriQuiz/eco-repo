<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecocommunity</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.css') }}">
</head>
<body style="background-color: #2d2d2d">
    @include('componentes.header');
    @yield('content')
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>
</body>
</html>
