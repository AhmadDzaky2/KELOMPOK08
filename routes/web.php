<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {

    if (Auth::check()) {

        // ADMIN → langsung ke orders
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/orders');
        }

        // CUSTOMER → lihat produk
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| CUSTOMER AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

    Route::post('/checkout', [CheckoutController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // ADMIN CHECK
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role !== 'admin') abort(403);
        return redirect('/admin/orders');
    });

    /*
    |--------------------------------------------------------------------------
    | ORDERS
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/orders', function () {

        if (Auth::user()->role !== 'admin') abort(403);

        $orders = \App\Models\Order::with('user')->latest()->get();

        return view('admin.orders', compact('orders'));
    });

    Route::post('/admin/orders/{id}/update', function ($id) {

        if (Auth::user()->role !== 'admin') abort(403);

        $order = \App\Models\Order::findOrFail($id);

        if ($order->status_order == 'pending') {
            $order->status_order = 'diproses';
        } elseif ($order->status_order == 'diproses') {
            $order->status_order = 'selesai';
        }

        $order->save();

        return back();
    });

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */

    // LIST PRODUCT
    Route::get('/admin/products', function () {

        if (Auth::user()->role !== 'admin') abort(403);

        $products = Product::all();

        return view('admin.products', compact('products'));
    });

    // TAMBAH PRODUCT (FORM)
    Route::get('/admin/products/create', function () {
        if (Auth::user()->role !== 'admin') abort(403);
        return view('admin.create-product');
    });

    // SIMPAN PRODUCT
    Route::post('/admin/products/store', function (Request $request) {

        if (Auth::user()->role !== 'admin') abort(403);

        Product::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $request->foto ?? null,
        ]);

        return redirect('/admin/products');
    });

    // EDIT PRODUCT (FORM)
    Route::get('/admin/products/{id}/edit', function ($id) {

        if (Auth::user()->role !== 'admin') abort(403);

        $product = Product::findOrFail($id);

        return view('admin.edit-product', compact('product'));
    });

    // UPDATE PRODUCT
    Route::post('/admin/products/{id}/update', function ($id, Request $request) {

        if (Auth::user()->role !== 'admin') abort(403);

        $product = Product::findOrFail($id);

        $product->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect('/admin/products');
    });

    /*
    |--------------------------------------------------------------------------
    | RESTOCK
    |--------------------------------------------------------------------------
    */
    Route::post('/admin/products/{id}/restock', function ($id, Request $request) {

        if (Auth::user()->role !== 'admin') abort(403);

        $product = Product::findOrFail($id);

        $product->stok += (int) $request->stok_tambah;
        $product->save();

        return back()->with('success', 'Stok berhasil ditambah');
    });

});