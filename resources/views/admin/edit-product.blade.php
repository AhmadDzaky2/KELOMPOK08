@extends('layouts.app')

@section('title', 'Edit Produk - Kelompok 8')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0 mx-auto" style="max-width: 650px; border-radius: 20px;">
        <div class="card-header text-white"
             style="background: linear-gradient(135deg, #2563eb, #1d4ed8); border-radius: 20px 20px 0 0;">
            <h3 class="mb-0 fw-bold">✏️ Edit Produk</h3>
            <small>Perbarui data produk</small>
        </div>

        <div class="card-body p-4">
            <form method="POST"
                  action="{{ route('admin.products.update', $product->id) }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Produk</label>
                    <input
                        type="text"
                        name="nama_produk"
                        class="form-control"
                        value="{{ $product->nama_produk }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="4"
                        required
                    >{{ $product->deskripsi }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Harga</label>
                        <input
                            type="number"
                            name="harga"
                            class="form-control"
                            value="{{ $product->harga }}"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Stok</label>
                        <input
                            type="number"
                            name="stok"
                            class="form-control"
                            value="{{ $product->stok }}"
                            required
                        >
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Produk</label>

                    @if($product->foto)
                        <div class="mb-3">
                            <p class="text-muted mb-2">Foto saat ini:</p>
                            <img
                                src="{{ asset('storage/' . $product->foto) }}"
                                alt="{{ $product->nama_produk }}"
                                style="width: 140px; height: 140px; object-fit: cover; border-radius: 12px;"
                                class="shadow-sm"
                            >
                        </div>
                    @endif

                    <input
                        type="file"
                        name="foto"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Pilih foto jika ingin menambahkan atau mengganti gambar produk.
                    </small>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="/admin/products" class="btn btn-outline-secondary w-50">
                        ← Kembali
                    </a>

                    <button type="submit" class="btn btn-primary w-50">
                        💾 Update Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection