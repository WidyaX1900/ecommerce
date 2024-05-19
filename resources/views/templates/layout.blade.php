<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ config('app.asset_url') }}bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/utility.css'])
</head>

<body>
    <nav class="navbar d-flex py-3 px-4 fixed-top justify-content-between">
        <div class="brand-title d-flex">
            <a href="/" class="fw-bold">
                <img src="{{ config('app.asset_url') }}img/logo.png" alt="brand-logo" width="40px" class="me-2">
                AyoBaca
            </a>
        </div>
        <div class="nav-link d-flex justify-content-end align-items-center">
            <a href="/" class="hover me-4">Log In</a>
            <a href="/" class="sign-button">Sign Up</a>
        </div>
    </nav>
    @yield('content')
    <footer>
        Copyright &copy; 2023 by <strong class="ms-1">Rangga Widya</strong>
    </footer>
    <script src="{{ config('app.asset_url') }}js/jquery-3.7.1.js"></script>
    @vite('resources/js/app.js')
</body>

</html>
