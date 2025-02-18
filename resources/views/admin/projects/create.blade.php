@extends('layouts.admin')

@section('content')


    <style>

        body {
            background-color: #1a202c;
            color: #ffffff;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }


        .container-box {
            background-color: #1a1a2e;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }


        .sky-text {
            background: linear-gradient(90deg, #3b82f6, #14b8a6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(59, 130, 246, 0.7);
        }

        /* Form Fields */
        .form-input {
            width: 100%;
            padding: 10px;
            background-color: #2d3748;
            color: white;
            border-radius: 8px;
            border: 1px solid #3b82f6;
            transition: all 0.3s ease-in-out;
        }

        .form-input:focus {
            outline: none;
            box-shadow: 0px 0px 10px rgba(59, 130, 246, 0.8);
        }

        /* Submit Button */
        .teal-btn {
            background: linear-gradient(45deg, #3b82f6, #14b8a6);
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            display: inline-block;
            text-align: center;
            width: 100%;
        }

        .teal-btn:hover {
            background: linear-gradient(45deg, #14b8a6, #3b82f6);
            box-shadow: 0px 0px 12px rgba(20, 184, 166, 0.9);
        }

        /* Error Messages */
        .error-box {
            background-color: #dc2626; /* Red */
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>

    <!-- Content Wrapper -->
    <div class="container mx-auto pt-24 px-4">
        <div class="container-box">
            <h1 class="text-3xl font-semibold sky-text mb-6">Add New Project</h1>

            <!-- Display Validation Errors -->
            @if($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form to Create a New Project -->
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label for="title" class="block text-lg font-semibold mb-2">Project Title</label>
                    <input type="text" name="title" id="title" required class="form-input">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-300">Project Description (English)</label>
                    <textarea name="description" id="description" class="w-full p-2 bg-gray-700 text-white rounded" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="description_fr" class="block text-gray-300">Project Description (French)</label>
                    <textarea name="description_fr" id="description_fr" class="w-full p-2 bg-gray-700 text-white rounded" required></textarea>
                </div>

                <div>
                    <label for="url" class="block text-lg font-semibold mb-2">Project URL (optional)</label>
                    <input type="text" name="url" id="url" class="form-input">
                </div>

                <div>
                    <label for="image" class="block text-lg font-semibold mb-2">Project Image (optional)</label>
                    <input type="file" name="image" id="image" class="form-input">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="teal-btn">Create Project</button>
            </form>
        </div>
    </div>

@endsection
