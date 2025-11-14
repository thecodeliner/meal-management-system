@extends('operation.layout.app')
@section('content')
  <!-- Operations Costing -->
  <div id="operations-costing" class="page">
    <div class="space-y-6">
        <h2 class="text-xl font-bold text-gray-800">Costing Details</h2>

        <!-- Cost Summary -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Total Monthly Bazar Cost</h3>
                <p class="text-2xl font-bold text-gray-800">$1,250.00</p>
                <div class="mt-2 text-sm text-green-600">
                    <i class="fas fa-arrow-up mr-1"></i> 5.2% from last month
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Total Monthly Meals</h3>
                <p class="text-2xl font-bold text-gray-800">1,520</p>
                <div class="mt-2 text-sm text-green-600">
                    <i class="fas fa-arrow-up mr-1"></i> 3.8% from last month
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 stat-card">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Average Meal Rate</h3>
                <p class="text-2xl font-bold text-gray-800">$4.15</p>
                <div class="mt-2 text-sm text-red-600">
                    <i class="fas fa-arrow-up mr-1"></i> 1.3% from last month
                </div>
            </div>
        </div>

        <!-- Cost Breakdown -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Monthly Cost Breakdown</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Percentage</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trend</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">Protein (Meat, Fish)</td>
                            <td class="px-4 py-3 whitespace-nowrap">$520.00</td>
                            <td class="px-4 py-3 whitespace-nowrap">41.6%</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-arrow-up text-red-500 mr-1"></i>
                                    <span class="text-red-500">+2.5%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">Vegetables</td>
                            <td class="px-4 py-3 whitespace-nowrap">$280.00</td>
                            <td class="px-4 py-3 whitespace-nowrap">22.4%</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-arrow-down text-green-500 mr-1"></i>
                                    <span class="text-green-500">-1.2%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">Grains & Staples</td>
                            <td class="px-4 py-3 whitespace-nowrap">$220.00</td>
                            <td class="px-4 py-3 whitespace-nowrap">17.6%</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-arrow-up text-red-500 mr-1"></i>
                                    <span class="text-red-500">+0.8%</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">Spices & Others</td>
                            <td class="px-4 py-3 whitespace-nowrap">$230.00</td>
                            <td class="px-4 py-3 whitespace-nowrap">18.4%</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-minus text-gray-500 mr-1"></i>
                                    <span class="text-gray-500">0%</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Meal Rate Calculation -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Meal Rate Calculation</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-medium text-gray-700 mb-3">This Month</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Bazar Cost:</span>
                            <span class="font-medium">$1,250.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Meals Served:</span>
                            <span class="font-medium">1,520</span>
                        </div>
                        <div class="flex justify-between border-t pt-2">
                            <span class="text-gray-600 font-semibold">Meal Rate:</span>
                            <span class="font-bold text-blue-600">$0.82</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="font-medium text-gray-700 mb-3">Last Month Comparison</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Bazar Cost:</span>
                            <span class="font-medium">$1,188.50</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Meals Served:</span>
                            <span class="font-medium">1,464</span>
                        </div>
                        <div class="flex justify-between border-t pt-2">
                            <span class="text-gray-600 font-semibold">Meal Rate:</span>
                            <span class="font-bold text-blue-600">$0.81</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
