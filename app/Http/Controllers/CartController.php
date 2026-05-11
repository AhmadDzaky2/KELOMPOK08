<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $ongkir = 20000;
        $harga_akhir = $total + $ongkir;

        return view('cart', compact('cart', 'total', 'ongkir', 'harga_akhir'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->nama_produk,
                "price" => $product->harga,
                "quantity" => 1,
                "photo" => $product->foto
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produk berhasil ditambah!');
    }
}