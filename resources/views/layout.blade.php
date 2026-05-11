<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Kelompok 8')</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        /* Navbar */
        .navbar {
            background: #111;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #ddd;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        /* Card */
        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        /* Button */
        .btn {
            display: inline-block;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-dark {
            background: #111;
            color: white;
        }

        .btn-green {
            background: green;
            color: white;
        }

        .btn-orange {
            background: orange;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Table */
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

        /* Form */
        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        h1, h2 {
            margin-top: 0;
        }

        .text-center {
            text-align: center;
        }

        .menu {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Grid produk */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }

        /* Logout form */
        .logout-form {
            display: inline;
            margin-left: 15px;
        }

        .logout-form button {
            padding: 8px 14px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="brand">🛍 Kelompok 8</div>

    <div>
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="/admin/orders">Orders</a>
                <a href="/admin/products">Produk</a>
            @else
                <a href="/">Home</a>
                <a href="/cart">Cart</a>
            @endif

            <form action="/logout" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-dark">Logout</button>
            </form>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>