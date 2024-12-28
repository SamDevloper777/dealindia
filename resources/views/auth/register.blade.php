<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include Tailwind CSS -->
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


    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Register</h2>
    
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="mb-4">
                    <div class="text-red-600 font-medium">Whoops! Something went wrong.</div>
                    <ul class="mt-2 text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <!-- Register Form -->
            <form method="POST" action="">
                @csrf
    
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
    
                <!-- Gender Field -->
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select id="gender" name="gender" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
    
                <!-- Date of Birth Field -->
                <div class="mb-4">
                    <label for="dob" class="block text-sm font-medium text-gray-700">Date Of Birth</label>
                    <input id="dob" type="date" name="dob" value="{{ old('dob') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
    
                <!-- Contact Number Field -->
                <div class="mb-4">
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Contact No.</label>
                    <input id="mobile" type="tel" name="mobile" value="{{ old('mobile') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
    
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
    
                <!-- Address Field -->
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea id="address" name="address" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address') }}</textarea>
                </div>
    
                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
    
                <!-- Confirm Password Field -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            I Agree to all the <a href="" class="text-blue-600 hover:underline">terms and Condition</a>
                        </label>
                    </div>
                </div>
    
                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Register
                    </button>
                </div>
            </form>
    
            <!-- Already Registered Link -->
            <div class="mt-6 text-center">
                <a href="{{ url('login') }}" class="text-sm text-blue-600 hover:underline">Already have an account? Log in</a>
            </div>
        </div>
    </div>
    

</body>
</html>
