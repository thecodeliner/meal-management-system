@extends('members.layout.app')
@section('title', 'Manager Meal Management')
@section('content')
<!-- Member Bills & Payments -->
<div id="member-bills" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">My Bills & Payments</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Current Bill -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Current Month Bill</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Breakfast Meals:  {{ $totalCount['breakfast'] ?? 0 }}  | Lunch Meals:  {{ $totalCount['lunch'] ?? 0}}

                               | Dinner Meals: {{ $totalCount['dinner'] ?? 0}} | Guest Meals: {{ $totalCount['guest']?? 0 }}
                            </span>
                           <span class="font-medium">{{ $totalMeal ?? 0 }}</span>
                        </div>
                       
                        <div class="flex justify-between border-t pt-2">
                            <span class="text-gray-600 font-medium">Bazar Expense:</span>
                            <span class="font-medium">{{ number_format($bazarBillPerHead),2 }}</span>  
                            
                        </div>
                       
                       
                        @foreach($allBills as $head => $items)
                        <div class="flex justify-between">
                            @foreach($items as $item)
                            <span class="text-gray-600">{{$head}}:</span>
                            <span class="font-medium">Tk. {{number_format($item->amount / $totalMembers, 2)}}</span>
                           @endforeach
                        </div>
                        
                        
                       
                        @endforeach
                         <div class="flex justify-between border-t pt-2 font-bold">
                            <span>Due:</span>
                            <span class="text-red-600">Tk. {{number_format($totalDue,2)}}</span>
                        </div>
                        <div class="flex justify-between border-t pt-2 font-bold">
                            <span>Advance: </span>
                            <span class="text-green-600">Tk. {{number_format($totalAdvance,2)}}</span>
                        </div>
                        
                        <div class="flex justify-between border-t pt-2 font-bold">
                            <span>Total Payable: </span>
                            <span class="text-blue-600">Tk. {{number_format($payable,2)}}</span>
                        </div>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">
                            Pay Full Amount
                        </button>
                        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">
                            Pay Partial
                        </button>
                    </div>
                </div>

                <!-- Advance Payment & Payment Methods -->
                <div class="space-y-6">
                    <!-- Advance Payment -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Advance Payment</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Current Advance Balance:</span>
                                <span class="font-medium text-green-600">{{$totalAdvance ?? 0}}</span>
                            </div>
                            <div class="pt-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Add Advance Payment</label>
                                <div class="flex space-x-2">
                                    <form method="post" action="{{route('meal.advance')}}" >
                                        @csrf
                                    <input name="advance" type="number" min="0" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Amount">
                                    <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">
                                        Add
                                    </button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-sm text-gray-500 mt-2">
                                <p>Advance payments will be automatically applied to your future bills.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Payment Methods</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-md">
                                <div class="flex items-center">
                                    <i class="fas fa-university text-blue-500 text-xl mr-3"></i>
                                    <div>
                                        <div class="font-medium">Bank Transfer</div>
                                        <div class="text-sm text-gray-500">Account: 1234 5678 9012</div>
                                    </div>
                                </div>
                                <button class="text-green-600 hover:text-green-800 text-sm font-medium">Use</button>
                            </div>
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-md">
                                <div class="flex items-center">
                                    <i class="fas fa-mobile-alt text-purple-500 text-xl mr-3"></i>
                                    <div>
                                        <div class="font-medium">Mobile Banking</div>
                                        <div class="text-sm text-gray-500">bKash: 01XXX-XXXXXX</div>
                                    </div>
                                </div>
                                <button class="text-green-600 hover:text-green-800 text-sm font-medium">Use</button>
                            </div>
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-md">
                                <div class="flex items-center">
                                    <i class="fas fa-money-bill-wave text-green-500 text-xl mr-3"></i>
                                    <div>
                                        <div class="font-medium">Cash</div>
                                        <div class="text-sm text-gray-500">Pay to manager</div>
                                    </div>
                                </div>
                                <button class="text-green-600 hover:text-green-800 text-sm font-medium">Use</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
