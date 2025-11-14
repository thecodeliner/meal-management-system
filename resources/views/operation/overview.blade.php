@extends('operation.layout.app')
@section('content')
<!-- Operations Overview -->
<div id="operations-overview" class="page active">
    <div class="space-y-6">
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                        <i class="fas fa-shopping-cart text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Today's Bazar</h3>
                        <p class="text-2xl font-bold text-gray-800">$45.50</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        <i class="fas fa-utensils text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Total Meals Today</h3>
                        <p class="text-2xl font-bold text-gray-800">64</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                        <i class="fas fa-money-bill-wave text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Monthly Expense</h3>
                        <p class="text-2xl font-bold text-gray-800">$1,250</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                        <i class="fas fa-percentage text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Current Meal Rate</h3>
                        <p class="text-2xl font-bold text-gray-800">$4.15</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bazar -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Bazar Expenses</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Added By</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">2023-10-15</td>
                            <td class="px-4 py-3">Rice, Chicken, Vegetables</td>
                            <td class="px-4 py-3 whitespace-nowrap">$45.50</td>
                            <td class="px-4 py-3 whitespace-nowrap">You</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">2023-10-14</td>
                            <td class="px-4 py-3">Fish, Oil, Spices</td>
                            <td class="px-4 py-3 whitespace-nowrap">$32.75</td>
                            <td class="px-4 py-3 whitespace-nowrap">You</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">2023-10-13</td>
                            <td class="px-4 py-3">Beef, Lentils, Fruits</td>
                            <td class="px-4 py-3 whitespace-nowrap">$38.20</td>
                            <td class="px-4 py-3 whitespace-nowrap">You</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
