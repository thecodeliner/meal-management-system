@extends('accountant.layout.app')
@section('content')
<!-- Accountant Overview -->
<div id="accountant-overview" class="page active">
    <div class="space-y-6">
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-500 mr-4">
                        <i class="fas fa-money-bill-wave text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Total Received</h3>
                        <p class="text-2xl font-bold text-gray-800">$2,450</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                        <i class="fas fa-exclamation-circle text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Total Due</h3>
                        <p class="text-2xl font-bold text-gray-800">$980</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Paid Members</h3>
                        <p class="text-2xl font-bold text-gray-800">18</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                        <i class="fas fa-user-times text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Due Members</h3>
                        <p class="text-2xl font-bold text-gray-800">6</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Date Range Meals Section -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2 md:mb-0">Meal Records</h3>
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2">
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium text-gray-700">From:</label>
                        <input type="date" id="startDate" class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium text-gray-700">To:</label>
                        <input type="date" id="endDate" class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <button id="viewMealsBtn" class="bg-purple-500 hover:bg-purple-600 text-white py-1 px-3 rounded-md text-sm">
                        View Meals
                    </button>
                    <button id="resetDateBtn" class="bg-gray-500 hover:bg-gray-600 text-white py-1 px-3 rounded-md text-sm">
                        Reset to Today
                    </button>
                </div>
            </div>

            <div id="mealsTableContainer">
                <!-- Table will be loaded here by JavaScript -->
            </div>

            <div class="mt-4 text-sm text-gray-500">
                <p><i class="fas fa-info-circle mr-1"></i> <span id="dateRangeInfo">Showing meals for today</span></p>
            </div>
        </div>

        <!-- Recent Payments -->
<div class="bg-white rounded-lg shadow p-4">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Payments</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">For Month</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap">2023-10-15</td>
                    <td class="px-4 py-3 whitespace-nowrap">John Doe</td>
                    <td class="px-4 py-3 whitespace-nowrap">$120.00</td>
                    <td class="px-4 py-3 whitespace-nowrap">Bank Transfer</td>
                    <td class="px-4 py-3 whitespace-nowrap">October 2023</td>
                </tr>
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap">2023-10-14</td>
                    <td class="px-4 py-3 whitespace-nowrap">Jane Smith</td>
                    <td class="px-4 py-3 whitespace-nowrap">$100.00</td>
                    <td class="px-4 py-3 whitespace-nowrap">Cash</td>
                    <td class="px-4 py-3 whitespace-nowrap">October 2023</td>
                </tr>
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap">2023-10-13</td>
                    <td class="px-4 py-3 whitespace-nowrap">Robert Johnson</td>
                    <td class="px-4 py-3 whitespace-nowrap">$150.00</td>
                    <td class="px-4 py-3 whitespace-nowrap">bKash</td>
                    <td class="px-4 py-3 whitespace-nowrap">October 2023</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
