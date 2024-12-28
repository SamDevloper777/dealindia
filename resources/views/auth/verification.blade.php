<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login {{ env('APP_NAME') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    @if (session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert" id="success-alert">
    <span class="block sm:inline">{{ session('success') }}</span>
    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close" onclick="document.getElementById('success-alert').classList.add('hidden')">
        <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.415l2.935-2.934-2.935-2.934a1 1 0 011.415-1.415l2.934 2.935 2.934-2.935a1 1 0 011.415 1.415l-2.935 2.934 2.935 2.934a1 1 0 010 1.415z"/>
        </svg>
    </button>
</div>
@endif

@if (session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert" id="error-alert">
    <span class="block sm:inline">{{ session('error') }}</span>
    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close" onclick="document.getElementById('error-alert').classList.add('hidden')">
        <svg class="fill-current h-6 w-6 text-red-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.415l2.935-2.934-2.935-2.934a1 1 0 011.415-1.415l2.934 2.935 2.934-2.935a1 1 0 011.415 1.415l-2.935 2.934 2.935 2.934a1 1 0 010 1.415z"/>
        </svg>
    </button>
</div>
@endif

<script>
    // Automatically hide success alert after 5 seconds
    setTimeout(() => {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.classList.add('hidden');
        }
    }, 5000);

    // Automatically hide error alert after 5 seconds (optional)
    setTimeout(() => {
        const errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            errorAlert.classList.add('hidden');
        }
    }, 3000);
</script>


    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Admin Login</h2>

            <!-- Display Validation Errors -->
            {{-- @if ($errors->any())
                <div class="mb-4">
                    <div class="text-red-600 font-medium">Whoops! Something went wrong.</div>
                    <ul class="mt-2 text-sm text-red-600">
                    </ul>
                </div>
            @endif --}}

            <!-- Login Form -->
            <form method="POST" action="/verify-otp">
                @csrf
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
               
                <div class="mb-4">
                    <label for="otp" class="block text-sm font-medium text-gray-700">Enter Your Otp</label>
                    <input id="otp" type="number" name="otp" value="" required autofocus
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Verify otp
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
