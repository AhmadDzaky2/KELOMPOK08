<!DOCTYPE html>
<html>
<head>
    <title>Kelompok 8</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f5f5f5;
        }

        /* NAVBAR */
        .navbar {
            background: #111;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 10px;
        }

        /* CONTAINER */
        .container {
            padding: 20px;
        }

        /* GRID PRODUK */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        /* CARD PRODUK */
        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .price {
            color: green;
            font-weight: bold;
        }

        button {
            width: 100%;
            padding: 8px;
            background: black;
            color: white;
            border: none;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #333;
        }

    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div>🛍 Toko Online</div>

    <div>
        <a href="/">Home</a>
        <a href="/cart">Cart</a>

        <form action="/logout" method="POST" style="display:inline;">
            @csrf
            <button style="background:none;border:none;color:white;cursor:pointer;">
                Logout
            </button>
        </form>
    </div>
</div>

<!-- CONTENT -->
<div class="container">

    <h2>Daftar Produk</h2>

    <div class="grid">
        @foreach($products as $product)
        <div class="card">

            <h3>{{ $product->nama_produk }}</h3>
            <p>{{ $product->deskripsi }}</p>

            <p class="price">
                Rp {{ number_format($product->harga) }}
            </p>

            <p>Stok: {{ $product->stok }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button>Tambah ke Keranjang</button>
            </form>

        </div>
        @endforeach
    </div>

</div>

</body>
</html>