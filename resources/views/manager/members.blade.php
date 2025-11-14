@extends('manager.layout.app')
@section('title', 'Manager Meal Management')
@section('content')
 <!-- Manager Members -->
 <div id="manager-members" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">Manage Members</h2>
               
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center" onclick="showNewMemberForm()">
                    <i class="fas fa-plus mr-2"></i>
                    Add Member
                </button>
            </div>
        </div>
        <div class="p-6">
            <div id="new-member-form" class="hidden mb-6 bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Add New Member</h3>


                <form class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST" action="{{ route('manager.members.store') }}">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input name="name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Full Name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input name="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Email">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input name="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Password">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input name="phone" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Phone">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Room No</label>
                        <input name="room_no" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Room No">
                    </div>

                  
                    <div class="md:col-span-2 flex justify-end">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                            Add Member
                        </button>
                    </div>
                </form>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Join Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($members as $member)


                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-green-500 flex items-center justify-center text-white font-bold mr-3">
                                        JD
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                                        <div class="text-sm text-gray-500">Member ID: M001</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->created_at->diffForHumans() }}</td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $roleColor = match($member->role) {
                                            'member' => 'bg-blue-100 text-blue-800',
                                            'operations' => 'bg-purple-100 text-purple-800',
                                            'accountant' => 'bg-yellow-100 text-yellow-800',
                                            'manager' => 'bg-green-100 text-green-800',
                                            default => 'bg-gray-100 text-gray-800',
                                        };
                                    @endphp
                                
                                    <span class="px-2 py-1 text-xs rounded-full {{ $roleColor }}">
                                        {{ ucfirst($member->role) }}
                                    </span>
                                </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">{{ $member->status }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $members->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
