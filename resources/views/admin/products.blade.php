@extends('layouts.app')

@section('title', 'Kelola Produk')

@section('content')
<div class="card page-card p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1 text-primary">📦 Kelola Produk</h3>
            <p class="text-muted mb-0">{{ $products->count() }} produk tersedia</p>
        </div>

        <a href="{{ route('admin.products.create') }}"
           class="btn btn-primary fw-semibold px-4">
            ➕ Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="card product-card h-100">

                    <img
                        src="{{ $product->foto
                            ? asset('storage/' . $product->foto)
                            : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                        class="card-img-top"
                        alt="{{ $product->nama_produk }}"
                    >

                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title fw-bold">
                            {{ $product->nama_produk }}
                        </h5>

                        <p class="text-muted small flex-grow-1">
                            {{ $product->deskripsi }}
                        </p>

                        <p class="fw-bold text-primary fs-5 mb-1">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </p>

                        <p class="mb-3">
                            <span class="badge bg-primary px-3 py-2">
                                Stok: {{ $product->stok }}
                            </span>
                        </p>

                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="btn btn-primary w-100 fw-semibold mb-2">
                            ✏️ Edit Produk
                        </a>

                        <form method="POST"
                              action="{{ route('admin.products.restock', $product->id) }}">
                            @csrf

                            <div class="input-group">
                                <input
                                    type="number"
                                    name="stok_tambah"
                                    min="1"
                                    class="form-control"
                                    placeholder="Tambah stok"
                                    required
                                >

                                <button
                                    type="submit"
                                    class="btn btn-primary fw-bold fs-5 px-3"
                                >
                                    ➕
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5 text-muted">
                    <h5>Belum ada produk.</h5>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection