<!DOCTYPE html>
<html>
<head>
    <title>Kelompok 8</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f5f5f5;
        }

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
            margin-left: 10px;
            text-decoration: none;
        }

        .container {
            padding: 20px;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            background: black;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div>🛍 Toko Online</div>
    <div>
        <a href="/">Home</a>
        <a href="/cart">Cart</a>

        <form action="/logout" method="POST" style="display:inline;">
            @csrf
            <button class="btn">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>