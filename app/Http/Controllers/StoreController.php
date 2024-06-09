<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
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
                'payment' => '75.000'
            ],
            [
                'transaction_id' => rand(),
                'cover' => 'bodo-amat.jpeg',
                'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat',
                'status' => 'PENDING',
                'payment' => '55.000'
            ],
            [
                'transaction_id' => rand(),
                'cover' => 'rich-dad.jpg',
                'title' => 'Rich Dad Poor Dad',
                'status' => 'FAILED',
                'payment' => '65.000'
            ],
            [
                'transaction_id' => rand(),
                'cover' => 'business.jpg',
                'title' => 'Win Win At Business',
                'status' => 'CANCEL',
                'payment' => '75.000'
            ],
            [
                'transaction_id' => rand(),
                'cover' => 'filosofi-teras.jpg',
                'title' => 'Filosofi Teras',
                'status' => 'EXPIRED',
                'payment' => '75.000'
            ],
        ];
        return view('store.index', [
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

        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $request->validate([
            'store_name' => 'required|unique:stores,store_name',
            'store_email' => 'required|email:rfc,dns|unique:stores,store_email',
            'description' => 'required',
            'storeLogo' => 'required|file|max:2048'
        ]);

        $user = $request->session()->get('user');
        $file = $request->file('storeLogo');

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            $newFileName = 'ABStore' . rand() . '.' . $extension;
            Storage::putFileAs('storeLogos', $file, $newFileName);

            $insert = Store::create([
                'uuid' => rand(),
                'owner_id' => $user['userId'],
                'store_name' => $request->store_name,
                'store_email' => $request->store_email,
                'description' => $request->description,
                'logo' => $newFileName,
                'rating' => 0
            ]);

            if ($insert) {
                $request->session()->flash('message', 'Store successfully created');
                return redirect('/store/my-store');
            } else {
                echo "Data save failed!";
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }

    public function my_store(Request $request)
    {
        $user = $request->session()->get('user');
        $stores = Store::where('owner_id', $user['userId'])
            ->orderBy('id', 'desc')
            ->get();

        return view('store.list', [
            'stores' => $stores
        ]);
    }
}
