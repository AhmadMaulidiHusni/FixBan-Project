<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <title>fixban - Our Maps</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #map {
            height: 470px;
            /* Tinggi tetap untuk peta */
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #3f3f3f;
            /* Warna lebih cerah untuk kontras */
        }

        footer .logo-container {
            background-color: white;
            /* Latar belakang putih untuk memperjelas logo */
            padding: 5px;
            border-radius: 50%;
        }
    </style>
</head>

<body class="bg-gray-100">
    {{-- Header --}}
    @include('User.headeruser')

    <main class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-center mb-4">Lokasi Kami</h1>
        <div id="map" class="rounded shadow-lg border border-gray-300"></div>
    </main>

    <footer class="text-white py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <!-- Logo dan Tagline -->
                <div class="flex items-center space-x-4">
                    <div class="logo-container">
                        <img src="{{ asset ('Logo fixban.png') }}" alt="Logo" class="w-20">
                    </div>
                    <p class="text-lg font-semibold">Apa yang bisa kami bantu dengan ban kendaraan anda?</p>
                </div>

                <!-- Kontak -->
                <div class="text-right">
                    <p class="mb-2"><i class="fas fa-map-marker-alt mr-2"></i>Jl. Kalimantan Tegalboto No.37</p>
                    <p class="mb-2"><i class="fas fa-phone mr-2"></i>081230638237</p>
                    <p><i class="fas fa-clock mr-2"></i>Senin - Minggu | 09.00 - 22.00</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Koordinat awal
        const lat = -8.164547;
        const lng = 113.714654;

        // Inisialisasi peta
        const map = L.map('map').setView([lat, lng], 17);

        // Tambahkan tile layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Tambahkan marker ke peta
        L.marker([lat, lng]).addTo(map)
            .bindPopup('fixban')
            .openPopup();
    </script>
</body>

</html>