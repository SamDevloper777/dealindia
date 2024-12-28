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
    <div class="min-h-screen flex bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md ">
            <div class="p-4">
                <h1 class="text-xl font-bold text-gray-800">Real India</h1>
            </div>
            <nav class="mt-6">
                <a href="" class="block py-2 px-8 text-gray-700 hover:bg-gray-200">
                    Dashboard
                </a>
                <a href="{{ url('/hirer/job-post') }}" class="block py-2 px-8 text-gray-700 hover:bg-gray-200">
                    Recent Applications
                </a>
                <a href="{{ url('/hirer/applications') }}" class="block py-2 px-8 text-gray-700 hover:bg-gray-200">
                   Approved Applications
                </a>
                <a href="{{ url('/hirer/applications') }}" class="block py-2 px-8 text-gray-700 hover:bg-gray-200">
                   Pending Applications
                </a>
                <a href="#" class="block py-2 px-8 text-gray-700 hover:bg-gray-200">
                    Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold">Admin Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <p>Welcome Roni</p>
                    <form id="logout-form" action="" method="POST" class="inline-block">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Dashboard Content -->

            <div class="md:mt-20 mt-8">
                @yield('content')
            @show
        </div>

    </div>
</div>

</body>

</html>
