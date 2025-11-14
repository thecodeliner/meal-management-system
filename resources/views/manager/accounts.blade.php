@extends('manager.layout.app')
@section('title', 'Manager Meal Management')
@section('content')
 <!-- Manager Accounts -->
 <div id="manager-accounts" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Manage Accounts</h2>
        </div>
        <div class="p-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Financial Summary</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="text-md font-medium text-gray-700 mb-2">Total Revenue</h4>
                        <p class="text-2xl font-bold text-gray-800">$2,450.00</p>
                        <p class="text-sm text-gray-500 mt-1">This month</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="text-md font-medium text-gray-700 mb-2">Total Expenses</h4>
                        <p class="text-2xl font-bold text-gray-800">$1,146.25</p>
                        <p class="text-sm text-gray-500 mt-1">This month</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="text-md font-medium text-gray-700 mb-2">Net Balance</h4>
                        <p class="text-2xl font-bold text-green-600">$1,303.75</p>
                        <p class="text-sm text-gray-500 mt-1">This month</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Account Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="text-md font-medium text-gray-700 mb-2">Payment Settings</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Advance Payment:</span>
                                <span class="font-medium">Enabled</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Auto Apply Advance:</span>
                                <span class="font-medium">Enabled</span>
                            </div>
                            <div class="pt-2">
                                <button class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                                    Update Settings
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="text-md font-medium text-gray-700 mb-2">Notification Settings</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Payment Reminders:</span>
                                <span class="font-medium">Enabled</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Meal Updates:</span>
                                <span class="font-medium">Enabled</span>
                            </div>
                            <div class="pt-2">
                                <button class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                                    Update Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
