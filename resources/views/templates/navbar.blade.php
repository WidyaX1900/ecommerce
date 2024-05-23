@section('navbar')
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
@endsection
