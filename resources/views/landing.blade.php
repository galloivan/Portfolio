<!-- resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivan David Gallo Perez</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Your custom CSS if any -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        /* Overall background color */
        body {
            background-color: #1a202c; /* Navy Blue */
            color: #ffffff; /* White */
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        #about .text-container {
            margin-top: 200px;
            /* Adjust this value as needed */
        }

        /* Navbar gradient & styling */
        .navy-navbar {
            background: linear-gradient(90deg, #1a202c, #3b82f6);
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.5);
        }

        .sky-text {
            background: linear-gradient(90deg, #3b82f6, #14b8a6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(59, 130, 246, 0.7);
        }

        .teal-hover:hover {
            color: #14b8a6;
            text-shadow: 0px 0px 8px rgba(20, 184, 166, 1);
        }

        /* Teal Button */
        .teal-btn {
            background: linear-gradient(45deg, #3b82f6, #14b8a6);
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .teal-btn:hover {
            background: linear-gradient(45deg, #14b8a6, #3b82f6);
            box-shadow: 0px 0px 12px rgba(20, 184, 166, 0.9);
        }

        /* About Section => Full Width & Height */
        #about {
            width: 100vw; /* Full width of the viewport */
            height: 100vh; /* Full height of the viewport */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Review card styling (no swiper) */
        .review-slide {
            background: rgba(20, 184, 166, 0.1);
            color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(20, 184, 166, 0.3);
            max-width: 600px;
            margin: auto;
        }

        .project-card {
            width: 350px; /* Increase width */
            height: 500px; /* Increase height */
            background-color: #1a1a2e; /* Dark background */
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
        }

        .project-card:hover {
            transform: scale(1.05); /* Slight hover effect */
        }

        /* Project Image Styling */
        .project-card img {
            width: 100%;
            height: 250px; /* Adjust image height */
            object-fit: cover; /* Prevent stretching */
            border-radius: 10px;
        }

        /* Project Title */
        .project-card h3 {
            font-size: 22px;
            color: #3b82f6; /* Sky blue */
            margin-top: 15px;
        }

        /* Project Description */
        .project-card p {
            font-size: 18px;
            color: #ddd;
            margin-bottom: 15px;
        }

        /* Project Button */
        .view-project-btn {
            background: linear-gradient(to right, #3b82f6, #06b6d4);
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        .view-project-btn:hover {
            background: linear-gradient(to right, #06b6d4, #3b82f6);
            box-shadow: 0px 0px 12px rgba(20, 184, 166, 0.9);
        }

        /* Project Container */
        .project-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px; /* Add spacing between cards */
            justify-content: center; /* Center the cards */
            padding: 20px;
        }

        .review-rate {
            color: #3b82f6;
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* Footer styling */
        .footer {
            background: linear-gradient(90deg, #1a202c, #3b82f6);
            padding: 20px 0;
            box-shadow: 0 -4px 10px rgba(59, 130, 246, 0.5);
        }

        .footer a {
            color: #ffffff;
            transition: color 0.3s ease-in-out;
        }

        .footer a:hover {
            color: #14b8a6;
        }

        .social-icon {
            width: 24px;
            height: 24px;
            fill: #ffffff;
            transition: fill 0.3s ease-in-out;
        }

        .social-icon:hover {
            fill: #14b8a6;
        }

        /* Modal Styling */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(26, 32, 44, 0.85);
            display: none; /* Hidden by default */
            justify-content: center;
            align-items: center;
            z-index: 50;
        }

        .modal {
            background: #2d3748;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            color: #14b8a6;
            font-size: 1.5rem;
            cursor: pointer;
        }



    </style>
</head>
<body class="text-white">

<!-- Navbar -->
<header class="navy-navbar py-4 shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex justify-between items-center px-4">
        <!-- Logo / Name -->
        <h1 class="text-2xl sky-text">Ivan David Gallo Perez</h1>

        <!-- Desktop Navbar (Hidden on Small Screens) -->
        <nav class="hidden lg:flex space-x-6">
            <ul class="flex space-x-6 items-center">
                <li><a href="#about" class="hover:underline teal-hover">{{ __('portfolio.about') }}</a></li>
                <li><a href="#projects" class="hover:underline teal-hover">{{ __('portfolio.projects') }}</a></li>
                <li><a href="#skills" class="hover:underline teal-hover">{{ __('portfolio.skills') }}</a></li>
                <li><a href="#reviews" class="hover:underline teal-hover">{{ __('portfolio.reviews') }}</a></li>
                <li><a href="#contact" class="hover:underline teal-hover">{{ __('portfolio.contact') }}</a></li>

                <!-- GitHub -->
                <li>
                    <a href="https://github.com/galloivan" target="_blank" class="teal-hover flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="white" class="w-5 h-5">
                            <title>GitHub</title>
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.28 3.438 9.75 8.205 11.325.6.11.82-.258.82-.577 0-.285-.01-1.04-.016-2.04-3.338.725-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.758-1.333-1.758-1.087-.744 .084-.729 .084-.729 1.205 .084 1.84 1.24 1.84 1.24 1.07 1.836 2.807 1.304 3.495.997.107-.776.417-1.305.76-1.605-2.665-.305-5.466-1.333-5.466-5.93 0-1.31.47-2.38 1.236-3.22-.124-.303-.536-1.524 .118-3.176 0 0 1.01-.323 3.302 1.23a11.52 11.52 0 013.003-.405c1.018 .005 2.042.138 3.003 .405 2.29-1.552 3.3-1.23 3.3-1.23.656 1.653.244 2.874.12 3.176.77.84 1.236 1.91 1.236 3.22 0 4.61-2.807 5.625-5.48 5.92.43.37.81 1.1.81 2.22 0 1.606-.015 2.9-.015 3.29 0 .32 .215.69.82.57A12.01 12.01 0 0024 12.297C24 5.67 18.627.297 12 .297z"/>
                        </svg>
                        <span>GitHub</span>
                    </a>
                </li>

                <!-- LinkedIn -->
                <li>
                    <a href="https://www.linkedin.com/in/ivan-david-gallo-perez-06b07b328/" target="_blank" class="teal-hover flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="white" class="w-5 h-5">
                            <title>LinkedIn</title>
                            <path d="M19 0h-14a5 5 0 00-5 5v14a5 5 0 005 5h14a5 5 0 005-5V5a5 5 0 00-5-5zM8.339 18.339H5.664V9.435h2.675v8.904zM7.001 8.337a1.547 1.547 0 110-3.095 1.547 1.547 0 010 3.095zm12.338 10.002h-2.676v-4.583c0-1.093-.021-2.5-1.523-2.5-1.524 0-1.757 1.188-1.757 2.417v4.666h-2.675V9.435h2.568v1.216h.036c.358-.68 1.232-1.398 2.536-1.398 2.711 0 3.212 1.784 3.212 4.103v5.0z"/>
                        </svg>
                        <span>LinkedIn</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('login') }}" class="teal-btn px-4 py-2 font-semibold whitespace-nowrap">{{ __('portfolio.login') }}</a>
                </li>

                <!-- Language Toggle -->
                <div class="flex items-center space-x-2">
                    <span>FR</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="languageToggle" class="sr-only peer" {{ session('locale', 'fr') === 'en' ? 'checked' : '' }}>
                        <div class="w-12 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-teal-500">
                        </div>
                    </label>
                    <span>EN</span>
                </div>
            </ul>
        </nav>

        <!-- Hamburger Button (Visible on iPad Pro & smaller) -->
        <button id="menu-toggle" class="lg:hidden block text-white focus:outline-none">
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu (Initially Hidden) -->
    <nav id="mobile-menu" class="hidden absolute top-16 left-0 w-full bg-gray-900 text-white lg:hidden">
        <ul class="flex flex-col items-center space-y-4 py-6">
            <li><a href="#about" class="hover:underline teal-hover">{{ __('portfolio.about') }}</a></li>
            <li><a href="#projects" class="hover:underline teal-hover">{{ __('portfolio.projects') }}</a></li>
            <li><a href="#skills" class="hover:underline teal-hover">{{ __('portfolio.skills') }}</a></li>
            <li><a href="#reviews" class="hover:underline teal-hover">{{ __('portfolio.reviews') }}</a></li>
            <li><a href="#contact" class="hover:underline teal-hover">{{ __('portfolio.contact') }}</a></li>

            <!-- GitHub (Mobile) -->
            <li>
                <a href="https://github.com/galloivan" target="_blank" class="teal-hover flex items-center space-x-2">
                  Github
                </a>
            </li>

            <!-- LinkedIn (Mobile) -->
            <li>
                <a href="https://www.linkedin.com/in/ivan-david-gallo-perez-06b07b328/" target="_blank" class="teal-hover flex items-center space-x-2">
                  LinkedIn
                </a>
            </li>

            <!-- Log in Button (Mobile) -->
            <li>
                <a href="{{ route('login') }}" class="teal-btn px-4 py-2 font-semibold whitespace-nowrap">
                    {{ __('portfolio.login') }}
                </a>
            </li>

            <!-- Language Toggle (Mobile) -->
            <div class="flex items-center space-x-2">
                <span>FR</span>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="languageToggleMobile" class="sr-only peer" {{ session('locale', 'fr') === 'en' ? 'checked' : '' }}>
                    <div class="w-12 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-teal-500">
                    </div>
                </label>
                <span>EN</span>
            </div>
        </ul>
    </nav>
</header>

<!-- Toggle Script -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        let menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleDesktop = document.getElementById("languageToggle");
        const toggleMobile = document.getElementById("languageToggleMobile");

        function switchLanguage(toggle) {
            const newLang = toggle.checked ? "en" : "fr"; // Get selected language
            document.cookie = `locale=${newLang}; path=/`; // Store in cookie for persistence
            window.location.href = `/switch-language/${newLang}`; // Redirect to switch language
        }

        toggleDesktop.addEventListener("change", function () {
            switchLanguage(toggleDesktop);
        });

        toggleMobile.addEventListener("change", function () {
            switchLanguage(toggleMobile);
        });

        // Ensure toggle is set correctly after page reload
        const savedLang = document.cookie.replace(/(?:(?:^|.*;\s*)locale\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        if (savedLang === "en") {
            toggleDesktop.checked = true;
            toggleMobile.checked = true;
        } else {
            toggleDesktop.checked = false;
            toggleMobile.checked = false;
        }
    });
</script>

<!-- ABOUT SECTION (Full Screen) -->
<section id="about" class="relative flex items-center justify-center min-h-[120vh] bg-cover bg-center"
         style="background-image: url('{{ asset('images/me.jpg') }}');">
    <!-- If navbar is fixed, add top padding or margin to avoid overlap if needed -->
    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
    <div class="relative text-center max-w-2xl px-6">
        <div class="relative text-container text-center max-w-2xl px-10">
            <h2 class="text-4xl font-bold">
                {{ __('portfolio.intro_title') }}
            </h2>

            <!-- Intro Paragraph (Mock Data) -->
            <p class="text-xl mt-4">
                {{ __('portfolio.intro') }}
            </p>

            <!-- Passion Paragraph (Mock Data) -->
            <p class="text-lg mt-6">
                {{ __('portfolio.passion') }}
            </p>

        </div>
        <div class="mt-6">
            <label for="cv-language"
                   class="block text-lg font-semibold text-gray-300"> {{ __('portfolio.select_cv_language') }}</label>
            <select id="cv-language"
                    class="w-full p-2 mt-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-sky-500">
                <option value="cv_french.pdf"> {{ __('portfolio.cv_french') }}</option>
                <option value="cv_english.pdf"> {{ __('portfolio.cv_english') }}</option>
            </select>

            <button id="download-cv" class="teal-btn mt-4 w-full">
                {{ __('portfolio.download_cv') }}
            </button>
        </div>

        <!-- JavaScript to Handle Download -->
        <script>
            document.getElementById('download-cv').addEventListener('click', function () {
                const selectedCV = document.getElementById('cv-language').value;
                const downloadLink = `/cv/${selectedCV}`;

                // Trigger the download
                window.location.href = downloadLink;
            });
        </script>
    </div>
</section>

<!-- MAIN CONTENT (Projects, Reviews, Contact) inside container -->
<main class="container mx-auto mt-4 px-4">
    <!-- Projects Section -->
    <section id="projects" class="mt-4">
        <h2 class="text-3xl font-semibold mb-8 text-center sky-text"> {{ __('portfolio.projects') }}</h2>

        <!-- Projects Swiper (manual arrow nav) -->
        <div class="swiper-container-projects relative">
            <div class="swiper-wrapper">
                @foreach ($projects as $project)
                    <div class="swiper-slide flex justify-center">
                        <div class="bg-gray-800 text-white shadow-lg p-6 rounded-lg flex flex-col items-center w-[400px] h-[550px]">

                            {{-- Display Project Image --}}
                            @if ($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}"
                                     alt="{{ $project->title }}"
                                     class="project-image w-full h-[250px] object-cover rounded-md">
                            @endif

                            <h3 class="text-xl font-bold sky-text text-center mt-4">{{ $project->title }}</h3>

                            <p class="text-gray-300 mt-2 text-center text-sm">
                                {{ \Illuminate\Support\Str::limit(app()->getLocale() === 'fr' ? $project->description_fr : $project->description, 10000) }}
                            </p>

                            @if ($project->url)
                                <a href="{{ $project->url }}" target="_blank"
                                   class="teal-btn mt-4 inline-block px-6 py-2">
                                    {{ __('portfolio.view_project') }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Skills Section -->
    <section id="skills" class="mt-4 text-center">
        <h2 class="text-3xl font-semibold sky-text"> {{ __('portfolio.skills') }}</h2>
        <p class="text-gray-300 mt-4"> {{ __('portfolio.skills_intro') }}</p>

        <div class="flex flex-wrap justify-center gap-6 mt-8">
            @foreach ($skills as $skill)
                <div class="flex flex-col items-center">
                    @if ($skill->icon)
                        <img src="{{ asset('storage/' . $skill->icon) }}"
                             alt="{{ $skill->name }}"
                             class="w-[200px] h-[200px] object-contain">
                    @endif
                    <h3 class="text-lg font-semibold mt-1 text-white">{{ $skill->name }}</h3>
                </div>
            @endforeach
        </div>
    </section>


    <!-- Reviews Section (Automatic Carousel) -->
    <section id="reviews" class="mt-4 text-center">
        <h2 class="text-2xl font-semibold sky-text"> {{ __('portfolio.reviews') }}</h2>
        <p class="text-gray-300 mt-4"> {{ __('portfolio.reviews_intro') }}</p>

        <!-- Add Review Button -->
        <div class="mt-8">
            <button id="open-modal" class="teal-btn"> {{ __('portfolio.add_review') }}</button>
        </div>

        <!-- Reviews Swiper Carousel -->
        <div class="swiper-container-reviews relative mt-8">
            <div class="swiper-wrapper">
                @foreach ($approvedReviews as $review)
                    <div class="swiper-slide flex justify-center">
                        <div class="bg-gray-800 text-white shadow-lg p-6 rounded-lg w-64">
                            <h3 class="text-xl font-bold sky-text">{{ $review->title }}</h3>
                            <p class="text-gray-300 mt-2">{{ $review->description }}</p>
                            <div class="mt-4">
                                <span
                                    class="review-rate">{{ __('portfolio.review_rating2') }} {{ $review->rate }}/10</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--    @if(session('reviewSubmitted'))--}}
    {{--        <div class="bg-teal-500 text-white p-4 rounded mb-6">--}}
    {{--            {{ session('success') }}--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <!-- Contact Section -->
    <section id="contact" class="mt-8 mb-12 text-center">
        <h2 class="text-2xl font-semibold sky-text"> {{ __('portfolio.contact') }}</h2>
        <p class="text-gray-300 mt-4"> {{ __('portfolio.contact_intro') }}</p>

        <div class="max-w-lg mx-auto mt-8">
            {{--            <!-- Success Message -->--}}
            {{--            @if(session('success'))--}}
            {{--                <div class="bg-teal-500 text-white p-4 rounded mb-6">--}}
            {{--                    {{ session('success') }}--}}
            {{--                </div>--}}
            {{--            @endif--}}

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-left text-gray-300"> {{ __('portfolio.name') }}</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full p-2 mt-1 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-sky-500"
                    />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-left text-gray-300"> {{ __('portfolio.email') }}</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full p-2 mt-1 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-sky-500"
                    />
                </div>

                <div class="mb-4">
                    <label for="subject" class="block text-left text-gray-300"> {{ __('portfolio.subject') }}</label>
                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        value="{{ old('subject') }}"
                        required
                        class="w-full p-2 mt-1 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-sky-500"
                    />
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-left text-gray-300"> {{ __('portfolio.message') }}</label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        required
                        class="w-full p-2 mt-1 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-sky-500"
                    >{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="teal-btn w-full">
                    {{ __('portfolio.send_message') }}
                </button>
            </form>
        </div>
    </section>

</main>

<!-- Footer -->
<footer class="navy-navbar py-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center px-4">

        <p class="text-sm">&copy; {{ date('Y') }} Ivan David Gallo Perez. All rights reserved.</p>


        <nav>
            <ul class="flex space-x-6 items-center">


                <!-- GitHub -->
                <li>
                    <a
                        href="https://github.com/galloivan"
                        target="_blank"
                        class="teal-hover flex items-center space-x-2"
                    >
                        <!-- GitHub Icon -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            role="img"
                            viewBox="0 0 24 24"
                            fill="white"
                            class="w-5 h-5"
                        >
                            <title>GitHub</title>
                            <path
                                d="M12 .297c-6.63 0-12
                                5.373-12 12 0 5.28 3.438
                                9.75 8.205 11.325.6.11.82
                                -.258.82-.577 0-.285-.01
                                -1.04-.016-2.04-3.338.725
                                -4.042-1.61-4.042-1.61
                                -.546-1.387-1.333-1.758
                                -1.333-1.758-1.087-.744
                                .084-.729.084-.729 1.205
                                .084 1.84 1.24 1.84 1.24
                                1.07 1.836 2.807 1.304
                                3.495.997.107-.776.417
                                -1.305.76-1.605-2.665
                                -.305-5.466-1.333-5.466
                                -5.93 0-1.31.47-2.38 1.236
                                -3.22-.124-.303-.536-1.524
                                .118-3.176 0 0 1.01
                                -.323 3.302 1.23a11.52
                                11.52 0 013.003-.405c1.018
                                .005 2.042.138 3.003
                                .405 2.29-1.552 3.3-1.23
                                3.3-1.23.656 1.653.244
                                2.874.12 3.176.77.84
                                1.236 1.91 1.236 3.22
                                0 4.61-2.807 5.625-5.48
                                5.92.43.37.81 1.1.81
                                2.22 0 1.606-.015
                                2.9-.015 3.29 0 .32
                                .215.69.82.57A12.01
                                12.01 0 0024 12.297C24
                                5.67 18.627.297 12
                                .297z"
                            />
                        </svg>
                        <span>GitHub</span>
                    </a>
                </li>

                <!-- LinkedIn -->
                <li>
                    <a
                        href="https://www.linkedin.com/in/ivan-david-gallo-perez-06b07b328/"
                        target="_blank"
                        class="teal-hover flex items-center space-x-2"
                    >
                        <!-- LinkedIn Icon -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            role="img"
                            viewBox="0 0 24 24"
                            fill="white"
                            class="w-5 h-5"
                        >
                            <title>LinkedIn</title>
                            <path
                                d="M19 0h-14a5 5 0
                                00-5 5v14a5 5 0 005 5h14a5
                                5 0 005-5V5a5 5 0 00-5-5zM8.339
                                18.339H5.664V9.435h2.675v8.904zM7.001
                                8.337a1.547 1.547 0 110-3.095
                                1.547 1.547 0 010 3.095zm12.338
                                10.002h-2.676v-4.583c0-1.093-.021
                                -2.5-1.523-2.5-1.524 0-1.757
                                1.188-1.757 2.417v4.666h-2.675
                                V9.435h2.568v1.216h.036c.358-.68
                                1.232-1.398 2.536-1.398 2.711 0
                                3.212 1.784 3.212 4.103v5.0z"
                            />
                        </svg>
                        <span>LinkedIn</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</footer>

<!-- Modal Overlay -->
<div id="modal-overlay" class="modal-overlay">
    <div class="modal">
        <button id="close-modal" class="modal-close">&times;</button>
        <h2 class="text-2xl font-semibold sky-text mb-4"> {{ __('portfolio.add_review') }}</h2>
        <form id="add-review-form" action="{{ route('reviews.store') }}" method="POST"
              class="bg-gray-800 p-4 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="review-title"
                       class="block text-left text-gray-300">{{ __('portfolio.review_title') }}</label>
                <input
                    type="text"
                    id="review-title"
                    name="title"
                    required
                    class="w-full p-2 mt-1 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-sky-500"
                />
            </div>
            <div class="mb-4">
                <label for="review-description"
                       class="block text-left text-gray-300">{{ __('portfolio.review_description') }}</label>
                <textarea
                    id="review-description"
                    name="description"
                    rows="4"
                    required
                    class="w-full p-2 mt-1 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-sky-500"
                ></textarea>
            </div>
            <div class="mb-4">
                <label for="review-rate"
                       class="block text-left text-gray-300">{{ __('portfolio.review_rating') }}</label>
                <input
                    type="number"
                    id="review-rate"
                    name="rate"
                    min="1"
                    max="10"
                    required
                    class="w-full p-2 mt-1 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-sky-500"
                />
            </div>
            <button type="submit" class="teal-btn w-full">{{ __('portfolio.review_submit') }}</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Projects Swiper instance (your existing code)
        var projectSwiper = new Swiper('.swiper-container-projects', {
            loop: true,
            speed: 800,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            slidesPerView: 3,
            slidesPerGroup: 1,
            spaceBetween: 20,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                },
                768: {
                    slidesPerView: 2,
                    slidesPerGroup: 1,
                },
                1024: {
                    slidesPerView: 3,
                    slidesPerGroup: 1,
                }
            }
        });

        // Reviews Swiper instance for automatic carousel
        var reviewSwiper = new Swiper('.swiper-container-reviews', {
            loop: true,
            speed: 800,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            slidesPerView: 1, // Adjust as needed for different screen sizes
            spaceBetween: 20,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });

        // REVIEW MODAL FUNCTIONALITY (for adding a review)
        const openModalButton = document.getElementById('open-modal');
        const closeModalButton = document.getElementById('close-modal');
        const modalOverlay = document.getElementById('modal-overlay');

        openModalButton.addEventListener('click', () => {
            modalOverlay.style.display = 'flex';
        });

        closeModalButton.addEventListener('click', () => {
            modalOverlay.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modalOverlay) {
                modalOverlay.style.display = 'none';
            }
        });

        const addReviewForm = document.getElementById('add-review-form');
        addReviewForm.addEventListener('submit', (event) => {

        });
    });


    document.getElementById('download-cv').addEventListener('click', function () {
        const selectedCV = document.getElementById('cv-language').value;
        const downloadLink = `/cv/${selectedCV}`;

        // Trigger the download
        window.location.href = downloadLink;
    });

</script>

</body>
</html>

