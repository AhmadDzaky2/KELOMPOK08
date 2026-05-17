<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Kelompok 8 Store')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #eaf4ff, #f8fbff);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(90deg, #0d6efd, #0a58ca) !important;
            box-shadow: 0 4px 20px rgba(13, 110, 253, 0.15);
        }

        .navbar-brand {
            color: #fff !important;
            font-weight: 700;
        }

        .navbar a {
            font-weight: 600;
            text-decoration: none;
        }

        /* BUTTON */
        .btn-light {
            background-color: #ffffff !important;
            color: #0d6efd !important;
            font-weight: 600;
            border: none;
        }

        .btn-light:hover {
            background-color: #f1f1f1 !important;
            color: #0a58ca !important;
        }

        .btn-outline-light {
            background: transparent !important;
            color: #ffffff !important;
            border: 1px solid #ffffff !important;
        }

        .btn-outline-light:hover {
            background-color: #ffffff !important;
            color: #0d6efd !important;
        }

        /* CARD */
        .page-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(13, 110, 253, 0.12);
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(90deg, #0d6efd, #4dabff);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0b5ed7, #339af0);
        }

        .product-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 35px rgba(13, 110, 253, 0.15);
        }

        .product-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        footer {
            color: #6c757d;
        }
    </style>

    @stack('styles')
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="/">
            <i class="bi bi-bag-heart-fill"></i> Kelompok 8 Store
        </a>

        <div class="ms-auto d-flex align-items-center gap-2">

            @auth
                @if(auth()->user()->role === 'admin')

                    <a href="/admin/orders"
                       class="btn btn-light btn-sm fw-semibold">
                        <i class="bi bi-box-seam"></i> Orders
                    </a>

                    <a href="/admin/products"
                       class="btn btn-light btn-sm fw-semibold">
                        <i class="bi bi-box"></i> Products
                    </a>

                @else

                    <a href="/cart"
                       class="btn btn-light btn-sm fw-semibold">
                        <i class="bi bi-cart3"></i> Cart
                    </a>

                    <a href="/pesanan-saya"
                       class="btn btn-light btn-sm fw-semibold">
                        <i class="bi bi-truck"></i> Pesanan Saya
                    </a>

                @endif

                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-sm fw-semibold">
                        Logout
                    </button>
                </form>

            @else

                <a href="/login" class="btn btn-light btn-sm fw-semibold">
                    Login
                </a>

                <a href="/register" class="btn btn-outline-light btn-sm fw-semibold">
                    Register
                </a>

            @endauth

        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container py-5">
    @yield('content')
</div>

<!-- FOOTER -->
<footer class="text-center py-4">
    <small>&copy; {{ date('Y') }} Kelompok 8 Store</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- PASSWORD TOGGLE -->
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    if (!input) return;

    input.type = (input.type === "password") ? "text" : "password";
}
</script>

</body>
</html>