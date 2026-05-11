@extends('layouts.app')

@section('title', 'Kelompok 8 - Kelola Produk')

@section('content')
<div class="card">
    <h2>📦 Kelompok 8 - Kelola Produk</h2>

    <div class="menu">
        <div></div>
        <a href="/admin/products/create" class="btn btn-dark">+ Tambah Produk</a>
    </div>

    <table>
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @foreach($products as $product)
        <tr>
            <td>{{ $product->nama_produk }}</td>
            <td>Rp {{ number_format($product->harga) }}</td>
            <td>{{ $product->stok }}</td>
            <td>
                <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-orange">Edit</a>

                <form method="POST"
                      action="/admin/products/{{ $product->id }}/restock"
                      style="display:inline;">
                    @csrf
                    <input type="number"
                           name="stok_tambah"
                           placeholder="+"
                           style="width: 60px; display:inline-block;">
                    <button class="btn btn-green">Tambah</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection