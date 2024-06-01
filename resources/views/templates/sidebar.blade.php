@section('sidebar')
    <div class="col-3 sidebar">
        <div class="text-center mb-4">
            <img src="{{ config('app.public_url') . 'storeLogos/ABStore140759906.jpg' }}" alt="store-logo"
                class="rounded-circle">
            <h5 class="my-3">Your Store Name</h5>
            <a href="#" class="btn btn-outline-white btn-sm py-2 px-4">
                <i class="fa-solid fa-pen me-1"></i>
                Edit Store
            </a>
        </div>
        <ul>
            <li class="mb-3">
                <a href="/store">Dashboard</a>
            </li>
            <li class="mb-3">
                <a href="/product">Products</a>
            </li>
            <li class="mb-3">
                <a href="/transaction">Transactions</a>
            </li>
            <li class="mb-3">
                <a href="#">Subscribers</a>
            </li>
        </ul>
    </div>
@endsection
