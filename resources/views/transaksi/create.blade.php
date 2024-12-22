<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tambah transaksis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex flex-col min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>

        <form action="{{ route('transaksis.create') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama_pelanggan" class="block font-medium">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <label for="jasa" class="block font-medium">Jasa</label>
                <input type="text" name="jasa" class="w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <label for="tanggal" class="block font-medium">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <label for="harga" class="block font-medium">Harga</label>
                <input type="number" name="harga" class="w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan
                </button>
                <a href="{{ route('transaksis') }}" class="text-gray-500 hover:underline ml-4">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
