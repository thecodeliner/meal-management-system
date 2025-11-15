@extends('manager.layout.app')
@section('title', 'Manager Overview')
@section('content')
    <!-- Manager Overview -->
    <div id="manager-overview" class="page active">
        <div class="space-y-6">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Total Members</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalMembers }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                            <i class="fas fa-utensils text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Total Meals Today</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalMealsToday }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                            <i class="fas fa-money-bill-wave text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Total Revenue</h3>
                            <p class="text-2xl font-bold text-gray-800">Tk. {{$totalPayments}}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                            <i class="fas fa-exclamation-circle text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Due Payments</h3>
                            <p class="text-2xl font-bold text-gray-800">Tk. {{$totalDues}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="{{ route('manager.role') }}" class="bg-white rounded-lg shadow p-4 flex flex-col items-center justify-center text-center cursor-pointer hover:bg-red-50 transition-colors" onclick="showPage('manager-role-management')">
                    <i class="fas fa-user-cog text-red-500 text-2xl mb-2"></i>
                    <h3 class="text-sm font-medium text-gray-700">Manage Roles</h3>
                    <p class="text-xs text-gray-500 mt-1">Change user roles & permissions</p>
                </a>
               
                <a href="{{ route('manager.expenses') }}" class="bg-white rounded-lg shadow p-4 flex flex-col items-center justify-center text-center cursor-pointer hover:bg-red-50 transition-colors" onclick="showPage('manager-expense-heads')">
                    <i class="fas fa-list-alt text-red-500 text-2xl mb-2"></i>
                    <h3 class="text-sm font-medium text-gray-700">Manage Expense Heads</h3>
                    <p class="text-xs text-gray-500 mt-1">Add wifi, Bua, electricity bills</p>
                </a>
                <a href="{{ route('manager.members') }}" class="bg-white rounded-lg shadow p-4 flex flex-col items-center justify-center text-center cursor-pointer hover:bg-red-50 transition-colors" onclick="showPage('manager-members')">
                    <i class="fas fa-user-plus text-red-500 text-2xl mb-2"></i>
                    <h3 class="text-sm font-medium text-gray-700">Add New Member</h3>
                    <p class="text-xs text-gray-500 mt-1">Register new members</p>
                </a>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">2 hours ago</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Updated meal rates</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">You</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">4 hours ago</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Added new expense head: Internet Bill</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">You</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">1 day ago</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">John Doe added 2 guest meals</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">John Doe</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
