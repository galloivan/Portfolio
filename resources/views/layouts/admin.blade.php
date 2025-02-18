<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
<header class="bg-blue-600 text-white p-4">
    <div class="container mx-auto">
        <h1 class="text-xl font-bold">Admin Dashbord</h1>
    </div>
</header>
<main class="container mx-auto p-6">
    @yield('content')
</main>

</body>
</html>
