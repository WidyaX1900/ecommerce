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
    public function index($id = '', Request $request)
    {
        if ($id == '') {
            return redirect('/store/my-store');
        }

        $store = Store::where('uuid', $id)->get();

        $request->session()->put('storeId', $store[0]->uuid);
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
            'store' => $store[0],
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
    public function edit(Store $store, $id = '')
    {
        if ($id == '') {
            return redirect('/store/my-store');
        }

        $store = $store->where('uuid', $id)->get()[0];
        return view('store.edit', [
            'store' => $store
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid = '')
    {
        $request->validate([
            'store_name' => 'required',
            'store_email' => 'required|email:rfc,dns',
            'description' => 'required'
        ]);
        $oldData = Store::where('uuid', $uuid)->get()[0];
        $file = $request->file('storeLogo');

        // Check if input value is as same as the data from the database
        if (
            $request->store_name == $oldData->store_name &&
            $request->store_email == $oldData->store_email &&
            $request->description == $oldData->description &&
            $file == null
        ) {
            $request->session()->flash('message', '
                <div id="flashAlert" class="col-6 text-center alert alert-info mx-auto flash-alert" role="alert">
                    <i class="fa-solid fa-circle-exclamation me-1"></i>
                    No data has been changed!
                </div>
            ');
            return back();
        } else {
            $similiar = $this->_check_similiratity($uuid, $request->store_name, $request->store_email);

            switch ($similiar) {
                case 'name':
                    return back()->withErrors(
                        ['store_name' => 'The store name already exist!']
                    );
                    break;

                case 'email':
                    return back()->withErrors(
                        ['store_email' => 'The store email already exist!']
                    );
                    break;

                case 'both':
                    return back()->withErrors(
                        [
                            'store_name' => 'The store name already exist!',
                            'store_email' => 'The store email already exist!'
                        ]
                    );
                    break;

                default:
                    if ($file != null) {
                        $extension = $file->getClientOriginalExtension();
                        $fileName = 'ABStore' . rand() . '.' . $extension;
                        Storage::putFileAs('storeLogos', $file, $fileName);
                    } else {
                        $fileName = $oldData->logo;
                    }

                    $update = Store::where('uuid', $uuid)
                        ->update([
                            'store_name' => $request->store_name,
                            'store_email' => $request->store_email,
                            'description' => $request->description,
                            'logo' => $fileName
                        ]);

                    if ($update) {
                        $request->session()->flash('message', '
                            <div id="flashAlert" class="col-6 text-center alert alert-success mx-auto flash-alert" role="alert">
                                <i class="fa-solid fa-circle-check me-1"></i>
                                Store update successfull
                            </div>
                        ');
                        return back();
                    }
            }
        }
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

    private function _check_similiratity($uuid, $store_name, $store_email)
    {
        $errors = '';
        $allStores = Store::where('uuid', '!=', $uuid)->get();
        foreach ($allStores as $allstore) {
            if (
                $store_name == $allstore->store_name &&
                $store_email != $allstore->store_email
            ) {
                $errors = 'name';
            } else if (
                $store_email == $allstore->store_email &&
                $store_name != $allstore->store_name
            ) {
                $errors = 'email';
            } else if (
                $store_email == $allstore->store_email &&
                $store_name == $allstore->store_name
            ) {
                $errors = 'both';
            }
        }

        return $errors;
    }
}
