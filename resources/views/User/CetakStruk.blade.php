<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold text-center mb-4">Struk Pembayaran</h1>
        <div class="border-t border-gray-300 my-4"></div>
        <p><strong>Nama Pelanggan:</strong> {{ $pembayaran->nama_pelanggan }}</p>
        <p><strong>Jasa:</strong> {{ $pembayaran->jasa }}</p>
        <p><strong>Harga:</strong> Rp{{ number_format($pembayaran->harga, 0, ',', '.') }}</p>
        <p><strong>Tanggal:</strong> {{ $pembayaran->tanggal }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $pembayaran->metode_pembayaran }}</p>
        <p><strong>Status Pembayaran:</strong> {{ $pembayaran->status_pembayaran }}</p>

        <div class="text-center mt-8">
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded">Cetak</button>
        </div>
    </div>
</body>

</html>
