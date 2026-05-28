@extends('admin.contoh')

@section('content')

<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h3 mb-1">📦 Kelola Produk</h2>
                <p class="text-muted mb-0">
                    Manajemen produk dan stok toko
                </p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
                {{ session('success') }}
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="panel">
            <div class="panel-header">
                <div>
                    <h5 class="mb-1">Daftar Produk</h5>
                    <p class="text-muted mb-0">
                        Total: {{ $products->count() }} produk
                    </p>
                </div>
            </div>

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead style="background: #f1f5f9; color: #111827;">
                        <tr>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th width="300">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>
                                @if($product->foto)
                                    <img
                                        src="{{ asset('storage/' . $product->foto) }}"
                                        width="70"
                                        height="70"
                                        style="object-fit: cover; border-radius: 10px;"
                                    >
                                @else
                                    <span class="text-muted">
                                        Tidak ada foto
                                    </span>
                                @endif
                            </td>

                            <td>
                                <strong>
                                    {{ $product->nama_produk }}
                                </strong>
                            </td>

                            <td style="max-width: 200px;">
                                <span class="text-muted">
                                    {{ $product->deskripsi ?? '-' }}
                                </span>
                            </td>

                            <td>
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $product->stok }}
                                </span>
                            </td>

                            <td>

                                <div class="d-flex gap-2 flex-wrap">

                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    {{-- DELETE --}}
                                    <form method="POST"
                                          action="{{ route('admin.products.delete', $product->id) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                        @csrf

                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>

                                    </form>

                                    {{-- RESTOCK --}}
                                    <form method="POST"
                                          action="{{ route('admin.products.restock', $product->id) }}"
                                          class="d-flex gap-2">

                                        @csrf

                                        <input
                                            type="number"
                                            name="stok_tambah"
                                            min="1"
                                            class="form-control form-control-sm"
                                            placeholder="+stok"
                                            style="width: 90px;"
                                            required
                                        >

                                        <button type="submit"
                                                class="btn btn-success btn-sm">
                                            ➕
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada produk
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>
        </div>

    </div>
</main>

@endsection
