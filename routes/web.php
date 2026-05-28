<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Product;
use App\Models\Order;

/* =========================
| HOME
========================= */
Route::get('/', function () {

    if (!Auth::check()) {
        return view('welcome');
    }

    // ADMIN MASUK DASHBOARD
    if (Auth::user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    $products = Product::all();

    return view('products', compact('products'));
});


/* =========================
| ADMIN DASHBOARD
========================= */
Route::get('/admin/dashboard', function () {

    return view('admin.dashboard');

})->name('admin.dashboard');


/* =========================
| AUTH
========================= */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {

    Auth::logout();

    return redirect('/login');

})->name('logout');


/* =========================
| CART
========================= */
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


/* =========================
| CHECKOUT
========================= */
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout');


/* =========================
| CUSTOMER ORDER TRACKING
========================= */
Route::get('/pesanan-saya', function () {

    if (!Auth::check()) {
        return redirect('/login');
    }

    $orders = Order::with(['items.product'])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('orders-user', compact('orders'));

})->name('orders.user');


/* =========================
| ADMIN ORDERS
========================= */
Route::get('/admin/orders', function () {

    $orders = Order::with(['user', 'items.product'])
        ->orderBy('id', 'asc')
        ->get();

    return view('admin.orders', compact('orders'));

})->name('admin.orders');


Route::post('/admin/orders/{id}/update', function ($id) {

    $order = Order::findOrFail($id);

    if ($order->status_order == 'pending') {

        $order->status_order = 'diproses';

    } elseif ($order->status_order == 'diproses') {

        $order->status_order = 'selesai';
    }

    $order->save();

    return back();

})->name('admin.orders.update');


/* =========================
| ADMIN PRODUCTS
========================= */
Route::get('/admin/products', function () {

    $products = Product::all();

    return view('admin.products', compact('products'));

})->name('admin.products');


/* =========================
| CREATE PRODUCT
========================= */
Route::get('/admin/products/create', function () {

    return view('admin.create-product');

})->name('admin.products.create');


/* =========================
| STORE PRODUCT
========================= */
Route::post('/admin/products/store', function (Request $request) {

    $path = null;

    if ($request->hasFile('foto')) {

        $path = $request->file('foto')
            ->store('products', 'public');
    }

    Product::create([

        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'deskripsi' => $request->deskripsi,
        'foto' => $path,

    ]);

    return redirect('/admin/products')
        ->with('success', 'Produk berhasil ditambah');

})->name('admin.products.store');


/* =========================
| EDIT PRODUCT
========================= */
Route::get('/admin/products/{id}/edit', function ($id) {

    $product = Product::findOrFail($id);

    return view('admin.edit-product', compact('product'));

})->name('admin.products.edit');


/* =========================
| UPDATE PRODUCT
========================= */
Route::post('/admin/products/{id}/update', function ($id, Request $request) {

    $product = Product::findOrFail($id);

    $data = [

        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'deskripsi' => $request->deskripsi,

    ];

    if ($request->hasFile('foto')) {

        $data['foto'] = $request->file('foto')
            ->store('products', 'public');
    }

    $product->update($data);

    return redirect('/admin/products')
        ->with('success', 'Produk berhasil diupdate');

})->name('admin.products.update');


/* =========================
| RESTOCK
========================= */
Route::post('/admin/products/{id}/restock', function ($id, Request $request) {

    $product = Product::findOrFail($id);

    $tambah = (int) $request->stok_tambah;

    if ($tambah > 0) {

        $product->stok += $tambah;

        $product->save();
    }

    return redirect('/admin/products')
        ->with('success', 'Stok berhasil ditambah');

})->name('admin.products.restock');


/* =========================
| DELETE PRODUCT
========================= */
Route::post('/admin/products/{id}/delete', function ($id) {

    $product = Product::findOrFail($id);

    $product->delete();

    return redirect('/admin/products')
        ->with('success', 'Produk berhasil dihapus');

})->name('admin.products.delete');
