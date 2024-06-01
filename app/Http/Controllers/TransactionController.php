<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = [
            [
                'transaction_id' => rand(),
                'cover' => '100-startup.webp',
                'title' => 'The $100 Startup',
                'status' => 'SUCCESS',
                'payment' => 75000
            ],
            [
                'transaction_id' => rand(),
                'cover' => 'bodo-amat.jpeg',
                'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat',
                'status' => 'PENDING',
                'payment' => 55000
            ],
            [
                'transaction_id' => rand(),
                'cover' => 'rich-dad.jpg',
                'title' => 'Rich Dad Poor Dad',
                'status' => 'FAILED',
                'payment' => 65000
            ],
            [
                'transaction_id' => rand(),
                'cover' => 'business.jpg',
                'title' => 'Win Win At Business',
                'status' => 'CANCEL',
                'payment' => 75000
            ],
            [
                'transaction_id' => rand(),
                'cover' => 'filosofi-teras.jpg',
                'title' => 'Filosofi Teras',
                'status' => 'EXPIRED',
                'payment' => 75000
            ],
        ];
        return view('store.transaction', [
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
