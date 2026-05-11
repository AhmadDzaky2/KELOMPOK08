<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-lg text-center">
        <h2 class="text-2xl font-bold text-green-600">Pesanan Berhasil!</h2>
        <p class="mt-2">Terima kasih sudah berbelanja.</p>
        <div class="mt-4 text-left border-t pt-4">
            <p><strong>ID Pesanan:</strong> #{{ $order->id }}</p>
            <p><strong>Total Bayar:</strong> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
            <p><strong>Alamat:</strong> {{ $order->alamat_pengiriman }}</p>
        </div>
        <a href="/" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded">Kembali ke Toko</a>
    </div>
</body>