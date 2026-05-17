@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container py-4">

<div class="card shadow border-0 rounded-4">

    <div class="card-header text-white"
         style="background: linear-gradient(135deg, #2563eb, #1d4ed8);">
        <h3 class="mb-0 fw-bold">🛒 Keranjang Belanja</h3>
    </div>

    <div class="card-body">

        @if(count($cart) > 0)

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php $total = 0; @endphp

                    @foreach($cart as $id => $item)
                        @php
                            $price = $item['price'] ?? 0;
                            $qty = $item['quantity'] ?? 1;
                            $subtotal = $price * $qty;
                            $total += $subtotal;
                        @endphp

                        <tr>
                            <td class="fw-semibold">
                                {{ $item['name'] }}
                            </td>

                            <td>
                                Rp {{ number_format($price, 0, ',', '.') }}
                            </td>

                            <td>
                                <form method="POST" action="{{ route('cart.update', $id) }}">
                                    @csrf
                                    <input type="number"
                                           name="quantity"
                                           value="{{ $qty }}"
                                           min="1"
                                           class="form-control form-control-sm text-center"
                                           style="width:70px;"
                                           onchange="this.form.submit()">
                                </form>
                            </td>

                            <td class="fw-bold text-primary">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </td>

                            <td>
                                <form method="POST" action="{{ route('cart.remove', $id) }}">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end mt-4">
                <h4 class="fw-bold text-primary">
                    Total: Rp {{ number_format($total, 0, ',', '.') }}
                </h4>

                {{-- CHECKOUT FORM --}}
                <form method="POST" action="{{ route('checkout') }}" class="mt-3">
                    @csrf

                    <input type="text"
                           name="alamat_pengiriman"
                           class="form-control mb-2"
                           placeholder="Alamat pengiriman"
                           required>

                    <input type="text"
                           name="nomor_telepon"
                           class="form-control mb-2"
                           placeholder="Nomor HP"
                           required>

                    <select name="metode_pembayaran"
                            class="form-control mb-3"
                            required>
                        <option value="COD">COD</option>
                        <option value="Transfer">Transfer</option>
                    </select>

                    <button type="submit" class="btn btn-primary w-100 fw-semibold">
                        💳 Checkout
                    </button>
                </form>

            </div>

        @else

            <div class="text-center py-5">
                <h5 class="text-muted mb-3">Keranjang masih kosong.</h5>

                <a href="/" class="btn btn-primary px-4 py-2 fw-semibold">
                    🛍 Mulai Belanja
                </a>
            </div>

        @endif

    </div>
</div>

</div>
@endsection