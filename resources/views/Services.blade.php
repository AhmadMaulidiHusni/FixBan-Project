<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   FixBan - Our Services
  </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100">
  <!-- Header -->
  <header class="bg-gray-300 p-4 flex justify-between items-center">
   <img alt="FixBan logo" class="h-32 w-auto" src="{{ asset ('Logo FixBan.png') }}" />
   <nav class="flex space-x-4">
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="#">Maps</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="#">Services</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="#">About us</a>
    <a class="bg-black text-white px-6 py-2 rounded-full shadow-md" href="#">Contact us</a>
    <a class="bg-red-500 text-white px-6 py-2 rounded-full shadow-md" href="#">Profile</a>
   </nav>
  </header>

  <!-- Main Content -->
  <main class="text-center py-8">
   <h1 class="text-4xl font-bold mb-8 text-black uppercase">
    Our Services
   </h1>
   <!-- Horizontal Line Decoration -->
   <div class="flex items-center justify-center mb-8">
    <div class="h-1 w-32 bg-black"></div>
    <img alt="FixBan logo" class="h-32 w-auto mx-4" src="{{ asset ('Logo FixBan.png') }}" />
    <div class="h-1 w-32 bg-black"></div>
   </div>

   <!-- Services Section -->
   <div class="flex justify-center space-x-8">
    <!-- Service 1 -->
    <div class="bg-white rounded-lg shadow-lg p-4 w-64 border-2 border-gray-300">
     <img alt="Mechanic fixing a tire" class="rounded-t-lg" src="https://storage.googleapis.com/a1aa/image/809iabAJbYb5BdNcmHYMASwrs8cx2QhVt6Jemv5nRqS5VW9JA.jpg" />
     <h2 class="text-xl font-bold mt-4 uppercase">
      Tabal Ban Terdekat
     </h2>
    </div>
    <!-- Service 2 -->
    <div class="bg-white rounded-lg shadow-lg p-4 w-64 border-2 border-gray-300">
     <img alt="Person repairing a tire" class="rounded-t-lg" src="https://storage.googleapis.com/a1aa/image/auUSGy3v6i6rKlcqe6sh7xq4e4wKOA0xshuaKGRY2navrs6TA.jpg" />
     <h2 class="text-xl font-bold mt-4 uppercase">
      Tambal Online
     </h2>
    </div>
   </div>
  </main>
 </body>
</html>
