@extends('members.layout.app')
@section('title', 'Manager Meal Management')
@section('content')
  <!-- Member Payment History -->
  <div id="member-payment-history" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Payment History</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Month</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Receipt</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">October 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$120.00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bank Transfer</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Completed</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Download</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-09-30</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">September 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$157.70</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Cash</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Completed</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Download</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-08-31</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">August 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$166.00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">bKash</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Completed</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Download</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
