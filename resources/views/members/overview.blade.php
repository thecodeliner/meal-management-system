@extends('members.layout.app')
@section('content')
 <!-- Member Overview -->
 <div id="member-overview" class="page active">
    <div class="space-y-6">
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        <i class="fas fa-utensils text-xl"></i>
                    </div>
                    <div> 
                        <h3 class="text-sm font-medium text-gray-500">My Total Meals</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $myTotalMeals }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                        <i class="fas fa-money-bill-wave text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Total Cost</h3>
                        <p class="text-2xl font-bold text-gray-800">{{number_format($bazarBillPerHead,2 )}}</p>
                    </div>
                </div>
            </div>

           

            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                        <i class="fas fa-percentage text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Advance Balance</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalAdvance }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Payment Updates -->
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Payment Updates</h3>
                <div class="space-y-4">
                    <div class="flex items-start p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Payment Received</p>
                            <p class="text-xs text-gray-500">120.00 received</p>
                            <p class="text-xs text-gray-400">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                        <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Advance Payment Applied</p>
                            <p class="text-xs text-gray-500">50.00 applied </p>
                            <p class="text-xs text-gray-400">1 day ago</p>
                        </div>
                    </div>
                    <div class="flex items-start p-3 bg-yellow-50 rounded-lg">
                        <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-3"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Payment Due Reminder</p>
                            <p class="text-xs text-gray-500">45.50 due</p>
                            <p class="text-xs text-gray-400">3 days ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Meal Rates -->
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Current Meal Rates</h3>
                <div class="space-y-3">
                   
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Breakfast</span>
                        <span class="font-medium">{{ $totalCount['breakfast'] ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Lunch</span>
                        <span class="font-medium">{{ $totalCount['lunch'] ?? 0}}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Dinner</span>
                        <span class="font-medium">{{ $totalCount['dinner'] ?? 0}}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600 font-medium">Guest Meal</span>
                        <span class="font-medium text-green-600">{{ $totalCount['guest']?? 0 }}</span>
                    </div>
                   
                </div>
                <div class="mt-4 p-3 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600">Note: Guest meals are charged at a fixed rate regardless of meal type.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
