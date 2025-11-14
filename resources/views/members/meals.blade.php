@extends('members.layout.app')
@section('title', 'Manager Meal Management')
@section('content')
 <!-- Member Meals -->
 <div id="member-meals" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">My Meal Records</h2>
                <div class="text-sm text-gray-500">
                    Current Month: <span class="font-medium">October 2023</span>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="mb-6">
                <h3 class="text-md font-medium text-gray-700 mb-2">Add Today's Meal</h3>
                <form action="{{ route('member.record') }}" method="POST">
                @csrf
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                            <input name="date" type="date" id="meal-date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Breakfast</label>
                            <select name="breakfast" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="0">0</option>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>


                          

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Lunch</label>
                            <select name="lunch" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="0">0</option>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Dinner</label>
                            <select name="dinner" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="0">0</option>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                           
                        </div>
                    </div>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Guest Meals</label>
                            <input name="guest" type="number" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="0">
                        </div>
                        <div class="flex items-end">
                            <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">
                                Save Meals
                            </button>
                        </div>
                    </div>
                    <div class="mt-2 text-sm text-gray-500">
                        <p>Note: You can only add meals for today and future dates. Guest meals are charged at Tk. {{ $mealRates['guest'] ?? 0 }} per meal.</p>
                    </div>
                </div>


            </form>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Breakfast</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lunch</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dinner</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guest Meals</th>
          
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                       @foreach ($mealRecords as $mealRecord)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mealRecord->date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mealRecord->breakfast }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mealRecord->lunch }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mealRecord->dinner }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mealRecord->guest }}</td>
                           
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Remove</button>
                            </td>
                        </tr>

                       @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $mealRecords->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

