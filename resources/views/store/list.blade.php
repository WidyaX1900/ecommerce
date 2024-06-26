@extends('templates.layout')
@extends('templates.navbar')
@section('content')
    <div class="container my-store-content">
        @if (session('message'))
            <div id="flashAlert" class="col-6 text-center alert alert-success mx-auto flash-alert" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h2>My Stores</h2>
            <a href="/store/create" class="btn btn-black text-center px-5 py-3">
                <i class="fa-solid fa-circle-plus me-1"></i>
                New Store
            </a>
        </div>
        <div class="row mt-5">
            @foreach ($stores as $store)
                <div class="col-4">
                    <div class="card p-2" style="width: 18rem;">
                        <img src="{{ config('app.public_url') }}storeLogos/{{ $store->logo }}" alt="book-cover"
                            class="store-logo mx-auto my-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $store->store_name }}
                            </h5>
                            <p class="mb-4">
                                {{ $store->description }}
                            </p>
                            <a href="/store/detail/{{ $store->uuid }}" class="btn btn-primary d-block col-6">
                                <i class="fa-solid fa-eye me-1"></i>
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
