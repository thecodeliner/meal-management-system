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
                        
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                        
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($peymentHistorey as $item)
                        
                    
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$item->created_at->format('d.m.Y')}}</td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$item->amount}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$item->type}}</td>
                        
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
