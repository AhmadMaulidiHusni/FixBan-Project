<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In to FixBan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white flex items-center justify-center min-h-screen">
    <div class="absolute top-4 left-4">
        <img alt="FixBan logo with a tire and the text 'FixBan' in red and black" h-32 src="{{ asset ('Logo FixBan.png') }}" w-auto />
    </div>
    <form action="{{route ('SignUp')}}" method="GET">
        <div class="absolute top-4 right-4">
            <button class="border border-black px-4 py-2">SIGN UP</button>
        </div>
    </form>
    <div class="w-full max-w-md mx-auto bg-white shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Log In to FixBan</h2>
        <form action="{{route ('login')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">EMAIL ADDRESS</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" placeholder="example@gmail.com" type="email" required />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">PASSWORD</label>
                <div class="relative">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" placeholder="**********" type="password" required />
                    <i class="fas fa-eye absolute right-3 top-3 text-gray-500"></i>
                </div>
            </div>
            <!-- Dropdown Pilihan User atau Admin -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input class="mr-2 leading-tight" type="checkbox" />
                    <span class="text-sm">Remember Me</span>
                </label>
                <a class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800" href="#">
                    Forgot Password?
                </a>
            </div>
            <div class="mb-6">
                <button class="w-full bg-black text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Log In
                </button>
            </div>
            <a href="{{ route('oauth.google') }}" style="margin-top: 0px !important;background: #C84130;color: #ffffff;padding: 8px;border-radius:6px;" class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white text-center uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4">
                <strong>Login with Google</strong>
            </a>
        </form>
    </div>
</body>

</html>