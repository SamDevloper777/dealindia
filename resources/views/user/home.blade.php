@extends('user.userBase')
@section('title', 'Dashboard')
@section('content')<main class="p-6">
        <!-- Stats Section -->
        <section id="services" class="py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">Our Services</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">Personal Loans</h3>
                        <p>We provide tailored personal loan solutions to meet your financial needs.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">Investment Plans</h3>
                        <p>Secure your future with our custom investment plans.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">Credit Services</h3>
                        <p>Get access to quick and reliable credit services at competitive rates.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="bg-gray-200 py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">About Us</h2>
                <p class="text-lg">Real India is a leading financial services provider dedicated to empowering individuals
                    and businesses. Our mission is to offer innovative financial solutions to help you achieve your goals.
                </p>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">Contact Us</h2>
                <form class="max-w-lg mx-auto">
                    <div class="mb-4">
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                            placeholder="Your Name" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                            placeholder="Your Email" required>
                    </div>
                    <div class="mb-4">
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Submit</button>
                </form>
            </div>
        </section>

    @endsection
