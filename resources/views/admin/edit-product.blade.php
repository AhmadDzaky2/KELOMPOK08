<!DOCTYPE html>
<html>
<head>
    <title>Kelompok 8 - Edit Produk</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        .box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: black;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<div class="box">

    <h2>Edit Produk</h2>

    <form method="POST" action="/admin/products/{{ $product->id }}/update">
        @csrf

        <label>Nama Produk</label>
        <input name="nama_produk" value="{{ $product->nama_produk }}">

        <label>Deskripsi</label>
        <textarea name="deskripsi">{{ $product->deskripsi }}</textarea>

        <label>Harga</label>
        <input name="harga" type="number" value="{{ $product->harga }}">

        <label>Stok</label>
        <input name="stok" type="number" value="{{ $product->stok }}">

        <button type="submit">Update Produk</button>
    </form>

    <a href="/admin/products">← Kembali</a>

</div>

</body>
</html>