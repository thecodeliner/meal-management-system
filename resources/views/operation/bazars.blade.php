@extends('operation.layout.app')
@section('content')
<!-- Operations Bazar -->
<div id="operations-bazar" class="page">
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Daily Bazar Management</h2>
            <button id="addBazarBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center" onclick="showNewBazarForm()">
                <i class="fas fa-plus mr-2"></i> Add Bazar
            </button>
        </div>

        <!-- Bazar Form (Initially Hidden) -->
        <div id="bazarForm" class="bg-white rounded-lg shadow p-4 hidden">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Add Bazar Entry</h3>
            <form id="bazarEntryForm" method="POST" action="{{ route('operation.bazarEntry') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input name="date" type="date" class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                        <input name="amount" type="number" step="0.01" class="w-full p-2 border border-gray-300 rounded-md" placeholder="0.00" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Items</label>
                        <textarea name="items" class="w-full p-2 border border-gray-300 rounded-md" rows="3" placeholder="Rice, Chicken, Vegetables" required></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
                        <textarea name="notes" class="w-full p-2 border border-gray-300 rounded-md" rows="2" placeholder="Additional notes..."></textarea>
                    </div>
                </div>
                <div class="flex justify-end space-x-3 mt-4">
                    <a href="{{ route('operation.bazars') }}" type="button" id="cancelBazarBtn" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50" >Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Save Bazar</button>
                </div>
            </form>
        </div>

        <!-- Bazar List -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Bazar History</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bazar By</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($bazars as $bazar )
                            
                        
                        <tr>
                            
                            <td class="px-4 py-3 whitespace-nowrap">{{ $bazar->date }}</td>
                            <td class="px-4 py-3">{{ $bazar->items }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $bazar->amount }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $bazar->user->name }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <button class="text-blue-600 hover:text-blue-800 mr-3"><i class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
