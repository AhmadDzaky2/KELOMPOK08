@extends('layouts.app')

@section('title', 'Kelompok 8 - Daftar Produk')

@section('content')
<div class="card">
    <h2>🛍 Daftar Produk</h2>

    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:20px;">
        @foreach($products as $product)
        <div class="card" style="margin:0;">
            <h3>{{ $product->nama_produk }}</h3>
            <p>{{ $product->deskripsi }}</p>
            <p><strong>Rp {{ number_format($product->harga) }}</strong></p>
            <p>Stok: {{ $product->stok }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button class="btn btn-dark" style="width:100%;">Tambah ke Keranjang</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection