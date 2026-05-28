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

        // Ambil user login
        $user = Auth::user();

        // Kalau alamat/no hp user masih kosong → wajib isi
        if (empty($user->alamat) || empty($user->nomor_telepon)) {

            $request->validate([
                'alamat_pengiriman' => 'required',
                'nomor_telepon' => 'required',
                'metode_pembayaran' => 'required',
            ]);

            // Simpan ke database users
            $user->update([
                'alamat' => $request->alamat_pengiriman,
                'nomor_telepon' => $request->nomor_telepon,
            ]);
        } else {

            $request->validate([
                'metode_pembayaran' => 'required',
            ]);
        }

        // Hitung total
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Simpan order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_harga' => $total,

            // otomatis ambil dari users
            'alamat_pengiriman' => $user->alamat,
            'nomor_telepon' => $user->nomor_telepon,

            'metode_pembayaran' => $request->metode_pembayaran,
            'status_order' => 'pending',
        ]);

        // Simpan item order + kurangi stok
        foreach ($cart as $product_id => $item) {

            $product = Product::find($product_id);

            if (!$product) {
                continue;
            }

            $qty = $item['quantity'];

            // Simpan detail pesanan
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'jumlah' => $qty,
                'harga_saat_beli' => $item['price'],
            ]);

            // Kurangi stok
            $product->stok -= $qty;
            $product->save();
        }

        // Hapus cart
        session()->forget('cart');

        return redirect('/')->with('success', '✅ Pesanan berhasil dibuat!');
    }
}
