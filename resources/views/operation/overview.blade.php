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
                        <p class="text-2xl font-bold text-gray-800">{{ $todaysBazarCount }}</p>
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
                        <p class="text-2xl font-bold text-gray-800">{{ $totalMealsToday }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                        <i class="fas fa-money-bill-wave text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Monthly Bazar Expense</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $monthlyBazarTotal }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                        <i class="fas fa-percentage text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Active Members</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $activeMembersCount }}</p>
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
                        @foreach ($bazars as $bazar )
                            
                        
                        <tr>
                            
                            <td class="px-4 py-3 whitespace-nowrap">{{ $bazar->date }}</td>
                            <td class="px-4 py-3">{{ $bazar->items }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $bazar->amount }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $bazar->user->name }}</td>
                            
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
