<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $cart = session('cart');

        if (!$cart || count($cart) == 0) {
            return back()->with('error', 'Keranjang kosong');
        }

        // 🔥 TOTAL (PAKAI price + quantity)
        $total = 0;

        foreach ($cart as $item) {
            $price = $item['price'];
            $quantity = $item['quantity'];

            $total += $price * $quantity;
        }

        $order = Order::create([
    'user_id' => Auth::id(),
    'total_harga' => $total,
    'alamat_pengiriman' => $request->alamat,
    'nomor_telepon' => $request->telepon,
    'metode_pembayaran' => $request->pembayaran,
    'status_order' => 'pending',
]);

        // simpan item + kurangi stok
        foreach ($cart as $product_id => $item) {

            $product = Product::find($product_id);
            if (!$product) continue;

            $quantity = $item['quantity'];
            $price = $item['price'];

            if ($product->stok < $quantity) {
                return back()->with('error', 'Stok ' . $product->nama_produk . ' tidak cukup');
            }

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'jumlah' => $quantity,
                'harga_saat_beli' => $price,
            ]);

            $product->stok -= $quantity;
            $product->save();
        }

        session()->forget('cart');

        return redirect('/')->with('success', 'Checkout berhasil');
    }
}