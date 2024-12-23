<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In to fixban</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white flex items-center justify-center min-h-screen">
    <div class="absolute top-4 left-4">
        <img alt="fixban logo with a tire and the text 'fixban' in red and black" h-32 src="{{ asset ('Logo fixban.png') }}" w-auto />
    </div>
    <form action="{{route ('SignUp')}}" method="GET">
        <div class="absolute top-4 right-4">
            <button class="border border-black px-4 py-2">SIGN UP</button>
        </div>
    </form>
    <div class="w-full max-w-md mx-auto bg-white shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Log In to fixban</h2>
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
                    <i class="fas fa-eye absolute right-3 top-3 text-gray-500 cursor-pointer" id="togglePassword"></i>
                </div>
            </div>
            <form action="{{ route('DashboardUser') }}">
                <div class="mb-6">
                    <button class="w-full bg-black text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Log In
                    </button>
                </div>
            </form>
            <a href="{{ route('oauth.google') }}" class="w-full block bg-black text-white font-bold py-2 px-4 rounded mt-2 text-center focus:outline-none focus:shadow-outline">
                Login with Google
            </a>
        </form>
    </div>

    <script>
        // Show/Hide Password Functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            // Toggle the password input type
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            // Toggle the eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>