<!DOCTYPE html>
<html>
<head>
    <title>Kelompok 8 - Checkout</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #111, #333);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 34px;
        }

        .header p {
            margin-top: 10px;
            color: #ddd;
        }

        .content {
            padding: 30px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .summary {
            margin-top: 25px;
            background: #f9fafb;
            padding: 20px;
            border-radius: 10px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }

        .total {
            font-size: 24px;
            font-weight: bold;
            color: #111;
            border-top: 2px solid #ddd;
            padding-top: 15px;
            margin-top: 15px;
        }

        h3 {
            margin-top: 35px;
            margin-bottom: 20px;
            color: #111;
        }

        input, select {
            width: 100%;
            padding: 14px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-back {
            background: #e5e7eb;
            color: #111;
        }

        .btn-back:hover {
            background: #d1d5db;
        }

        .btn-submit {
            background: #111;
            color: white;
        }

        .btn-submit:hover {
            background: #333;
        }

        .empty-cart {
            text-align: center;
            padding: 40px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>🛒 Detail Pemesanan</h2>
        <p>Periksa kembali pesanan Anda sebelum checkout</p>
    </div>

    <div class="content">

        @if(count($cart) > 0)

            @foreach($cart as $id => $details)
                <div class="item">
                    <span>{{ $details['name'] }} (x{{ $details['quantity'] }})</span>
                    <strong>
                        Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                    </strong>
                </div>
            @endforeach

            <div class="summary">
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <div class="summary-row">
                    <span>Ongkos Kirim</span>
                    <span>Rp {{ number_format($ongkir, 0, ',', '.') }}</span>
                </div>

                <div class="summary-row total">
                    <span>Harga Akhir</span>
                    <span>Rp {{ number_format($harga_akhir, 0, ',', '.') }}</span>
                </div>
            </div>

            <h3>📦 Informasi Pengiriman</h3>

            <form action="/checkout" method="POST">
                @csrf

                <input type="text"
                       name="alamat"
                       placeholder="Masukkan alamat lengkap"
                       required>

                <input type="text"
                       name="telepon"
                       placeholder="Nomor Telepon / WhatsApp"
                       required>

                <select name="pembayaran">
                    <option value="transfer">Transfer Bank</option>
                    <option value="cod">Bayar di Tempat (COD)</option>
                </select>

                <div class="buttons">
                    <a href="/" class="btn btn-back">← Kembali Belanja</a>

                    <button type="submit" class="btn btn-submit">
                        ✔ Konfirmasi Pemesanan
                    </button>
                </div>
            </form>

        @else

            <div class="empty-cart">
                <h3>🛒 Keranjang Masih Kosong</h3>
                <p>Silakan pilih produk terlebih dahulu.</p>
                <br>
                <a href="/" class="btn btn-submit" style="max-width: 250px; display:inline-block;">
                    Mulai Belanja
                </a>
            </div>

        @endif

    </div>
</div>

</body>
</html>