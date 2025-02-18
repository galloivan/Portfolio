@extends('layouts.admin')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Manage Your Projects</title>


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

        /* Button */
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

        /* Table Styling */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            background-color: #2d3748;
        }

        .styled-table th, .styled-table td {
            padding: 12px 15px;
            text-align: left;
        }

        .styled-table thead {
            background-color: #3b82f6;
            color: white;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #4a5568;
        }

        .styled-table tbody tr:hover {
            background-color: #2d3748;
            transition: 0.3s;
        }

        /* Table Actions */
        .edit-btn {
            background-color: #3b82f6;
            padding: 6px 12px;
            border-radius: 5px;
            color: white;
            transition: 0.3s;
        }

        .edit-btn:hover {
            background-color: #2563eb;
        }

        .delete-btn {
            background-color: #e53e3e;
            padding: 6px 12px;
            border-radius: 5px;
            color: white;
            transition: 0.3s;
        }

        .delete-btn:hover {
            background-color: #c53030;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<header class="navy-navbar shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-2xl font-bold sky-text">Admin Dashboard | Manage Your Projects</h1>
    </div>
</header>

<!-- Page Content -->
<main class="container mx-auto pt-24 px-6">



    <!-- Page Title & Add Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold sky-text">Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="teal-btn shadow-md">
            + Add New Project
        </a>
    </div>

    <!-- Projects Table -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <table class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="edit-btn">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure?');"
                              class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</main>

</body>
</html>

@endsection
