<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - Kelompok 8</title>

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
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
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
        }
    </style>
</head>
<body>

<div class="box">

    <h2>Tambah Produk</h2>

    <form method="POST" action="/admin/products/store">
        @csrf

        <input name="nama_produk" placeholder="Nama Produk">
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <input name="harga" type="number" placeholder="Harga">
        <input name="stok" type="number" placeholder="Stok">

        <button type="submit">Simpan</button>
    </form>

    <a href="/admin/products">← Kembali</a>

</div>

</body>
</html>