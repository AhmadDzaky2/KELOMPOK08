<!DOCTYPE html>
<html>
<head>
    <title>Kelompok 8 - Produk</title>

    <style>
        body { font-family: Arial; padding: 20px; background:#f5f5f5; }

        .menu {
            margin-bottom: 20px;
            padding: 10px;
            background: white;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu a {
            margin-right: 15px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .btn-add {
            background: black;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        th {
            background: #111;
            color: white;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-stok { background: green; }
        .btn-edit { background: orange; }

        input {
            padding: 5px;
            width: 80px;
        }
    </style>
</head>
<body>

<h2>📦 Kelompok 8 - Kelola Produk</h2>

<!-- MENU -->
<div class="menu">
    <div>
        <a href="/admin/orders">📦 Orders</a>
        <a href="/admin/products">🛒 Produk & Stok</a>
    </div>

    <a class="btn-add" href="/admin/products/create" style="
    background: black;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    display: inline-block;">+ Tambah Produk</a>
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

            <!-- EDIT -->
            <a class="btn btn-edit" href="/admin/products/{{ $product->id }}/edit">
                Edit
            </a>

            <!-- RESTOCK -->
            <form method="POST" action="/admin/products/{{ $product->id }}/restock" style="display:inline;">
                @csrf
                <input type="number" name="stok_tambah" placeholder="+">
                <button class="btn btn-stok">Tambah</button>
            </form>

        </td>
    </tr>
    @endforeach

</table>

</body>
</html>