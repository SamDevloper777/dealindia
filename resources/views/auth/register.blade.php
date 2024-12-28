<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">

    <div class="flex  w-full h-screen">
        <!-- Left Section (Image) -->
        <div class="w-6/12 h-full bg-orange-100">
            <div class="w-full h-full relative">
                <img src="register.jpg" class="object-cover w-full h-full filter opacity-80" alt="">
                <div class="absolute inset-0 bg-black opacity-50"></div>
            </div>
        </div>
    
        <!-- Right Section (Form) -->
        <div class="flex  w-6/12 ">
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
            <div class=" w-full mx-12 p-8">
                <h2 class="text-4xl font-semibold text-center text-gray-800 mb-6"  style="font-family: 'Roboto Condensed', serif;">Create An Account</h2>

                <!-- Register Form -->
                <form method="POST" action="{{route('user.register')}}">
                    @csrf
    
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autofocus
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
    
                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
    
                    <!-- Gender Field -->
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="gender" name="gender" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value={{ old('address') }}>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
    
                    <!-- Date of Birth Field -->
                    <div class="flex w-full gap-2">
                        <div class="mb-4 w-6/12">
                            <label for="dob" class="block text-sm font-medium text-gray-700">Date Of Birth</label>
                            <input id="dob" type="date" name="dob" value="{{ old('dob') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
        
                        <!-- Contact Number Field -->
                        <div class="mb-4 w-6/12">
                            <label for="mobile" class="block text-sm font-medium text-gray-700">Contact No.</label>
                            <input id="mobile" type="tel" name="mobile" value="{{ old('mobile') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm ">
                        </div>
                    </div>
    
                    <!-- Address Field -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea id="address" name="address" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address') }}</textarea>
                    </div>
    
                    <!-- Password Field -->
                    <div class="flex w-full gap-2">
                        <div class="mb-4 w-6/12">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" type="password" name="password" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
        
                        <!-- Confirm Password Field -->
                        <div class="mb-6  w-6/12">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                                Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
    
                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-blue-900 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Register
                        </button>
                    </div>
                </form>
    
                <!-- Already Registered Link -->
                <div class="mt-6 text-center">
                    <a href="{{ url('login') }}" class="text-sm text-blue-900 hover:underline">Already have an account?
                        Log in</a>
                </div>
            </div>
        </div>
    </div>
    

</body>

</html>
