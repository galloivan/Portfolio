<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - MyApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">
<div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Log in</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="block mb-1 text-sm">Username</label>
            <input
                type="text"
                name="username"
                id="username"
                required
                class="w-full p-2 rounded bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter username"
            />
        </div>
        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block mb-1 text-sm">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                required
                class="w-full p-2 rounded bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter password"
            />
        </div>
        <!-- Submit -->
        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 transition-colors p-2 rounded font-bold"
        >
            Log In
        </button>
    </form>

</div>
</body>
</html>
