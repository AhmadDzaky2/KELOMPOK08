<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

/*
|----------------------------------------
| HOME ROUTE
|----------------------------------------
*/
Route::get('/', function () {

    if (!Auth::check()) {
        return view('welcome');
    }

    if (Auth::user()->role === 'admin') {
        return redirect('/admin/orders');
    }

    $products = Product::all();
    return view('dashboard', compact('products'));
});