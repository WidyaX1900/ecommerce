<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ayo Baca - Book Online Store</title>
    <link rel="stylesheet" href="{{ config('app.asset_url') }}bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite('resources/js/app.js')
</head>

<body>
    @yield('navbar')
    @yield('content')
    <footer>
        Copyright &copy; 2023 by <strong class="ms-1">Rangga Widya</strong>
    </footer>
    <script src="{{ config('app.asset_url') }}js/jquery-3.7.1.js"></script>
</body>

</html>
