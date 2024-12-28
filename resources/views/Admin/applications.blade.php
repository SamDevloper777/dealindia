@extends('Admin.adminBase')
@section('title', 'Applications')
@section('content')<main class="p-6">
        <!-- Stats Section -->
    <main>
        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold">Recent Applications</h3>
            </div>
            <table class="w-full text-left table-auto">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Mobile</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="px-4 py-2">Roni Saha</td>
                        <td class="px-4 py-2">Male</td>
                        <td class="px-4 py-2">roni@gmai.com</td>
                        <td class="px-4 py-2">9876543210</td>
                        {{-- <td class="px-4 py-2">
                            <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded">Shortlisted</span>
                        </td> --}}
                        <td class="px-4 py-2">
                            <button class="text-blue-600 hover:underline">View</button>
                            <button class="text-red-600 hover:underline ml-2">Reject</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection
