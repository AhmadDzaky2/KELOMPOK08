@extends('layout')

@section('title', 'Daftar Produk - Kelompok 8')

@section('content')

<h2 style="margin-bottom: 30px;">Daftar Produk</h2>

<div style="
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 30px;
">

    @foreach($products as $product)
    <div class="card" style="padding: 20px;">

        <!-- Gambar Produk -->
        <img
            src="{{ $product->gambar ? asset('storage/' . $product->gambar) : 'https://via.placeholder.com/300x220?text=No+Image' }}"
            alt="{{ $product->nama_produk }}"
            style="
                width: 100%;
                height: 220px;
                object-fit: cover;
                border-radius: 10px;
                margin-bottom: 15px;
            "
        >

        <!-- Nama Produk -->
        <h3 style="margin: 0 0 10px 0;">
            {{ $product->nama_produk }}
        </h3>

        <!-- Deskripsi -->
        <p style="
            color: #666;
            min-height: 50px;
            margin-bottom: 15px;
        ">
            {{ $product->deskripsi }}
        </p>

        <!-- Harga -->
        <p style="
            font-size: 22px;
            font-weight: bold;
            color: #111;
            margin-bottom: 10px;
        ">
            Rp {{ number_format($product->harga, 0, ',', '.') }}
        </p>

        <!-- Stok -->
        <p style="
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        ">
            Stok: {{ $product->stok }}
        </p>

        <!-- Tombol -->
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button
                type="submit"
                class="btn btn-dark"
                style="width: 100%;"
            >
                + Add to Cart
            </button>
        </form>

    </div>
    @endforeach

</div>

@endsection