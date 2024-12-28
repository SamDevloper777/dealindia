@extends('Admin.adminBase')
@section('title', 'Dashboard')
@section('content')<main class="p-6">
        <!-- Stats Section -->
    <main>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-gray-600">Active Job Posts</h3>
                <p class="text-2xl font-bold">24</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-gray-600">Applications Received</h3>
                <p class="text-2xl font-bold">154</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-gray-600">Shortlisted Candidates</h3>
                <p class="text-2xl font-bold">38</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-gray-600">Total Hires</h3>
                <p class="text-2xl font-bold">12</p>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold">Recent Applications</h3>
            </div>
            <table class="w-full text-left table-auto">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2">Candidate Name</th>
                        <th class="px-4 py-2">Job Title</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">Software Engineer</td>
                        <td class="px-4 py-2">
                            <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded">Shortlisted</span>
                        </td>
                        <td class="px-4 py-2">
                            <button class="text-blue-600 hover:underline">View</button>
                            <button class="text-red-600 hover:underline ml-2">Reject</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Jane Smith</td>
                        <td class="px-4 py-2">Data Analyst</td>
                        <td class="px-4 py-2">
                            <span class="bg-yellow-100 text-yellow-800 text-sm px-2 py-1 rounded">Pending</span>
                        </td>
                        <td class="px-4 py-2">
                            <button class="text-blue-600 hover:underline">View</button>
                            <button class="text-red-600 hover:underline ml-2">Reject</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

@endsection
