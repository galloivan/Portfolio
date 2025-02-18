<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>


    <script src="https://cdn.tailwindcss.com"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body { background-color: #1a202c; color: #ffffff; margin: 0; padding: 0; overflow-x: hidden; }
        .navy-navbar { background: linear-gradient(90deg, #1a202c, #3b82f6); box-shadow: 0 4px 10px rgba(59, 130, 246, 0.5); }
        .sky-text { background: linear-gradient(90deg, #3b82f6, #14b8a6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold; text-shadow: 1px 1px 5px rgba(59, 130, 246, 0.7); }
        .teal-btn { background: linear-gradient(45deg, #3b82f6, #14b8a6); color: white; padding: 8px 16px; border-radius: 5px; font-weight: bold; transition: all 0.3s ease-in-out; }
        .teal-btn:hover { background: linear-gradient(45deg, #14b8a6, #3b82f6); box-shadow: 0px 0px 12px rgba(20, 184, 166, 0.9); }
        @media (max-width: 1024px) {
            .navy-navbar {
                flex-direction: column;
                text-align: center;
                padding: 10px 20px;
            }

            .sky-text {
                font-size: 22px;
                margin-bottom: 10px;
            }

            .teal-btn {
                padding: 10px 18px;
                font-size: 14px;
            }
        }

        /* 📌 For Mobile Devices (Phones, less than 768px) */
        @media (max-width: 768px) {
            .navy-navbar {
                flex-direction: column;
                padding: 15px;
                text-align: center;
            }

            .sky-text {
                font-size: 20px;
                text-align: center;
            }

            .teal-btn {
                padding: 10px 16px;
                font-size: 14px;
                width: 100%; /* Full width buttons on mobile */
            }
        }

        /* 📌 For Small Phones (less than 480px) */
        @media (max-width: 480px) {
            .sky-text {
                font-size: 18px;
            }

            .teal-btn {
                font-size: 12px;
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body class="text-white">

<header class="navy-navbar py-4 shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-2xl sky-text">Admin Dashboard</h1>


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="teal-btn px-6 py-2">
                Logout
            </button>
        </form>
    </div>
</header>




<main class="container mx-auto pt-24 px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 px-8">


        <section class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold sky-text mb-4">Projects</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach ($projects as $project)
                    <div class="bg-gray-700 p-4 rounded-lg shadow-md w-[350px] h-[450px]">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-[250px] object-cover rounded-md">
                        @endif
                        <h3 class="text-xl font-bold mt-4">{{ $project->title }}</h3>
                        <p class="text-gray-300 text-sm mt-2">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('admin.projects.index') }}" class="teal-btn px-6 py-2">Manage Projects</a>
            </div>
        </section>


        <section class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold sky-text mb-4">Skills</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach ($skills as $skill)
                    <div class="flex flex-col items-center">
                        @if ($skill->icon)
                            <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="w-[150px] h-[150px] object-contain">
                        @endif
                        <h3 class="text-lg font-semibold mt-2 text-white">{{ $skill->name }}</h3>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('admin.skills.index') }}" class="teal-btn px-6 py-2">Manage Skills</a>
            </div>
        </section>

        <section class="bg-gray-800 p-6 rounded-lg shadow-lg mt-8">
            <h2 class="text-3xl font-semibold sky-text mb-4">Manage Reviews</h2>

            <!-- PENDING REVIEWS SECTION -->
            <h3 class="text-2xl font-semibold text-red-400 mb-2 text-black ">Pending Reviews</h3>
            <table class="min-w-full bg-white border border-gray-200 text-black">
                <thead>
                <tr class="bg-gray-200 text-black">
                    <th class="py-2 px-4 border">Title</th>
                    <th class="py-2 px-4 border">Description</th>
                    <th class="py-2 px-4 border">Rating</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pendingReviews as $review)
                    <tr id="review-{{ $review->id }}" class="border-t">
                        <td class="py-2 px-4 border">{{ $review->title }}</td>
                        <td class="py-2 px-4 border">{{ Str::limit($review->description, 50) }}</td>
                        <td class="py-2 px-4 border">{{ $review->rate }}/10</td>
                        <td class="py-2 px-4 border flex gap-2">
                            <button onclick="approveReview({{ $review->id }})"
                                    class="approve-btn bg-blue-500 text-white py-1 px-2 rounded">
                                Approve
                            </button>
                            <button onclick="confirmDelete({{ $review->id }})"
                                    class="bg-red-500 text-white py-1 px-2 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            <h3 class="text-2xl font-semibold text-green-400 mt-6 mb-2  text-black" >Approved Reviews</h3>
            <table class="min-w-full bg-white border border-gray-200 text-black">
                <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">Title</th>
                    <th class="py-2 px-4 border">Description</th>
                    <th class="py-2 px-4 border">Rating</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
                </thead>
                <tbody id="approved-reviews-body">
                @foreach ($approvedReviews as $review)
                    <tr id="review-{{ $review->id }}" class="border-t  text-black">
                        <td class="py-2 px-4 border">{{ $review->title }}</td>
                        <td class="py-2 px-4 border">{{ Str::limit($review->description, 50) }}</td>
                        <td class="py-2 px-4 border">{{ $review->rate }}/10</td>
                        <td class="py-2 px-4 border flex gap-2">
                            <button onclick="confirmDelete({{ $review->id }})" class="bg-red-500 text-white py-1 px-2 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>


        <div id="deleteModal" class="modal hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-bold text-gray-800">Confirm Deletion</h2>
                <p class="text-gray-600 mt-2">Are you sure you want to delete this review?</p>
                <div class="mt-4 flex justify-center gap-4">
                    <button onclick="deleteReview()" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    <button onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                </div>
            </div>
        </div>

        <script>
            let reviewToDelete = null;

            function confirmDelete(reviewId) {
                reviewToDelete = reviewId;
                document.getElementById('deleteModal').classList.remove('hidden');
            }


            function deleteReview() {
                if (!reviewToDelete) return;

                fetch(`/admin/reviews/${reviewToDelete}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Failed to delete review");
                        }
                        return response.json();
                    })
                    .then(() => {

                        const reviewRow = document.getElementById(`review-${reviewToDelete}`);
                        if (reviewRow) reviewRow.remove();


                        alert("Review deleted successfully!");
                    })
                    .catch(error => {
                        console.error(error);
                        alert(error.message);
                    })
                    .finally(() => {
                        closeModal();
                    });
            }


            function closeModal() {
                document.getElementById('deleteModal').classList.add('hidden');
                reviewToDelete = null;
            }


            function approveReview(reviewId) {
                const approveButton = document.querySelector(`#review-${reviewId} .approve-btn`);
                if (approveButton) {
                    approveButton.disabled = true;
                    approveButton.textContent = "Approving...";
                }

                fetch(`/admin/reviews/${reviewId}/approve`, {
                    method: "PATCH",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    } ,   body: JSON.stringify({})
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => { throw new Error(err.error || "Failed to approve review"); });
                        }
                        return response.json();
                    })
                    .then(() => {

                        const reviewRow = document.getElementById(`review-${reviewId}`);
                        if (reviewRow) {
                            document.getElementById("approved-reviews-body").appendChild(reviewRow);

                            // Remove approve button after approval
                            const approveBtn = reviewRow.querySelector(".approve-btn");
                            if (approveBtn) approveBtn.remove();

                            alert("Review approved successfully!");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert(error.message);
                        if (approveButton) {
                            approveButton.disabled = false;
                            approveButton.textContent = "Approve";
                        }
                    });
            }
        </script>


        <section class="bg-gray-800 p-6 rounded-lg shadow-lg mt-8">
            <h2 class="text-3xl font-semibold sky-text mb-4">Manage CV</h2>


            <div class="text-center mb-6">
                <h3 class="text-lg font-semibold">Current CVs:</h3>

                @isset($cvEnglish)
                    <p>
                        <a href="{{ $cvEnglish }}" target="_blank" class="teal-btn mb-4 inline-block">
                            Download CV (English)
                        </a>
                    </p>
                @endisset

                @isset($cvFrench)
                    <p>
                        <a href="{{ $cvFrench }}" target="_blank" class="teal-btn inline-block">
                            Download CV (French)
                        </a>
                    </p>
                @endisset
            </div>


            <form action="{{ route('admin.cv.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="language" class="block mb-2 text-lg font-semibold">Select CV Language to Replace:</label>
                <select name="language" id="language" class="w-full p-2 bg-gray-700 text-white rounded">
                    <option value="english">English</option>
                    <option value="french">French</option>
                </select>

                <label for="cv" class="block mt-4 mb-2 text-lg font-semibold">Upload New CV (PDF only):</label>
                <input type="file" name="cv" id="cv" accept="application/pdf" required class="w-full p-2 bg-gray-700 text-white rounded">

                <button type="submit" class="teal-btn w-full mt-4">Update CV</button>
            </form>
        </section>
    </div>
</main>
</body>
</html>
