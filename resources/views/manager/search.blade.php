@extends('manager.layout.app')
@section('title', 'Manager Meal Management')
@section('content')
 <!-- Manager Search -->
 <div id="manager-search" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Search Members</h2>
        </div>
        <div class="p-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Search Criteria</h3>
                <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Member Name</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                            <option>All</option>
                            <option>Paid</option>
                            <option>Due</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Room No</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Room No">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Search Results</h3>
                <div class="overflow-x-auto">
                   <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room No</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Due</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">

        @foreach($reports as $item)

        @php
            $initials = strtoupper(substr($item['name'], 0, 1));

            // Status logic
            if ($item['balance'] < 0) {
                $status = 'Paid';
                $statusColor = 'bg-blue-100 text-blue-800';
            } elseif ($item['balance'] == 0) {
                $status = 'Paid';
                $statusColor = 'bg-green-100 text-green-800';
            } else {
                $status = 'Due';
                $statusColor = 'bg-red-100 text-red-800';
            }

            // Find matching user for room number
            $user = $users->firstWhere('name', $item['name']);
            $room = $user->room_no ?? 'N/A';
        @endphp

        <tr>
            <!-- NAME + INITIAL AVATAR -->
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center text-white text-xs font-bold mr-2">
                        {{ $initials }}
                    </div>
                    <span class="text-sm text-gray-900">{{ $item['name'] }}</span>
                </div>
            </td>

            <!-- ROOM NO -->
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $room }}
            </td>

            <!-- TOTAL DUE -->
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium 
                {{ $item['balance'] > 0 ? 'text-red-600' : 'text-gray-900' }}">
                
                Tk. {{ number_format($item['balance'], 2) }}
            </td>

            <!-- STATUS -->
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 py-1 text-xs rounded-full {{ $statusColor }}">
                    {{ $status }}
                </span>
            </td>

            <!-- ACTIONS -->
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                <button class="text-red-600 hover:text-red-900">Notify</button>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
