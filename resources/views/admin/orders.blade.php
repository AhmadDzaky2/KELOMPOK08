@extends('admin.contoh')

@section('title', 'Admin Orders')

@section('content')
<div class="card page-card p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1 text-primary">📦 Kelola Pesanan</h3>
            <p class="text-muted mb-0">{{ $orders->count() }} pesanan tersedia</p>
        </div>
    </div>

    @if($orders->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="text-center">
                                {{ $order->id }}
                            </td>

                            <td>
                                {{ $order->user->username ?? $order->user->name ?? '-' }}
                            </td>

                            <td>
                                @if($order->items && $order->items->count() > 0)
                                    @foreach($order->items as $item)
                                        {{ $item->product->nama_produk ?? 'Produk tidak ditemukan' }}<br>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>

                            <td class="text-center">
                                @if($order->items && $order->items->count() > 0)
                                    @foreach($order->items as $item)
                                        {{ $item->jumlah }} pcs<br>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $order->metode_pembayaran }}
                            </td>

                            <td>
                                {{ $order->alamat_pengiriman }}
                            </td>

                            <td>
                                {{ $order->nomor_telepon }}
                            </td>

                            <td class="text-center">
                                @if($order->status_order == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status_order == 'diproses')
                                    <span class="badge bg-primary">Diproses</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>

                            <td class="text-center">
                                @if($order->status_order != 'selesai')
                                    <form method="POST"
                                          action="{{ route('admin.orders.update', $order->id) }}">
                                        @csrf
                                        <button class="btn btn-primary btn-sm fw-semibold">
                                            Ubah Status
                                        </button>
                                    </form>
                                @else
                                    <span class="text-success fw-semibold">
                                        Selesai
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-5 text-muted">
            <h5>Belum ada pesanan.</h5>
        </div>
    @endif

</div>
@endsection
