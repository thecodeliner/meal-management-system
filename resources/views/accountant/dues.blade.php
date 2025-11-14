@extends('accountant.layout.app')
@section('content')

 <!-- Accountant Dues -->
 <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Member Due List</h2>

    <table class="w-full border-collapse text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-3 py-2">Name</th>
                <th class="border px-3 py-2">Meals</th>
                <th class="border px-3 py-2">Bazar Share</th>
                <th class="border px-3 py-2">Utility</th>
                <th class="border px-3 py-2">Total Bill</th>
                <th class="border px-3 py-2">Advance</th>
                <th class="border px-3 py-2">Due</th>
                <th class="border px-3 py-2">Paid</th>
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
