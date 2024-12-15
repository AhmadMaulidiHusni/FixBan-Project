<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Fix Ban</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-white flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-gray-300 p-4 flex justify-between items-center">
   <img alt="FixBan logo" class="h-32 w-auto" src="{{ asset ('Logo FixBan.png') }}" />
   <nav class="flex space-x-4">
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="#">Maps</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="{{ route('Services') }}">Services</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="#">About us</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="#">Contact us</a>
    @auth
                <span class="bg-black text-white px-6 py-2 rounded-full shadow-md">{{ Auth::user()->name }}</span>
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-full shadow-md">Logout</button>
                </form>
            @else
                <!-- Show a link to login if not authenticated -->
                <a class="bg-red-500 text-white px-6 py-2 rounded-full shadow-md" href="{{ route('login') }}">Login</a>
            @endauth
   </nav>
  </header>

    <!-- Main Section -->
    <main class="container mx-auto flex flex-col md:flex-row items-center py-12 px-6 flex-grow">
        <!-- Left Section (Text) -->
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                “APA YANG BISA KAMI BANTU DENGAN BAN KENDARAAN ANDA?”
            </h1>
        </div>

        <!-- Right Section (Image) -->
        <div class="md:w-1/2 flex justify-center">
            <div class="relative">
                <!-- Background Image (Ellipse 5) -->
                <img 
                    src="{{ asset ('Ellipse 5.png') }}" 
                    alt="Background Ellipse" 
                    class="absolute top-0 left-0 w-full h-full max-w-lg opacity-50 z-0"
                />
                <!-- Foreground Image (Group 622) -->
                <img 
                    src="{{ asset ('Group 622.png') }}" 
                    alt="Foreground Group" 
                    class="relative z-10 w-64 md:w-96"
                />
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-4 px-6 mt-auto">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <p class="text-xs text-center md:text-left">
                privacy setting — This site uses third-party website tracking technologies to provide and continually improve our services. I agree and may revoke or change my consent at any time with effect for the future. See also our
                <a class="underline" href="#">Privacy Policy</a>
                and
                <a class="underline" href="#">Cookies</a>.
            </p>
            <div class="mt-4 md:mt-0 space-x-4">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-full">Deny</button>
                <button class="bg-gray-700 text-white px-4 py-2 rounded-full">Accept</button>
            </div>
        </div>
    </footer>
</body>
</html>
