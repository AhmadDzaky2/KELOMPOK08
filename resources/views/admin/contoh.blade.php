<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel')</title>

    <meta name="description" content="Admin Dashboard Kelompok 8 Store">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    {{-- Main Style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<div class="admin-shell">

    {{-- BACKDROP --}}
    <div class="sidebar-backdrop" data-sidebar-close></div>

    {{-- SIDEBAR --}}
    <aside class="admin-sidebar" id="adminSidebar">

        <div class="sidebar-header">

            <a class="brand-mark text-decoration-none"
               href="/admin/dashboard">

                <span class="brand-icon">
                    <i class="bi bi-grid-1x2-fill"></i>
                </span>

                <span class="brand-copy">

                    <span class="brand-title">
                        Kelompok 8 Store
                    </span>

                    <span class="brand-subtitle">
                        Admin Panel
                    </span>

                </span>

            </a>

        </div>

        {{-- MENU --}}
        <nav class="sidebar-nav">

            {{-- DASHBOARD --}}
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
               href="/admin/dashboard">

                <span class="nav-icon">
                    <i class="bi bi-grid-1x2-fill"></i>
                </span>

                <span class="nav-text">
                    Dashboard
                </span>

            </a>

            {{-- ORDERS --}}
            <a class="nav-link {{ request()->is('admin/orders') ? 'active' : '' }}"
               href="/admin/orders">

                <span class="nav-icon">
                    <i class="bi bi-box-seam"></i>
                </span>

                <span class="nav-text">
                    Orders
                </span>

            </a>

            {{-- PRODUCTS --}}
            <a class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}"
               href="/admin/products">

                <span class="nav-icon">
                    <i class="bi bi-bag"></i>
                </span>

                <span class="nav-text">
                    Products
                </span>

            </a>

            {{-- TAMBAH PRODUK --}}
            <a class="nav-link {{ request()->is('admin/products/create') ? 'active' : '' }}"
               href="/admin/products/create">

                <span class="nav-icon">
                    <i class="bi bi-plus-circle"></i>
                </span>

                <span class="nav-text">
                    Tambah Produk
                </span>

            </a>

        </nav>

        {{-- USER --}}
        <div class="sidebar-user">

            <img
                class="avatar-img avatar-md sidebar-user-avatar"
                src="https://ui-avatars.com/api/?name=Admin"
                alt="Admin"
            >

            <strong>
                {{ auth()->user()->username ?? 'Admin' }}
            </strong>

            <small>
                Administrator
            </small>

        </div>

        {{-- FOOTER --}}
        <div class="sidebar-footer">

            <span class="status-dot"></span>

            <span class="sidebar-footer-text">
                System running smoothly
            </span>

        </div>

    </aside>

    {{-- MAIN --}}
    <div class="admin-main">

        {{-- NAVBAR --}}
        <nav class="navbar admin-navbar navbar-expand bg-white">

            <div class="container-fluid px-3 px-lg-4">

                {{-- TOGGLE --}}
                <button
                    class="sidebar-toggle"
                    type="button"
                    data-sidebar-toggle
                >
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                {{-- SEARCH --}}
                <form class="d-none d-md-flex ms-3 flex-grow-1">

                    <input
                        class="form-control search-input"
                        type="search"
                        placeholder="Cari produk atau pesanan..."
                    >

                </form>

                {{-- ACTION --}}
                <div class="navbar-actions ms-auto">

                    {{-- PROFILE --}}
                    <div class="dropdown">

                        <button
                            class="profile-button dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                        >

                            <img
                                class="avatar-img avatar-sm"
                                src="https://ui-avatars.com/api/?name=Admin"
                                alt="Admin"
                            >

                            <span class="profile-name d-none d-sm-inline">
                                {{ auth()->user()->username ?? 'Admin' }}
                            </span>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>

                                <a class="dropdown-item" href="/">
                                    Lihat Toko
                                </a>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form method="POST" action="/logout">
                                    @csrf

                                    <button class="dropdown-item">
                                        Logout
                                    </button>

                                </form>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </nav>

        {{-- CONTENT --}}
        <main class="p-4">
            @yield('content')
        </main>

        {{-- FOOTER --}}
        <footer class="admin-footer">

            <div class="container-fluid px-3 px-lg-4">

                <span>
                    © {{ date('Y') }} Kelompok 8 Store
                </span>

                <span>
                    Admin Dashboard
                </span>

            </div>

        </footer>

    </div>

</div>

{{-- JS --}}
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
