<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>fixban - Our Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">
    @include('header')
    <main class="text-center py-8">
        <h1 class="text-4xl font-bold mb-8 text-black uppercase">Our Services</h1>
        <div class="flex items-center justify-center mb-8">
            <div class="h-1 w-32 bg-black"></div>
            <img alt="fixban logo" class="h-32 w-auto mx-4" src="{{ asset('Logo fixban.png') }}" />
            <div class="h-1 w-32 bg-black"></div>
        </div>
        <div class="flex justify-center mb-12">
            <a href="{{ route('Service.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Services</a>
        </div>
        <div class="flex justify-center flex-wrap gap-8">
            @foreach ($services as $service)
            <div class="bg-white rounded-lg shadow-lg p-4 w-64 border-2 border-gray-300">
                <img alt="{{ $service->name }}" class="rounded-t-lg" src="{{ $service->image ? asset('storage/' . $service->image) : asset('default.jpg') }}" />
                <h2 class="text-xl font-bold mt-4 uppercase">{{ $service->name }}</h2>
                <p class="text-gray-700 mt-2">Rp.{{ $service->price }}</p>
                <form action="{{ route('Service.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-700">Hapus</button>
                </form>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>