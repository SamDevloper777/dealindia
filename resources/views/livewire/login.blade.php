<div>
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert"
            id="success-alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close"
                onclick="document.getElementById('success-alert').classList.add('hidden')">
                <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.415l2.935-2.934-2.935-2.934a1 1 0 011.415-1.415l2.934 2.935 2.934-2.935a1 1 0 011.415 1.415l-2.935 2.934 2.935 2.934a1 1 0 010 1.415z" />
                </svg>
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert"
            id="error-alert">
            <span class="block sm:inline">{{ session('error') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close"
                onclick="document.getElementById('error-alert').classList.add('hidden')">
                <svg class="fill-current h-6 w-6 text-red-700" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.415l2.935-2.934-2.935-2.934a1 1 0 011.415-1.415l2.934 2.935 2.934-2.935a1 1 0 011.415 1.415l-2.935 2.934 2.935 2.934a1 1 0 010 1.415z" />
                </svg>
            </button>
        </div>
    @endif

    <div class="w-full h-screen bg-white flex flex-col md:flex-row overflow-hidden">
        <!-- Left Section: Image -->
        <div class="w-full md:w-6/12 h-64 md:h-full">
            <div class="w-full h-full relative">
                <img src="register.jpg" class="object-cover w-full h-full filter opacity-80" alt="">
                <div class="absolute inset-0 bg-black opacity-50"></div>
            </div>
        </div>
        <!-- Right Section: Login Form -->
        <div class="flex justify-center items-center w-full md:w-6/12 p-6 md:p-12 lg:p-24">
            <div class="w-full">
                <h2 class="text-3xl md:text-4xl font-semibold text-center text-gray-800 mb-6" style="font-family: 'Roboto Condensed', serif;">Admin Login</h2>

                <!-- Buttons to select Login method -->
                <div class="flex justify-center mb-6">
                    <button wire:click="toggleForm('otp')" class="px-6 py-2 bg-blue-900 text-white rounded-md mr-4">
                        Login with OTP
                    </button>
                    <button wire:click="toggleForm('link')" class="px-6 py-2 bg-blue-900 text-white rounded-md">
                        Login with Email Link
                    </button>
                </div>

                <!-- OTP Login Form -->
                @if($loginMethod === 'otp')
                    <div id="otp-form">
                        <form wire:submit.prevent="sendOtp">
                            <div class="mb-4">
                                <label {{$inputDisabled ? 'readonly' : ''}} for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input wire:model="email" type="email" required autofocus
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <input wire:model="password" type="password" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="w-full bg-blue-900 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Login
                            </button>
                        </form>

                        @if ($showOtpMessage)
                            <div class="mt-4 text-green-700">
                                OTP has been sent to your email.
                            </div>
                            @elseif($resendOtpMessage)
                            <div class="mt-4 text-green-700">
                                OTP has been resent to your email.
                            </div>
                        @endif

                        @if($isToggleOtp)
                        <form wire:submit.prevent="verifyOtp" class="mt-4">
                            <div class="mb-4">
                                <label for="otp" class="block text-sm font-medium text-gray-700 mb-2">Enter OTP</label>
                                <input wire:model="otp" type="text" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="w-full bg-green-700 hover:bg-green-500 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                Verify OTP
                            </button>
                            
                        </form>
                        <button wire:click="verifyOtp" class="text-blue-600">resend otp</button>
                        @endif
                    </div>
                @endif

                <!-- Email Link Login Form -->
                @if($loginMethod === 'link')
                    <div id="link-form">
                        <form wire:submit.prevent="sendLoginLink">
                            <div class="mb-4">
                                <label for="email-link" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input {{$inputDisabled ? 'readonly' : ''}} wire:model="email" type="email" required autofocus
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="w-full bg-blue-900 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Send Login Link
                            </button>
                        </form>
                    </div>
                @endif

                <div class="mt-6 text-center flex items-center justify-center">
                    <hr class="flex-grow border-t border-blue-900">
                    <a href="{{ url('register') }}" class="text-sm text-blue-900 hover:underline mx-4">Don't have an account? Register now</a>
                    <hr class="flex-grow border-t border-blue-900">
                </div>
            </div>
        </div>
    </div>
</div>
