@extends('manager.layout.app')
@section('title', 'Manager Meal Management')
@section('content')
 <!-- Manager Reports -->
 <div id="manager-reports" class="page">
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Monthly Summary Report - October 2023</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-md font-medium text-gray-700 mb-2">Income vs Expenses</h4>
                    <div class="bg-gray-100 p-4 rounded-lg h-64 flex items-center justify-center">
                        <p class="text-gray-500">Chart would be displayed here</p>
                    </div>
                </div>
                <div>
                    <h4 class="text-md font-medium text-gray-700 mb-2">Meal Distribution</h4>
                    <div class="bg-gray-100 p-4 rounded-lg h-64 flex items-center justify-center">
                        <p class="text-gray-500">Chart would be displayed here</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Financial Summary</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Meals</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meal Rate</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Cost</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paid</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center text-white text-xs font-bold mr-2">
                                        JD
                                    </div>
                                    <span class="text-sm text-gray-900">John Doe</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">28</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$4.15</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$116.20</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">$120.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">-$3.80</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white text-xs font-bold mr-2">
                                        JS
                                    </div>
                                    <span class="text-sm text-gray-900">Jane Smith</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25.5</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$4.15</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$105.83</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">$0.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">$105.83</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-purple-500 flex items-center justify-center text-white text-xs font-bold mr-2">
                                        RJ
                                    </div>
                                    <span class="text-sm text-gray-900">Robert Johnson</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">26</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$4.15</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$107.90</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">$150.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">-$42.10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
