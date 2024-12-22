<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>fixban - Our Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="bg-gray-100">
    @include('User.headeruser')

    <!-- Main Content -->
    <main class="text-center py-8">
        <h1 class="text-4xl font-bold mb-8 text-black uppercase">
            Our Services
        </h1>
        <!-- Horizontal Line Decoration -->
        <div class="flex items-center justify-center mb-8">
            <div class="h-1 w-32 bg-black"></div>
            <img alt="fixban logo" class="h-32 w-auto mx-4" src="{{ asset('Logo fixban.png') }}" />
            <div class="h-1 w-32 bg-black"></div>
        </div>

        <!-- Services Section -->
        <div class="flex justify-center flex-wrap gap-8">
            <!-- New Services from Database -->
            @foreach($services as $service)
            <div class="bg-white rounded-lg shadow-lg p-4 w-64 border-2 border-gray-300">
                <img alt="{{ $service->name }}" class="rounded-t-lg" src="{{ $service->image ? asset('storage/' . $service->image) : asset('default.jpg') }}" />
                <h2 class="text-xl font-bold mt-4 uppercase">
                    {{ $service->name }}
                </h2>
                <p class="text-gray-700 mt-2">Rp.{{ $service->price }}</p>
                <button data-id="{{ $service->id }}" data-price="{{ $service->price }}" class="apply-btn bg-blue-500 text-white px-4 py-2 mt-4 rounded hover:bg-blue-600">
                    Ajukan Layanan
                </button>
            </div>
            @endforeach
        </div>
    </main>

    <!-- Modal -->
    <div id="serviceModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h3 class="text-lg font-bold mb-4">Ajukan Layanan</h3>
            <form id="serviceForm">
                @csrf
                <input type="hidden" id="service_id" name="service_id" />
                <div class="mb-4">
                    <label for="tanggal" class="block text-left font-semibold mb-2">Tanggal Pemesanan:</label>
                    <input type="date" id="tanggal" name="tanggal" class="w-full border-2 border-gray-300 p-2 rounded" required />
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancelModal" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const modal = document.getElementById("serviceModal");
            const cancelModal = document.getElementById("cancelModal");
            const form = document.getElementById("serviceForm");
            const serviceIdInput = document.getElementById("service_id");

            // Buka modal ketika tombol "Ajukan Layanan" diklik
            document.querySelectorAll(".apply-btn").forEach(button => {
                button.addEventListener("click", () => {
                    serviceIdInput.value = button.dataset.id;
                    modal.classList.remove("hidden");
                });
            });

            // Tutup modal
            cancelModal.addEventListener("click", () => {
                modal.classList.add("hidden");
            });

            // Kirim formulir
            form.addEventListener("submit", (e) => {
                e.preventDefault();
                const formData = new FormData(form);
                fetch("{{ route('services.order') }}", {
                        method: "POST",
                        body: formData,
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        modal.classList.add("hidden");
                        form.reset();
                        // Redirect ke halaman riwayat transaksi
                        window.location.href = "{{ route('riwayat.transaksi') }}";
                    })
                    .catch(error => console.error("Error:", error));
            });
        });
    </script>
</body>

</html>