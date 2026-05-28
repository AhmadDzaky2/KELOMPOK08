@extends('admin.contoh')

@section('content')

<div class="container-fluid py-4">

    {{-- TOP --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>
            <h2 class="fw-bold text-white mb-1">
                Dashboard
            </h2>

            <p class="text-secondary mb-0">
                Welcome back admin 👋
            </p>
        </div>

    </div>

    {{-- CARDS --}}
    <div class="row g-4">

        {{-- TOTAL PRODUK --}}
        <div class="col-md-6 col-xl-3">

            <div class="metric-card metric-primary">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="metric-label mb-2">Total Produk</p>
                        <h2 class="metric-value text-white">
                            {{ \App\Models\Product::count() }}
                        </h2>
                    </div>

                    <div class="metric-icon">
                        <i class="bi bi-bag"></i>
                    </div>

                </div>

            </div>

        </div>

        {{-- TOTAL PESANAN --}}
        <div class="col-md-6 col-xl-3">

            <div class="metric-card metric-success">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="metric-label mb-2">Pesanan</p>
                        <h2 class="metric-value text-white">
                            {{ \App\Models\Order::count() }}
                        </h2>
                    </div>

                    <div class="metric-icon">
                        <i class="bi bi-box"></i>
                    </div>

                </div>

            </div>

        </div>

        {{-- CUSTOMER (FIX REAL) --}}
        <div class="col-md-6 col-xl-3">

            <div class="metric-card metric-warning">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="metric-label mb-2">Customer</p>
                        <h2 class="metric-value text-white">
                            {{ \App\Models\Order::distinct('user_id')->count('user_id') }}
                        </h2>
                    </div>

                    <div class="metric-icon">
                        <i class="bi bi-people"></i>
                    </div>

                </div>

            </div>

        </div>

        {{-- REVENUE --}}
        <div class="col-md-6 col-xl-3">

            <div class="metric-card metric-danger">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="metric-label mb-2">Revenue</p>
                        <h2 class="metric-value text-white">
                            Rp {{ number_format(\App\Models\Order::sum('total_harga')) }}
                        </h2>
                    </div>

                    <div class="metric-icon">
                        <i class="bi bi-cash-stack"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="row g-4 mt-1">

        {{-- GRAFIK REAL 12 BULAN --}}
        <div class="col-lg-8">

            <div class="panel">

                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

                    <div>
                        <h5 class="fw-bold text-white mb-1">Statistik Penjualan</h5>
                        <small class="text-secondary">Grafik perkembangan toko</small>
                    </div>

                    <span class="badge bg-primary">Data Real</span>

                </div>

                @php
                    $months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
                    $currentMonth = now()->month;
                    $max = max(\App\Models\Order::count(), 1);
                @endphp

                <div class="chart-bars">

                    @for($i = 1; $i <= 12; $i++)

                        @php
                            $total = \App\Models\Order::whereMonth('created_at', $i)->count();
                            $height = ($total / $max) * 180;
                            if ($height < 20) $height = 20;
                        @endphp

                        <div class="chart-column">

                            {{-- ANGKA --}}
                            <div class="chart-value">
                                {{ $total }}
                            </div>

                            {{-- BAR --}}
                            <span style="height: {{ $height }}px;"></span>

                            {{-- BULAN --}}
                            <small>{{ $months[$i - 1] }}</small>

                        </div>

                    @endfor

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-4">

            <div class="panel mb-4">
                <h5 class="fw-bold text-white mb-4">Quick Menu</h5>

                <div class="d-grid gap-3">

                    <a href="/admin/products" class="btn btn-outline-light text-start">
                        📦 Kelola Produk
                    </a>

                    <a href="/admin/orders" class="btn btn-outline-light text-start">
                        🛒 Kelola Pesanan
                    </a>

                </div>

            </div>

            <div class="panel">

                <h5 class="fw-bold text-white mb-4">Pesanan Terbaru</h5>

                <div class="d-grid gap-3">

                    @forelse(\App\Models\Order::latest()->take(3)->get() as $order)

                        <div class="p-3 rounded-4 bg-dark border border-secondary">

                            <div class="d-flex justify-content-between align-items-center mb-2">

                                <div class="fw-bold text-white">
                                    Order #{{ $order->id }}
                                </div>

                                <span class="badge bg-primary">
                                    {{ $order->status_order }}
                                </span>

                            </div>

                            <small class="text-secondary">
                                {{ $order->nama_penerima ?? 'Customer' }}
                            </small>

                        </div>

                    @empty
                        <div class="text-secondary">Belum ada pesanan</div>
                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
