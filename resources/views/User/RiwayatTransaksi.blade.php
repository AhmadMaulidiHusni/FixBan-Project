<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    @include('User.headeruser')

    <main class="container mx-auto py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Riwayat Transaksi</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">Layanan</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                        <th class="border border-gray-300 px-4 py-2">Harga</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->nama_pelanggan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->jasa }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->tanggal }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class="px-2 py-1 rounded text-white {{ $transaksi->status == 'Pending' ? 'bg-yellow-500' : ($transaksi->status == 'Diterima' ? 'bg-green-500' : 'bg-red-500') }}">
                                {{ $transaksi->status }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded mb-2" onclick="handlePayment({{ $transaksi->id }}, '{{ $transaksi->status }}')">Bayar</button>
                            <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="handleReceipt({{ $transaksi->id }}, '{{ $transaksi->status }}')">Cetak Struk</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Popup Form Pembayaran -->
    <div id="paymentPopup" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-2xl font-bold mb-4">Form Pembayaran</h2>
            <form id="paymentForm" method="POST" action="{{ route('proses.pembayaran') }}">
                @csrf
                <input type="hidden" id="transaksiId" name="transaksi_id">
                <div class="mb-4">
                    <label for="metode_pembayaran" class="block text-gray-700 font-bold mb-2">Metode Pembayaran:</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="w-full border border-gray-300 p-2 rounded">
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Bayar</button>
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" onclick="closePaymentForm()">Batal</button>
            </form>
        </div>
    </div>

    <!-- Popup Cetak Struk -->
    <div id="receiptPopup" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-2/3">
            <h2 class="text-2xl font-bold text-center mb-4">Struk Pembayaran</h2>
            <div class="border-t border-gray-300 my-4"></div>
            <p><strong>Nama Pelanggan:</strong> <span id="namaPelanggan"></span></p>
            <p><strong>Jasa:</strong> <span id="jasa"></span></p>
            <p><strong>Harga:</strong> <span id="harga"></span></p>
            <p><strong>Tanggal:</strong> <span id="tanggal"></span></p>
            <p><strong>Metode Pembayaran:</strong> <span id="metodePembayaran"></span></p>
            <p><strong>Status Pembayaran:</strong> <span id="statusPembayaran"></span></p>
            <div class="text-center mt-8">
                <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded">Cetak</button>
                <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="closeReceiptPopup()">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        function handlePayment(transaksiId, status) {
            if (status === 'Pending') {
                alert('Pembayaran tidak dapat dilakukan karena pesanan belum diterima.');
            } else if (status === 'Diterima') {
                openPaymentForm(transaksiId);
            }
        }

        function handleReceipt(transaksiId, status) {
            if (status === 'Pending') {
                alert('Cetak struk tidak dapat dilakukan karena pesanan belum diterima.');
            } else {
                openReceiptPopup(transaksiId);
            }
        }

        function openPaymentForm(transaksiId) {
            document.getElementById('paymentPopup').classList.remove('hidden');
            document.getElementById('transaksiId').value = transaksiId;
        }

        function closePaymentForm() {
            document.getElementById('paymentPopup').classList.add('hidden');
        }

        function openReceiptPopup(transaksiId) {
            fetch(`/get-pembayaran/${transaksiId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Belum ada pembayaran yang dilakukan.');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('namaPelanggan').textContent = data.nama_pelanggan;
                    document.getElementById('jasa').textContent = data.jasa;
                    document.getElementById('harga').textContent = `Rp${parseInt(data.harga).toLocaleString('id-ID')}`;
                    document.getElementById('tanggal').textContent = data.tanggal;
                    document.getElementById('metodePembayaran').textContent = data.metode_pembayaran;
                    document.getElementById('statusPembayaran').textContent = data.status_pembayaran;

                    document.getElementById('receiptPopup').classList.remove('hidden');
                })
                .catch(error => {
                    alert(error.message);
                });
        }

        function closeReceiptPopup() {
            document.getElementById('receiptPopup').classList.add('hidden');
        }
    </script>
</body>

</html>