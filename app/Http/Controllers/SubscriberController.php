<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $storeId = $request->session()->get('storeId');
        $store = Store::where('uuid', $storeId)->get();

        $subscribers = [
            [
                'name' => 'Thalor Ravenshadow',
                'email' => str_replace(' ', '', strtolower('Thalor Ravenshadow')) . '@gmail.com',
            ],
            [
                'name' => 'Kaelith Stormrider',
                'email' => str_replace(' ', '', strtolower('Kaelith Stormrider')) . '@gmail.com',
            ],
            [
                'name' => 'Seraphina Fireheart',
                'email' => str_replace(' ', '', strtolower('Seraphina Fireheart')) . '@gmail.com',
            ],
            [
                'name' => 'Aeliana Swiftwind',
                'email' => str_replace(' ', '', strtolower('Aeliana Swiftwind')) . '@gmail.com',
            ]
        ];

        return view('store.subscriber', [
            'store' => $store[0],
            'subscribers' => $subscribers
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
     * @param  \App\Http\Requests\StoreSubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriberRequest  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
