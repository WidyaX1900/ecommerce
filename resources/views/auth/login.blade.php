<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AyoBaca - Book Online Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet">
    @vite(['resources/bootstrap/css/bootstrap.min.css', 'resources/css/utility.css'])

    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        body {
            overflow: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            width: 40%;
            height: 400px;
            padding: 8px;
        }

        .form-box img {
            width: 70px;
            height: calc(70px - 20px);
        }

        .form-box h5 {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="form-box border rounded">
        <div class="text-center mb-4">
            <img src="{{ asset('img/logo-black.png') }}" alt="brand-logo">
            <h5 class="text-center mt-4">
                Log in to your account
            </h5>
        </div>
        <form action="" method="post" class="px-4 mb-5">
            @csrf
            <div class="mb-4">
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <button class="d-block btn btn-black w-100 py-2">Login</button>
        </form>
        <div class="text-center">
            Not have an account?
            <a href="/register" class="text-dark fw-bold">Create Account</a>
        </div>
    </div>
</body>

</html>
