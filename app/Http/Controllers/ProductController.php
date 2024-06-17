<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
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

        $products = [
            [
                'product_id' => rand(),
                'cover' => '100-startup.webp',
                'title' => 'The $100 Startup'
            ],
            [
                'product_id' => rand(),
                'cover' => 'bodo-amat.jpeg',
                'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat'
            ],
            [
                'product_id' => rand(),
                'cover' => 'rich-dad.jpg',
                'title' => 'Rich Dad Poor Dad'
            ],
            [
                'product_id' => rand(),
                'cover' => 'business.jpg',
                'title' => 'Win Win At Business'
            ]
        ];
        return view('store.products', [
            'store' => $store[0],
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $storeId = $request->session()->get('storeId');
        $store = Store::where('uuid', $storeId)->get()[0];

        return view('product.create', [
            'store' => $store
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $reviews = [
            [
                'buyer_name' => 'Thalor Ravenshadow',
                'date' => time(),
                'rate' => 5,
                'comment' => 'A compelling story that kept me hooked from beginning to end.'
            ],
            [
                'buyer_name' => 'Kaelith Stormrider',
                'date' => time(),
                'rate' => 5,
                'comment' => 'Beautifully written with rich, engaging characters.'
            ],
            [
                'buyer_name' => 'Seraphina Fireheart',
                'date' => time(),
                'rate' => 5,
                'comment' => 'I couldn\'t put this book down - an absolute page-turner.'
            ],
            [
                'buyer_name' => 'Aeliana Swiftwind',
                'date' => time(),
                'rate' => 5,
                'comment' => 'This product exceeded my expectations in every way. Incredible quality and value for the price. I\'ve never been more satisfied with a purchase. Highly recommend this product to anyone! Five stars - will definitely buy again.'
            ],
        ];
        return view('store.product-detail', [
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
