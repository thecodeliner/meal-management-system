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
                       <canvas id="incomeChart"></canvas>
                    </div>
                </div>
                <div>
                    <h4 class="text-md font-medium text-gray-700 mb-2">Meal Distribution</h4>
                    <div class="bg-gray-100 p-4 rounded-lg h-64 flex items-center justify-center">
                        <canvas id="mealChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Financial Summary</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meals</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bazar Share</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rent / Utility</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Bill</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Advance</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paid</th>
            </tr>
        </thead>

        <tbody>
            @foreach($reports as $item)
            <tr>
                <td class="border px-3 py-2">{{ $item['name'] }}</td>
                <td class="border px-3 py-2">{{ $item['meal'] }}</td>
                <td class="border px-3 py-2">Tk. {{ $item['bazarShare'] }} </td>
                <td class="border px-3 py-2">Tk. {{ $item['utility'] }} </td>
                <td class="border px-3 py-2 font-semibold">Tk. {{ $item['totalDue'] }} </td>
                <td class="border px-3 py-2 text-green-600">Tk. {{ $item['advance'] }} </td>
                <td class="border px-3 py-2 text-red-600 font-bold">Tk. {{ $item['balance'] }} </td>
                <td class="border px-3 py-2 text-blue-500 font-bold">Tk. {{ $item['paid'] }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            </div>
        </div>
    </div>
</div>
@endsection
