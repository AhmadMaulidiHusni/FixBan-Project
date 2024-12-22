<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fix Ban</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white flex flex-col min-h-screen">
    <!-- Header -->
    @include('header')

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Data Transaksi</h1>

        <!-- Tabel transaksis -->
        <div class="overflow-x-auto">
            <table class="table-auto border-collapse border border-gray-300 w-full text-sm text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Nama Pelanggan</th>
                        <th class="border border-gray-300 px-4 py-2">Jasa yang Digunakan</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                        <th class="border border-gray-300 px-4 py-2">Harga</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transaksis->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center border border-gray-300 px-4 py-2">Tidak ada data.</td>
                    </tr>
                    @else
                    @foreach ($transaksis as $transaksi)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->nama_pelanggan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->jasa }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->tanggal }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->harga }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $transaksi->status ?? 'Menunggu Persetujuan' }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('transaksis.approve', $transaksi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-green-500 hover:underline">Terima</button>
                            </form>
                            <form action="{{ route('transaksis.reject', $transaksi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Tolak</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

                // Aksi Terima Transaksi
                document.querySelectorAll('.accept-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;

                        fetch(`/transaksis/${id}/accept`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Content-Type': 'application/json',
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert(data.message);
                                location.reload();
                            })
                            .catch(error => console.error('Error:', error));
                    });
                });

                // Aksi Tolak Transaksi
                document.querySelectorAll('.reject-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;

                        fetch(`/transaksis/${id}/reject`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Content-Type': 'application/json',
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert(data.message);
                                location.reload();
                            })
                            .catch(error => console.error('Error:', error));
                    });
                });
            });
        </script>
    </div>
</body>

</html>