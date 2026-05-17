@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="card page-card p-4">

    <h3 class="mb-4 text-primary">📦 Tracking Pesanan Saya</h3>

    @if($orders->count() > 0)

        <table class="table table-bordered align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Pembayaran</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                    <tr>

                        {{-- Nama Produk --}}
                        <td>
                            @if($order->items && $order->items->count() > 0)
                                @foreach($order->items as $item)
                                    {{ $item->product->nama_produk ?? 'Produk tidak ditemukan' }}<br>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>

                        {{-- Jumlah Pembelian --}}
                        <td class="text-center">
                            @if($order->items && $order->items->count() > 0)
                                @foreach($order->items as $item)
                                    {{ $item->jumlah }} pcs<br>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>

                        {{-- Total Harga --}}
                        <td>
                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                        </td>

                        {{-- Metode Pembayaran --}}
                        <td>
                            {{ $order->metode_pembayaran }}
                        </td>

                        {{-- Alamat --}}
                        <td>
                            {{ $order->alamat_pengiriman }}
                        </td>

                        {{-- No HP --}}
                        <td>
                            {{ $order->nomor_telepon }}
                        </td>

                        {{-- Status --}}
                        <td class="text-center">
                            @if($order->status_order == 'pending')
                                <span class="badge bg-warning text-dark px-3 py-2">
                                    Pending
                                </span>
                            @elseif($order->status_order == 'diproses')
                                <span class="badge bg-primary px-3 py-2">
                                    Diproses
                                </span>
                            @else
                                <span class="badge bg-success px-3 py-2">
                                    Selesai
                                </span>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    @else

        <div class="text-center py-5 text-muted">
            Belum ada pesanan.
        </div>

    @endif

</div>
@endsection