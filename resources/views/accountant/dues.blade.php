@extends('accountant.layout.app')
@section('content')

 <!-- Accountant Dues -->
 <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Member Due List</h2>

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
            @foreach($dueList as $item)
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

<form action="{{ route('accountant.receivePayment') }}" method="POST" class="p-4 bg-white rounded-lg shadow-md">
    @csrf

    <label class="block font-semibold mb-1">Select Member</label>
    <select name="user_id" class="w-full border px-3 py-2 rounded mb-3">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <label class="block font-semibold mb-1">Payment Amount</label>
    <input type="number" name="amount" class="w-full border px-3 py-2 rounded mb-3" placeholder="Amount" ">

    <label class="block font-semibold mb-1">Payment Method</label>
    <select name="type" class="w-full border px-3 py-2 rounded mb-3">
        <option value="cash">Cash</option>
        <option value="bkash">Bkash</option>
        <option value="nagad">Nagad</option>
    </select>

    <label class="block font-semibold mb-1">Transaction ID (optional)</label>
    <input type="text" name="trx_id" class="w-full border px-3 py-2 rounded mb-3" placeholder="TrxID if online">

    <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
        Add Payment
    </button>
</form>


        @endsection
