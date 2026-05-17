@extends('layouts.app')

@section('title', 'Tambah Produk - Kelompok 8')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0 mx-auto" style="max-width: 650px; border-radius: 20px;">
        <div class="card-header text-white"
             style="background: linear-gradient(135deg, #2563eb, #1d4ed8); border-radius: 20px 20px 0 0;">
            <h3 class="mb-0 fw-bold">📦 Tambah Produk Baru</h3>
            <small>Lengkapi data produk yang akan dijual</small>
        </div>

        <div class="card-body p-4">
            <form method="POST" action="/admin/products/store" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Produk</label>
                    <input
                        type="text"
                        name="nama_produk"
                        class="form-control"
                        placeholder="Contoh: Hoodie Oversize"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi Produk</label>
                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan deskripsi produk"
                        required
                    ></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Harga</label>
                        <input
                            type="number"
                            name="harga"
                            class="form-control"
                            placeholder="50000"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Stok</label>
                        <input
                            type="number"
                            name="stok"
                            class="form-control"
                            placeholder="10"
                            required
                        >
                    </div>

                    <div class="mb-3">
                         <label class="form-label fw-semibold">Foto Produk</label>
                         <input
                             type="file"
                             name="foto"
                             class="form-control"
                             accept="image/*"
                             required
                         >
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="/admin/products" class="btn btn-outline-secondary w-50">
                        ← Kembali
                    </a>

                    <button type="submit" class="btn btn-primary w-50">
                        💾 Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection