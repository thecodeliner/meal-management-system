@extends('manager.layout.app')
@section('title', 'Manager Meal Management')
@section('content')
<!-- Manager Meal Rates -->
<div id="manager-meal-rates" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Meal Rate Management</h2>
        </div>
        <div class="p-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Current Meal Rates</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($mealRates as $mealRate)
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="text-md font-medium text-gray-700 mb-2">{{ $mealRate->meal_type }}</h4>
                            <p class="text-2xl font-bold text-gray-800">{{ $mealRate->rate }}</p>
                            <p class="text-sm text-gray-500 mt-1">Per meal</p>
                            <p class="text-sm text-gray-500 mt-1">Effective From: {{ $mealRate->effective_from }}</p>
                            @if($mealRate->effective_to)
                                <p class="text-sm text-gray-500">Effective To: {{ $mealRate->effective_to }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Update Meal Rates</h3>


                <div class="max-w-full mx-auto bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add Meal Rate</h2>

                    <form action="{{ route('manager.storeRate') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf

                        <!-- Left side: Meal Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meal Type</label>
                            <select
                                name="meal_type"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none"
                                required>
                                <option value="">Select Meal Type</option>
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                                <option value="guest">Guest</option>
                            </select>
                            @error('meal_type')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Right side: Rate -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Rate (BDT)</label>
                            <input
                                type="number"
                                step="0.01"
                                name="rate"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none"
                                placeholder="Enter rate per meal"
                                required
                            >
                            @error('rate')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Left side: Effective From -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Effective From</label>
                            <input
                                type="date"
                                name="effective_from"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none"
                                required
                            >
                            @error('effective_from')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Right side: Effective To -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Effective To</label>
                            <input
                                type="date"
                                name="effective_to"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none"
                            >
                            @error('effective_to')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Button full width below -->
                        <div class="md:col-span-2 flex justify-end mt-4">
                            <button
                                type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-md shadow-sm">
                                Save Rate
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Button full width below -->

            </div>
        </div>
    </div>
</div>
@endsection
