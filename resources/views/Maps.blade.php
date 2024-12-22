<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <title>fixban - Our Maps</title>
    <style>
        #map {
            height: 470px; /* Tinggi tetap untuk peta */
        }
    </style>
</head>
<body class="bg-gray-100">
    {{-- Header --}}
    @include('header')

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-center mb-4">Lokasi Kami</h1>
        <div id="map" class="rounded shadow-lg border border-gray-300"></div>
    </div>

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