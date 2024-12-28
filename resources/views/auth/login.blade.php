<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login {{ env('APP_NAME') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

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
            <form method="POST" action="">
                @csrf
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Log in
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <a href="{{ url('register') }}" class="text-sm text-blue-600 hover:underline">Don't have an account? Register now</a>
            </div>
        </div>
    </div>

</body>
</html>
