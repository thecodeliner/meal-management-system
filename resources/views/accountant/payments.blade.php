@extends('accountant.layout.app')
@section('content')

 <!-- Accountant Payments -->
 <div id="accountant-payments" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Receive Payments</h2>
        </div>
        <div class="p-6">
           

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Payment History</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">For Month</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Received By</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($payments as $payment)
                                
                            
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $payment->created_at->format('d:m:Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center text-white text-xs font-bold mr-2">
                                            JD
                                        </div>
                                        <span class="text-sm text-gray-900">{{ $payment->user->name ?? 'Unknown' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ number_format($payment->amount, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $payment->type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> {{ $payment->created_at->format('F Y') }} </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Auth::user()->name }}</td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        @endsection
