<!-- resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
<header class="bg-blue-500 text-white py-4">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold">My Portfolio</h1>
    </div>
</header>

<main class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-4">Projects:</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($projects as $project)
            <div class="bg-white shadow p-4 rounded">
                <h3 class="text-lg font-bold">{{ $project->title }}</h3>
                <p class="text-gray-600">{{ $project->description }}</p>
                @if ($project->url)
                    <a href="{{ $project->url }}" target="_blank" class="text-blue-500 mt-2 inline-block">
                        View Project
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</main>
</body>
</html>
