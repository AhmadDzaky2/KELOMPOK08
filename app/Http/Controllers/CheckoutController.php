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
        // Harus login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Ambil cart dari session
        $cart = session('cart', []);

        // Jika cart kosong
        if (empty($cart)) {
            return back()->with('error', 'Keranjang kosong');
        }

        // Validasi sesuai name di cart.blade.php
        $request->validate([
            'alamat_pengiriman' => 'required',
            'nomor_telepon' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Simpan order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_harga' => $total,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'nomor_telepon' => $request->nomor_telepon,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_order' => 'pending',
        ]);

        // Kurangi stok produk
        foreach ($cart as $product_id => $item) {

            $product = Product::find($product_id);

            if (!$product) {
                continue;
            }

            $qty = $item['quantity'];

            // Simpan detail pesanan (jika tabel order_items sudah benar)
            // Jika masih error, bagian ini bisa dihapus sementara
            if (class_exists(OrderItem::class)) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product_id,
                    'jumlah' => $qty,
                    'harga_saat_beli' => $item['price'],
                ]);
            }

            // Kurangi stok
            $product->stok -= $qty;
            $product->save();
        }

        // Kosongkan cart
        session()->forget('cart');

        // Redirect ke home + pesan sukses
        return redirect('/')->with('success', '✅ Pesanan berhasil dibuat!');
    }
}