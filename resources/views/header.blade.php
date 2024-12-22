<header class="bg-gray-300 p-4 flex justify-between items-center">
   <img alt="fixban logo" class="h-32 w-auto" src="{{ asset ('Logo fixban.png') }}" />
   <nav class="flex space-x-4">
   <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="{{ route('Dashboard') }}">Beranda</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="{{ route('Maps') }}">Maps</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="{{ route('Services') }}">Services</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="{{ route('transaksis') }}">Transaksi</a>
    @auth
                <span class=" text-black px-6 py-2 rounded-full font-bold">{{ Auth::user()->name }}</span>
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