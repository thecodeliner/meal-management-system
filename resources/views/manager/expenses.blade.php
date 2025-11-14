@extends('manager.layout.app')
@section('title', 'Manager Expense Management')
@section('content')
 <!-- Manager Expense Heads -->
 <div id="manager-expense-heads" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">Expense Heads Management</h2>
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center" onclick="showNewExpenseForm()">
                    <i class="fas fa-plus mr-2"></i>
                    Add Expense Head
                </button>
            </div>
        </div>
        <div class="p-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Current Expense Heads</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expense Head</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Default Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($expenseHeads as $expense)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$expense->head}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$expense->type}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tk. {{$expense->amount}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">{{$expense->active ? 'Active' : 'Inactive'}}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="new-expense-form" class="hidden">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Add New Expense Head</h3>
                <form class="grid grid-cols-1 md:grid-cols-2 gap-4" method="post" action="{{route('manager.storeExpense')}}">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Expense Head Name</label>
                        <input type="text" name="head" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="e.g., Water Bill">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <select name="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                            <option>Fixed</option>
                            <option>Variable</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Default Amount (Tk.)</label>
                        <input name="amount" type="number" min="0" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="0.00">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                            Add Expense Head
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
