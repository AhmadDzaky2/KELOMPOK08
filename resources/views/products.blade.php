@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

{{-- Notifikasi sukses setelah checkout --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        {{ session('success') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif

{{-- Notifikasi error --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        {{ session('error') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif

<div class="row g-4">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="card product-card h-100">

                {{-- Foto Produk --}}
                <img
                    src="{{ $product->foto
                        ? asset('storage/' . $product->foto)
                        : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                    class="card-img-top"
                    alt="{{ $product->nama_produk }}"
                >

                <div class="card-body d-flex flex-column">

                    {{-- Nama Produk --}}
                    <h5 class="card-title fw-bold">
                        {{ $product->nama_produk }}
                    </h5>

                    {{-- Deskripsi --}}
                    <p class="text-muted small flex-grow-1">
                        {{ $product->deskripsi }}
                    </p>

                    {{-- Harga --}}
                    <p class="fw-bold text-primary fs-5 mb-1">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </p>

                    {{-- Stok --}}
                    <p class="mb-3">
                        <span class="badge bg-success">
                            Stok: {{ $product->stok }}
                        </span>
                    </p>

                    {{-- Tombol Tambah ke Keranjang --}}
                    <form method="POST" action="{{ route('cart.add', $product->id) }}">
                        @csrf
                        <button type="submit"
                                class="btn btn-primary w-100 fw-semibold">
                            🛒 Tambah ke Keranjang
                        </button>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection