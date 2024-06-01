@extends('templates.layout')
@extends('templates.navbar')

<div class="row">
    @extends('templates.sidebar')
    @section('admin')
        <div class="col-12 admin-content overflow-x-hidden">
            <div class="row mt-4">
                <div class="col-5 pe-3">
                    <img src="{{ asset('img/book-covers/business.jpg') }}" alt="product-cover" class="img-fluid rounded">
                </div>
                <div class="col-7">
                    <h3 class="fw-bold">Win Win At Business</h3>
                    <h4>Rp 55.000</h4>
                    <div class="mt-4">
                        <span class="me-3 product-info">
                            <i class="fa-solid fa-star text-warning"></i>
                            <span role="rating">5</span>
                        </span>
                        <span class="me-3 product-info">
                            <i class="fa-solid fa-cart-shopping text-blue-dark"></i>
                            <span role="sales">999 sales</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="product-reviews mt-5">
                <h5 class="mb-3">Reviews (99)</h5>
                @foreach ($reviews as $review)
                    <div class="review col-11 mb-5">
                        <div class="d-flex py-2">
                            <img src="{{ asset('img/user.png') }}" alt="buyer-profile">
                            <div class="mx-3">
                                <h6 class="mb-0">{{ $review['buyer_name'] }}</h6>
                                <small class="text-secondary">
                                    {{ date('d M Y', $review['date']) }}
                                </small>
                            </div>
                            <div class="rating-star">
                                @for ($i = 0; $i < $review['rate']; $i++)
                                    <i class="fa-solid fa-star text-warning"></i>
                                @endfor
                            </div>
                        </div>
                        <p>
                            {{ $review['comment'] }}
                        </p>
                        <div class="mt-4">
                            <i class="fa-solid fa-thumbs-up text-secondary fs-5 cursor-pointer"></i>
                            <small>Like</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
</div>
