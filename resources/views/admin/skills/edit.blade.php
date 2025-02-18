@extends('layouts.admin')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Edit Skill</title>


    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body {
            background-color: #1a202c;
            color: #ffffff;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }


        .navy-navbar {
            background: linear-gradient(90deg, #1a202c, #3b82f6);
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.5);
            padding: 16px;
        }


        .sky-text {
            background: linear-gradient(90deg, #3b82f6, #14b8a6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(59, 130, 246, 0.7);
        }


        .teal-btn {
            background: linear-gradient(45deg, #3b82f6, #14b8a6);
            color: white;
            padding: 10px 18px;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .teal-btn:hover {
            background: linear-gradient(45deg, #14b8a6, #3b82f6);
            box-shadow: 0px 0px 12px rgba(20, 184, 166, 0.9);
        }


        .styled-form {
            background-color: #2d3748;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            margin: auto;
        }

        .styled-form label {
            font-weight: bold;
        }

        .styled-form input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-top: 5px;
            background-color: #4a5568;
            color: white;
        }

        .styled-form input:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(20, 184, 166, 0.9);
        }

        .error-message {
            background-color: #e53e3e;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>


<header class="navy-navbar shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-2xl font-bold sky-text">Admin Dashboard | Edit Skill</h1>
    </div>
</header>


<main class="container mx-auto pt-24 px-6">


    <h1 class="text-3xl font-bold sky-text text-center mb-6">Edit Skill</h1>


    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST" class="styled-form">
        @csrf
        @method('PUT')


        <div class="mb-4">
            <label for="name">Skill Name</label>
            <input type="text" name="name" id="name" value="{{ $skill->name }}" required>
        </div>


        <div class="mb-4">
            <label for="icon">Skill Icon Path (or URL)</label>
            <input type="text" name="icon" id="icon" value="{{ $skill->icon }}" required>
        </div>


        <div class="text-center">
            <button type="submit" class="teal-btn px-6 py-2">Update Skill</button>
        </div>
    </form>

</main>

</body>
</html>

@endsection
