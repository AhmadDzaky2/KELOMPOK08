<!DOCTYPE html>
<html>
<head>
    <title>Admin Orders</title>
    <style>
        body { font-family: Arial; padding: 20px; background:#f5f5f5; }

        .menu {
            margin-bottom: 20px;
            padding: 10px;
            background: white;
            border-radius: 10px;
        }

        .menu a {
            margin-right: 15px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

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

        .btn {
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            color: white;
            border-radius: 5px;
        }

        .btn-proses { background: orange; }
        .btn-selesai { background: green; }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            display: inline-block;
        }

        .pending { background: gray; }
        .diproses { background: orange; }
        .selesai { background: green; }
    </style>
</head>
<body>

<h2>📦 Admin Panel</h2>

<!-- 🔥 MENU ADMIN -->
<div class="menu">
    <a href="/admin/orders">📦 Orders</a>
    <a href="/admin/products">🛒 Produk & Stok</a>

    <!-- ✔ FIX LOGOUT WAJIB POST -->
    <form action="/logout" method="POST" style="display:inline;">
        @csrf
        <button style="background:none;border:none;cursor:pointer;font-weight:bold;">
            🚪 Logout
        </button>
    </form>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->user->username ?? '-' }}</td>
        <td>Rp {{ number_format($order->total_harga) }}</td>

        <td>
            <span class="status {{ $order->status_order }}">
                {{ ucfirst($order->status_order) }}
            </span>
        </td>

        <td>
            @if($order->status_order == 'pending')
                <form method="POST" action="/admin/orders/{{ $order->id }}/update">
                    @csrf
                    <button class="btn btn-proses">Proses</button>
                </form>

            @elseif($order->status_order == 'diproses')
                <form method="POST" action="/admin/orders/{{ $order->id }}/update">
                    @csrf
                    <button class="btn btn-selesai">Selesaikan</button>
                </form>

            @else
                ✔ Selesai
            @endif
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>