@extends('admin.contoh')

@section('content')

<main class="dashboard-content">

    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="page-heading mb-4">

            <div>
                <h1 class="h3 mb-1">
                    Dashboard Admin
                </h1>

                <p class="text-muted mb-0">
                    Selamat datang di panel admin Kelompok 8 Store
                </p>
            </div>

        </div>

        <section class="row g-3">

            {{-- TOTAL PRODUK --}}
            <div class="col-md-6">

                <div class="panel p-4 h-100">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="text-muted">
                                Total Produk
                            </h5>

                            <h2 class="fw-bold">
                                {{ \App\Models\Product::count() }}
                            </h2>

                        </div>

                        <i class="bi bi-bag text-primary"
                           style="font-size: 45px;"></i>

                    </div>

                </div>

            </div>

            {{-- TOTAL PESANAN --}}
            <div class="col-md-6">

                <div class="panel p-4 h-100">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="text-muted">
                                Total Pesanan
                            </h5>

                            <h2 class="fw-bold">
                                {{ \App\Models\Order::count() }}
                            </h2>

                        </div>

                        <i class="bi bi-box-seam text-success"
                           style="font-size: 45px;"></i>

                    </div>

                </div>

            </div>

        </section>

        {{-- MENU CEPAT --}}
        <section class="row g-3 mt-2">

            <div class="col-md-6">

                <a href="/admin/products"
                   class="text-decoration-none">

                    <div class="panel p-4 text-center h-100">

                        <i class="bi bi-bag-fill text-primary"
                           style="font-size: 50px;"></i>

                        <h4 class="mt-3">
                            Kelola Produk
                        </h4>

                    </div>

                </a>

            </div>

            <div class="col-md-6">

                <a href="/admin/orders"
                   class="text-decoration-none">

                    <div class="panel p-4 text-center h-100">

                        <i class="bi bi-box-fill text-success"
                           style="font-size: 50px;"></i>

                        <h4 class="mt-3">
                            Kelola Pesanan
                        </h4>

                    </div>

                </a>

            </div>

        </section>

    </div>

</main>

@endsection
