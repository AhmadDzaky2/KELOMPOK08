@extends('layout')

@section('title', 'Daftar Produk - Kelompok 8')

@section('content')
<h2>Daftar Produk</h2>

<div class="grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(250px,1fr)); gap:20px;">
    @foreach($products as $product)
    <div class="card">
        <h3>{{ $product->nama_produk }}</h3>
        <p>{{ $product->deskripsi }}</p>

        <p style="color: green; font-weight: bold;">
            Rp {{ number_format($product->harga, 0, ',', '.') }}
        </p>

        <p>Stok: {{ $product->stok }}</p>

        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark" style="width:100%;">
                Tambah ke Keranjang
            </button>
        </form>
    </div>
    @endforeach
</div>
@endsection