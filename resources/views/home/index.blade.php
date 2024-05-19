@extends('templates.layout')
@section('title', 'AyoBaca - Book Online Store')
@section('content')
    <header id="header">
        <div class="overlay h-100">
            <h1 class="text-center">Welcome to AyoBaca</h1>
            <p>Feel the world in your hands</p>
            <a href="/">
                Explore Our Books
                <i class="fa-regular fa-circle-right ms-2"></i>
            </a>
        </div>
    </header>
    <section class="container mt-3">
        <section role="new product" class="section-spacing">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-bold me-3">New Products</h3>
                <a href="/" class="text-decoration-none">See All</a>
            </div>
            <div class="row mt-3">
                @foreach ($newProducts as $newProduct)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ config('app.asset_url') }}img/book-covers/{{ $newProduct['cover'] }}"
                                class="product-cover" alt="book-cover">
                            <div class="card-body">
                                <h5 class="card-title mb-0">
                                    {{ $newProduct['title'] }}
                                </h5>
                                <p class="card-text fw-bold">
                                    Author: {{ $newProduct['author'] }}
                                </p>
                                <p class="card-text">
                                    {{ $newProduct['description'] }}
                                </p>
                                <a href="/" class="btn btn-black px-4 py-2">
                                    See Product
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section role="popular items" class="section-spacing">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-bold me-3">Popular Items</h3>
                <a href="/" class="text-decoration-none">See All</a>
            </div>
            <div class="row mt-3">
                @foreach ($popularItems as $popularItem)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ config('app.asset_url') }}img/book-covers/{{ $popularItem['cover'] }}"
                                class="product-cover" alt="book-cover">
                            <div class="card-body">
                                <h5 class="card-title mb-0">
                                    {{ $popularItem['title'] }}
                                </h5>
                                <p class="card-text fw-bold">
                                    Author: {{ $popularItem['author'] }}
                                </p>
                                <p class="card-text">
                                    {{ $popularItem['description'] }}
                                </p>
                                <a href="/" class="btn btn-black px-4 py-2">
                                    See Product
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section role="best sellers" class="section-spacing">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-bold me-3">Best Sellers</h3>
                <a href="/" class="text-decoration-none">See All</a>
            </div>
            <div class="row mt-3">
                @foreach ($bestSellers as $bestSellers)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ config('app.asset_url') }}img/book-covers/{{ $bestSellers['cover'] }}"
                                class="product-cover" alt="book-cover">
                            <div class="card-body">
                                <h5 class="card-title mb-0">
                                    {{ $bestSellers['title'] }}
                                </h5>
                                <p class="card-text fw-bold">
                                    Author: {{ $bestSellers['author'] }}
                                </p>
                                <p class="card-text">
                                    {{ $bestSellers['description'] }}
                                </p>
                                <a href="/" class="btn btn-black px-4 py-2">
                                    See Product
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </section>
@endsection
