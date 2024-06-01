@extends('templates.layout')
@extends('templates.navbar')

<div class="row">
    @extends('templates.sidebar')
    @section('admin')
        <div class="col-9 admin-content">
            <div class="row">
                <div class="col-6 px-3">
                    <div class="bg-white py-2 px-3 border rounded">
                        <h6 class="fw-normal">Earning</h6>
                        <strong class="fs-2">Rp 50.000.000</strong>
                    </div>
                </div>
                <div class="col-6 px-3">
                    <div class="bg-white py-2 px-3 border rounded">
                        <h6 class="fw-normal">Items</h6>
                        <strong class="fs-2">99</strong> books
                    </div>
                </div>
            </div>
            <div class="d-flex mt-5">
                <div class="col-11 pe-3">
                    <div class="d-flex justify-content-between">
                        <h5>Transactions</h5>
                        <a href="/transaction">All Transactions</a>
                    </div>
                    @foreach ($transactions as $transaction)
                        @php
                            $color = '';
                            if ($transaction['status'] == 'SUCCESS') {
                                $color = 'text-success';
                            } elseif ($transaction['status'] == 'PENDING') {
                                $color = 'text-warning';
                            } elseif ($transaction['status'] == 'FAILED') {
                                $color = 'text-danger';
                            } elseif ($transaction['status'] == 'CANCEL') {
                                $color = 'text-secondary';
                            }
                        @endphp
                        <div class="row bg-white border rounded index-transaction p-2 mb-4 ms-1">
                            <div class="col-7 d-flex">
                                <div role="description" class="ms-2 mt-1">
                                    <strong>
                                        Order #{{ $transaction['transaction_id'] }}
                                    </strong>
                                    <small class="text-secondary d-block">
                                        {{ date('d M Y', time()) }}
                                    </small>
                                </div>
                            </div>
                            <div class="col-5 d-flex flex-column align-items-end">
                                <div class="mb-4">
                                    <small class="text-secondary">Payment: </small>
                                    <strong class="d-block mt-0">
                                        Rp {{ $transaction['payment'] }}
                                    </strong>
                                    <strong class="d-block mt-2 {{ $color }}">
                                        {{ $transaction['status'] }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-6 ps-5">
                    <h5>Subscribers</h5>
                    <div class="border rounded">
                        <div class="d-flex index-subscriber p-3 mb-2">
                            <img src="{{ asset('img/user.png') }}" alt="subscriber-profile" class="me-2">
                            <span role="user-profilename">
                                James Smith
                            </span>
                        </div>
                        <div class="d-flex index-subscriber p-3 mb-2">
                            <img src="{{ asset('img/user.png') }}" alt="subscriber-profile" class="me-2">
                            <span role="user-profilename">
                                Emily Johnson
                            </span>
                        </div>
                        <div class="d-flex index-subscriber p-3 mb-2">
                            <img src="{{ asset('img/user.png') }}" alt="subscriber-profile" class="me-2">
                            <span role="user-profilename">
                                Michael Brown
                            </span>
                        </div>
                        <div class="d-flex index-subscriber p-3 mb-2">
                            <img src="{{ asset('img/user.png') }}" alt="subscriber-profile" class="me-2">
                            <span role="user-profilename">
                                Sarah Davis
                            </span>
                        </div>
                        <div class="text-center mb-3">
                            <a href="/subscriber">See All Subscribers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
