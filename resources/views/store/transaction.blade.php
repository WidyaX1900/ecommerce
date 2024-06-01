@extends('templates.layout')
@extends('templates.navbar')

<div class="row">
    @extends('templates.sidebar')
    @section('admin')
        <div class="col-12 admin-content">
            <h5>Transactions</h5>
            <table class="table mt-3">
                <tr>
                    <th>No</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
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
                    <tr class="index-transaction">
                        <td>{{ $loop->iteration }}</td>
                        <td>#{{ $transaction['transaction_id'] }}</td>
                        <td>
                            Rp {{ number_format($transaction['payment'] / 1000, 3, '.', '') }}
                        </td>
                        <td class="{{ $color }} fw-bold">
                            {{ $transaction['status'] }}
                        </td>
                        <td>
                            <a href="/transaction/detail" class="btn btn-sm btn-primary me-2">
                                See Detail
                            </a>
                            <button type="button" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
</div>
