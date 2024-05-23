@extends('templates.layout');
@extends('templates.navbar');
@section('content')
    <section class="container mt-5">
        <div class="row pt-5">
            <div class="col-6">
                <h4 class="mb-3">Create your own store</h4>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Store Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter store name...">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Store Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter store email...">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Store Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            placeholder="Enter store description..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-black py-3 px-4">
                        <i class="fa-solid fa-circle-plus me-1"></i>
                        Create Store
                    </button>
                </form>
            </div>
            <div class="col-6 text-center">
                <img src="{{ config('app.asset_url') }}img/store-default.png" alt="store-icon" id="storeProfile"
                    class="rounded-circle">
                <button type="button" class="btn btn-outline-primary d-block mx-auto mt-3">
                    Upload Logo
                </button>
            </div>
        </div>
    </section>
@endsection
