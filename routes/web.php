<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $newProducts = [
        [
            'title' => 'Rich Dad Poor Dad',
            'cover' => 'rich-dad.jpg',
            'author' => 'Robert T. Kyosaki',
            'description' => 'Book will teach you about how to manage your financial'
        ],
        [
            'title' => 'Young Samurai',
            'cover' => 'samurai.jpg',
            'author' => 'Chris Bradford',
            'description' => 'Explore the story of a young samurai'
        ],
        [
            'title' => 'Secret of Stoicism',
            'cover' => 'stoicism.jpg',
            'author' => 'Pamela Hughes',
            'description' => 'Book will teach you about Stoicism'
        ],
    ];

    $popularItems = [
        [
            'title' => 'Filosofi Teras',
            'cover' => 'filosofi-teras.jpg',
            'author' => 'Henry Manampiring',
            'description' => 'Learn to control yourself and enjoy your life'
        ],
        [
            'title' => 'The $100 Startup',
            'cover' => '100-startup.webp',
            'author' => 'Chris Guillebeau',
            'description' => 'Be the startup founder and realize your dream'
        ],
        [
            'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat',
            'cover' => 'bodo-amat.jpeg',
            'author' => 'Mark Manson',
            'description' => 'Book will teach you how to ignore negative thoughts from the others'
        ],
    ];

    $bestSellers = [
        [
            'title' => 'The Book of Five Rings',
            'cover' => 'five-rings.jpg',
            'author' => 'Miyamoto Musashi',
            'description' => 'Learn the mindset of a samurai from the legend Miyamoto Musashi'
        ],
        [
            'title' => 'Vagabond',
            'cover' => 'vagabond.jpg',
            'author' => 'Takehiko Inoue',
            'description' => 'Read the battle between two legendary swordmans Miyamoto Musashi and Sasaki Kojiro'
        ],
        [
            'title' => 'Win Win at Business',
            'cover' => 'business.jpg',
            'author' => 'Angela McKillop',
            'description' => 'Learn how to build a success and collaborate business'
        ],
    ];
    return view('home.index', [
        'newProducts' => $newProducts,
        'popularItems' => $popularItems,
        'bestSellers' => $bestSellers,
    ]);
});

// Store routes
Route::get('/store', [StoreController::class, 'index']);
Route::get('/store/create', [StoreController::class, 'create']);
Route::post('/store/add', [StoreController::class, 'add']);

// Product routes
Route::get('/product', [ProductController::class, 'index']);

// Transaction routes
Route::get('/transaction', [TransactionController::class, 'index']);

// Subscriber routes
Route::get('/subscriber', [SubscriberController::class, 'index']);
