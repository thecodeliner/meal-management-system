@extends('accountant.layout.app')
@section('content')
 <!-- Accountant Financial Reports -->
 <div id="accountant-reports" class="page">
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Financial Overview - October 2023</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="border border-gray-200 rounded-lg p-4">
                    <h4 class="text-md font-medium text-gray-700 mb-2">Total Income</h4>
                    <p class="text-2xl font-bold text-green-600">Tk. {{ $income['totalIncome'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">From meal bills & other payments</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h4 class="text-md font-medium text-gray-700 mb-2">Total Expenses</h4>
                    <p class="text-2xl font-bold text-red-600">Tk. {{ $income['totalExpense'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">Bazar, utilities & other costs</p>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <h4 class="text-md font-medium text-gray-700 mb-2">Net Balance</h4>
                    <p class="text-2xl font-bold text-blue-600">Tk. {{ $income['netBalance'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">Remaining funds</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Detailed Financial Report</h3>
            </div>
            <div class="p-6">
                <div class="mb-6">
                    <h4 class="text-md font-medium text-gray-700 mb-4">Income Breakdown</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Source</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Percentage</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Meal Bills</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$1,740.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">71%</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Room Rent</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$480.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">19.6%</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Utility Bills</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$230.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">9.4%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div>
                    <h4 class="text-md font-medium text-gray-700 mb-4">Expense Breakdown</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Percentage</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Bazar Expenses</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$780.50</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">68.1%</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Utility Bills</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$245.75</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">21.4%</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Other Expenses</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$120.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10.5%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
