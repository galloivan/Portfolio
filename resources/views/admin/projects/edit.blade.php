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

        /* Form Input Fields */
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

        /* Error Message Box */
        .error-box {
            background-color: #dc2626; /* Red */
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Image Preview */
        .image-preview {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #3b82f6;
        }

        /* Button Styling */
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
    </style>

    <!-- Content Wrapper -->
    <div class="container mx-auto pt-24 px-4">
        <div class="container-box">
            <h1 class="text-3xl font-semibold sky-text mb-6">Edit Project</h1>

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

            <!-- Edit Project Form -->
            <form
                action="{{ route('admin.projects.update', $project->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6"
            >
                @csrf
                @method('PUT')

                <!-- Title Input -->
                <div>
                    <label for="title" class="block text-lg font-semibold mb-2">Project Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $project->title) }}"
                        class="form-input"
                        required
                    >
                </div>

                <!-- Description Input -->
                <!-- English Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-300">{{ __('portfolio.project_description_en') }}</label>
                    <textarea name="description" id="description" class="w-full p-2 bg-gray-700 text-white rounded" required>{{ $project->description }}</textarea>
                </div>

                <!-- French Description -->
                <div class="mb-4">
                    <label for="description_fr" class="block text-gray-300">{{ __('portfolio.project_description_fr') }}</label>
                    <textarea name="description_fr" id="description_fr" class="w-full p-2 bg-gray-700 text-white rounded" required>{{ $project->description_fr }}</textarea>
                </div>
                <!-- URL Input -->
                <div>
                    <label for="url" class="block text-lg font-semibold mb-2">Project URL (optional)</label>
                    <input
                        type="text"
                        name="url"
                        id="url"
                        value="{{ old('url', $project->url) }}"
                        class="form-input"
                    >
                </div>

                <!-- Existing Image Preview -->
                @if($project->image)
                    <div class="mb-4">
                        <span class="block text-lg font-semibold mb-2">Current Image:</span>
                        <img
                            src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}"
                            class="image-preview"
                        >
                    </div>
                @endif


                <div>
                    <label for="image" class="block text-lg font-semibold mb-2">Change Project Image (optional)</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-input"
                        accept="image/*"
                    >
                </div>

                <!-- Submit Button -->
                <button type="submit" class="teal-btn">Update Project</button>
            </form>
        </div>
    </div>

@endsection
