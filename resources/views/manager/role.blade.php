 @extends('manager.layout.app')
@section('title', 'Manager Role Management')
@section('content')
 <!-- Manager Role Management -->
 <div id="manager-role-management" class="page">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Role Management</h2>
        </div>
        <div class="p-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">User Roles</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">New Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                             @php
                                    $roles = ['member', 'operations', 'accountant', 'manager'];
                                @endphp

                            @foreach($members as $member)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-green-500 flex items-center justify-center text-white font-bold mr-3">
                                            JD
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{$member->name}}</div>
                                            <div class="text-sm text-gray-500">{{$member->email}}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Role Badge -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $roleColor = match($member->role) {
                                            'member' => 'bg-blue-100 text-blue-800',
                                            'operations' => 'bg-purple-100 text-purple-800',
                                            'accountant' => 'bg-yellow-100 text-yellow-800',
                                            'manager' => 'bg-green-100 text-green-800',
                                            default => 'bg-gray-100 text-gray-800',
                                        };
                                    @endphp
                                    <span class="px-2 py-1 text-xs rounded-full {{ $roleColor }}">
                                        {{ ucfirst($member->role) }}
                                    </span>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap">
                                     <form method="post" action="{{route('manager.updateRole')}}">
                                        @csrf
                                        {{-- User ID send --}}
                                        <input type="hidden" name="user_id" value="{{ $member->id }}">

                                     @php
                                    $takenRoles = \App\Models\User::whereIn('role', ['manager','accountant','operations'])->pluck('role')->toArray();
                                @endphp

                                <select name="role" class="form-select w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                    @foreach(['manager','accountant','operations','member'] as $role)
                                        <option value="{{ $role }}" @if(in_array($role, $takenRoles) && $role != 'member') disabled @endif>
                                            {{ ucfirst($role) }}
                                        </option>
                                    @endforeach
                                </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                    <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md update-role-btn" data-user="John Doe">
                                        Update Role
                                    </button>

                                    </form>
                                </td>
                            </tr>

                            </tbody>

                            @endforeach





                    </table>

                  <!-- members-->
                  <hr class="mt-4 mb-4">
                   <table class="min-w-full divide-y divide-gray-200">
                       <h3 class="text-lg font-semibold text-gray-800 mb-4">Members</h3>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">New Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                             @php
                                    $roles = ['member', 'operations', 'accountant', 'manager'];
                                @endphp

                            @foreach($onlyMembers as $member)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-green-500 flex items-center justify-center text-white font-bold mr-3">
                                            JD
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{$member->name}}</div>
                                            <div class="text-sm text-gray-500">{{$member->email}}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Role Badge -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $roleColor = match($member->role) {
                                            'member' => 'bg-blue-100 text-blue-800',
                                            'operations' => 'bg-purple-100 text-purple-800',
                                            'accountant' => 'bg-yellow-100 text-yellow-800',
                                            'manager' => 'bg-green-100 text-green-800',
                                            default => 'bg-gray-100 text-gray-800',
                                        };
                                    @endphp
                                    <span class="px-2 py-1 text-xs rounded-full {{ $roleColor }}">
                                        {{ ucfirst($member->role) }}
                                    </span>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap">
                                     <form method="post" action="{{route('manager.updateRole')}}">
                                        @csrf
                                        {{-- User ID send --}}
                                        <input type="hidden" name="user_id" value="{{ $member->id }}">

                                @php
                                    $takenRoles = \App\Models\User::whereIn('role', ['manager','accountant','operations'])->pluck('role')->toArray();
                                @endphp

                                <select name="role" class="form-select w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                    @foreach(['manager','accountant','operations','member'] as $role)
                                        <option value="{{ $role }}"
                                            @if(in_array($role, $takenRoles) && $role !== 'member')
                                                disabled
                                            @endif
                                        >
                                            {{ ucfirst($role) }}
                                        </option>
                                    @endforeach
                                </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                    <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md update-role-btn" data-user="John Doe">
                                        Update Role
                                    </button>

                                    </form>
                                </td>
                            </tr>


                            </tbody>


                           @endforeach



                    </table>
                    {{ $onlyMembers->links() }}
                    <!-- end members -->




                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Role Permissions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="text-md font-medium text-gray-700 mb-2">Role Summary</h4>

                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Members:</span>
                                <span class="font-medium">{{ $membersCount }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operations:</span>
                                <span class="font-medium">{{ $operationsCount }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Accountants:</span>
                                <span class="font-medium">{{ $accountantsCount }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Managers:</span>
                                <span class="font-medium">{{ $managersCount }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="text-md font-medium text-gray-700 mb-2">Role Permissions</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Member:</span>
                                <span class="text-xs text-gray-500">View meals, bills, make payments</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Operations:</span>
                                <span class="text-xs text-gray-500">Manage bazar, view costing</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Accountant:</span>
                                <span class="text-xs text-gray-500">Receive payments, view reports</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Manager:</span>
                                <span class="text-xs text-gray-500">Full system access</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
