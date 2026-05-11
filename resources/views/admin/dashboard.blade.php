<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Dashboard Admin</h1>
<p>Selamat datang, {{ auth()->user()->username }}</p>

<hr>

<h3>Menu Admin</h3>

<ul>
    <li><a href="/admin/orders">📦 Lihat Pesanan Masuk</a></li>
    <li><a href="/admin/products">🛍 Kelola Produk</a></li>
</ul>

</body>
</html>