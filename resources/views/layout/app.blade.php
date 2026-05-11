<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Kelompok 8')</title>

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
        }

        .navbar a {
            color: white;
            margin-left: 10px;
            text-decoration: none;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-dark { background: black; color: white; }
        .btn-green { background: green; color: white; }
    </style>
</head>
<body>

<div class="navbar">
    <div><b>Kelompok 8</b></div>

    <div>
        <a href="/">Home</a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    </div>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>