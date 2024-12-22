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
    @include('User.headeruser')

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

    
</body>
</html>
