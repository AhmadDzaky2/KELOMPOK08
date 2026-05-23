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

            <a href="{{ route('admin.products.create') }}"
               class="btn btn-primary">
                ➕ Tambah Produk
            </a>
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

                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th width="250">Aksi</th>
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

                            <td>
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $product->stok }}
                                </span>
                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

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
                            <td colspan="5" class="text-center text-muted py-4">
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
