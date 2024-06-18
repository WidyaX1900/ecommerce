@extends('templates.layout')
@extends('templates.navbar')

<div class="row">
    @extends('templates.sidebar')
    @section('admin')
        <div class="col-12 admin-content overflow-x-hidden">
            <h4 class="fw-bold fst-italic mb-3">Transaction #{{ rand() }}</h4>
            <p>Buyer: <strong>Seraphina Fireheart</strong></p>
            <p class="mb-4">Status: <strong class="text-success">SUCCESS</strong></p>
            <strong>Order List:</strong>
            <div class="row my-3">
                <div class="col-4 fw-bold">Purchased Item</div>
                <div class="col-4 fw-bold">Qty</div>
                <div class="col-4 fw-bold">Cost</div>
            </div>
            @foreach ($orders as $order)
                <div class="row mb-4">
                    <div class="col-4 order-list">
                        <img src="{{ asset('img/book-covers/' . $order['cover']) }}" alt="product-cover" class="img-fluid">
                        <span class="ms-3">The $100 Startup</span>
                    </div>
                    <div class="col-4 py-4">
                        x{{ $order['qty'] }}
                    </div>
                    <div class="col-4 py-4">
                        Rp {{ number_format($order['amount'] / 1000, 3, '.', '') }}
                    </div>
                </div>
            @endforeach
            <div class="col-9 ms-3 text-end">
                <strong>
                    <span class="me-5">TOTAL:</span>
                    <span>Rp {{ $totalCost }}</span>
                </strong>
            </div>
        </div>
    @endsection
</div>
