@section('navbar')
    <nav class="navbar d-flex py-3 px-4 fixed-top justify-content-between">
        <div class="brand-title d-flex">
            <a href="/" class="fw-bold">
                <img src="{{ config('app.asset_url') }}img/logo.png" alt="brand-logo" width="40px" class="me-2">
                AyoBaca
            </a>
        </div>
        @if (!session('user'))
            <div class="nav-link d-flex justify-content-end align-items-center">
                <a href="/login" class="hover me-4">Log In</a>
                <a href="/register" class="sign-button">Sign Up</a>
            </div>
        @else
            <div class="nav-link d-flex justify-content-end align-items-center">
                <a href="/" class="hover me-5 pt-3">
                    <i class="fa-solid fa-cart-shopping fs-5"></i>
                    <small class="d-block mt-1">Cart</small>
                </a>
                <a href="/store/my-store" class="hover me-5 pt-3 text-center">
                    <i class="fa-solid fa-store fs-5"></i>
                    <small class="d-block mt-1">My Store</small>
                </a>
                <a href="/logout" class="hover me-5 pt-3 text-center">
                    <i class="fa-solid fa-right-from-bracket fs-5"></i>
                    <small class="d-block mt-1">Logout</small>
                </a>
            </div>
        @endif
    </nav>
@endsection
