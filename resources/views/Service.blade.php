<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>fixban - Our Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100">
    @include('header')
    <main class="text-center py-8">
        <h1 class="text-4xl font-bold mb-8 text-black uppercase">Our Services</h1>
        <div class="flex items-center justify-center mb-8">
            <div class="h-1 w-32 bg-black"></div>
            <img alt="fixban logo" class="h-32 w-auto mx-4" src="{{ asset ('Logo fixban.png') }}" />
            <div class="h-1 w-32 bg-black"></div>
        </div>
        <form action="{{ route('Services.store') }}" method="POST" id="addServiceForm" enctype="multipart/form-data" class="mb-8 mx-auto w-1/2 bg-white p-4 rounded shadow">
            @csrf
            <h2 class="text-2xl font-bold mb-4">Add New Service</h2>
            <input
                type="text"
                name="name"
                placeholder="Service Name"
                required
                class="p-2 w-full border border-gray-300 rounded mb-4">
            <input
                type="number"
                name="price"
                placeholder="Service Price"
                required
                class="p-2 w-full border border-gray-300 rounded mb-4">
            <input
                type="file"
                name="image"
                required
                class="p-2 w-full border border-gray-300 rounded mb-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded w-full">Add Service</button>
        </form>
    </main>
</body>
</html>