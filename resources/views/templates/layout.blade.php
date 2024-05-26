<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AyoBaca - Book Online Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/js/app.js', 'resources/jquery/jquery-3.7.1.js'])
</head>

<body>
    @yield('navbar')
    @yield('sidebar')
    @yield('admin')
    @yield('content')
    @yield('footer')
    @vite('resources/js/script.js')
</body>

</html>
