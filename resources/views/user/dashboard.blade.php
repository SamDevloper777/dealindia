@extends('user.userBase')
@section('title', '')
@section('content')
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-600 text-white flex flex-col">
        <div class="px-4 py-4">
            <h2 class="text-2xl font-bold">Dashboard</h2>
        </div>
        <nav class="flex-1">
            <ul>
                <li>
                    <a href="#profile" class="block px-4 py-2 hover:bg-blue-700">Profile</a>
                </li>
                <li>
                    <a href="#settings" class="block px-4 py-2 hover:bg-blue-700">Settings</a>
                </li>
                <li>
                    <a href="#tasks" class="block px-4 py-2 hover:bg-blue-700">Tasks</a>
                </li>
                <li>
                    <a href="#notifications" class="block px-4 py-2 hover:bg-blue-700">Notifications</a>
                </li>
            </ul>
        </nav>
        <div class="px-4 py-4">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <header class="bg-white shadow-sm p-4 flex items-center justify-between">
            <h1 class="text-xl font-semibold text-gray-700">Welcome, {{ auth()->user()->name }}</h1>
            <div>
                <a href="#notifications" class="text-blue-600 hover:underline">Notifications</a>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6">
            <!-- Section: Profile -->
            <section id="profile" class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Your Profile</h2>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Joined:</strong> {{ auth()->user()->created_at->format('M d, Y') }}</p>
                </div>
            </section>

            <!-- Section: Tasks -->
            <section id="tasks" class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Your Tasks</h2>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <ul class="space-y-2">
                        <li class="flex justify-between items-center">
                            <span>Complete the project report</span>
                            <button class="text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Mark as Done</button>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>Update profile details</span>
                            <button class="text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Mark as Done</button>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Section: Settings -->
            <section id="settings" class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Settings</h2>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p>Customize your settings here...</p>
                    <button class="mt-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Save Changes</button>
                </div>
            </section>
        </main>
    </div>
</div>
@endsection