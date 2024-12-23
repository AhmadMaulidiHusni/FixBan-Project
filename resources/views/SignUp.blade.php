<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>fixban Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white flex items-center justify-center min-h-screen">
    <div class="absolute top-0 left-0 p-4">
        <img alt="fixban logo with a tire and the text 'fixban' in red and black" h-32 src="{{ asset ('Logo fixban.png') }}" w-auto />
    </div>
    <form action="{{ route('Dashboard') }}" method="GET">
        <div class="absolute top-0 right-0 p-4">
            <button class="border border-black px-4 py-2">LOGIN</button>
        </div>
    </form>
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-center mb-6">Sign Up to fixban</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="flex space-x-4 mb-4">
                <input class="border border-gray-400 p-2 w-full" placeholder="Name" name="name" type="text" required />
            </div>
            <div class="mb-4">
                <input class="border border-gray-400 p-2 w-full" placeholder="EMAIL ADDRESS" name="email" type="email" required />
            </div>
            <div class="mb-4 relative">
                <input class="border border-gray-400 p-2 w-full" placeholder="NEW PASSWORD" id="password" name="password" type="password" required />
                <i class="fas fa-eye absolute right-3 top-3 text-gray-500 cursor-pointer" id="togglePassword"></i>
            </div>
            <button class="bg-black text-white w-full py-2" type="submit">Sign Up</button>
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