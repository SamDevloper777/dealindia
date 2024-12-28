<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <title>@yield('title') | Real India</title>

    <style>
        .roboto-medium {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        body {
            font-family: "Roboto", sans-serif;
        }
    </style>
</head>

<body>
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">Deal India</a>
            <ul class="flex space-x-4">
                <li><a href="#services" class="hover:underline">Services</a></li>
                <li><a href="#services" class="hover:underline">Register</a></li>
                <li><a href="#about" class="hover:underline">About Us</a></li>
                <li><a href="#contact" class="hover:underline">Contact</a></li>
            </ul>
        </div>
    </nav>
    <div class="min-h-screen flex bg-gray-100">
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-gray-200 text-center py-20">
                <h1 class="text-4xl font-bold mb-4">Welcome to Real India</h1>
                <p class="text-lg mb-6">Your trusted partner in financial solutions.</p>
                <a href="/login" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Start Now</a>
            </header>

            <!-- Dashboard Content -->

            <div class="md:mt-20 mt-8">
                @yield('content')
            @show
        </div>

        <footer class="bg-blue-600 text-white text-center py-4">
            <p>&copy; {{ date('Y') }} Real India. All rights reserved.</p>
        </footer>

    </div>
</div>

</body>

</html>
