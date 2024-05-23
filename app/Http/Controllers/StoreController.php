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
        //
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

        $file = $request->file('storeLogo');

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            $newFileName = 'ABStore' . rand() . '.' . $extension;
            Storage::putFileAs('storeLogos', $file, $newFileName);

            $insert = Store::create([
                'uuid' => rand(),
                'owner' => 'admin',
                'store_name' => $request->store_name,
                'store_email' => $request->store_email,
                'description' => $request->description,
                'logo' => $newFileName,
                'rating' => 0
            ]);

            if ($insert) {
                $request->session()->flash('message', 'Add Store Successful');
                return redirect('/store/create');
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
        //
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
}
