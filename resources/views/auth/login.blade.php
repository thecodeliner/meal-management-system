<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Management System - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .role-selector.active {
            border-color: #4CAF50;
            background-color: #f0f9f0;
        }
    </style>
</head>


<body class="bg-gray-50">
@include('components.message')

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Meal Management System
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Select your role to continue
                </p>
            </div>

            <!-- Role Selection -->
            <!--<div class="mt-8 space-y-4">-->
            <!--    <div class="role-selector grid grid-cols-2 gap-4">-->
            <!--        <div class="role-card border-2 border-gray-200 rounded-lg p-4 text-center cursor-pointer transition-all duration-200 hover:shadow-md" data-role="member">-->
            <!--            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 text-green-600">-->
            <!--                <i class="fas fa-user text-xl"></i>-->
            <!--            </div>-->
            <!--            <h3 class="mt-3 text-lg font-medium text-gray-900">Member</h3>-->
            <!--            <p class="mt-1 text-sm text-gray-500">Manage meals, view bills & payments</p>-->
            <!--        </div>-->

            <!--        <div class="role-card border-2 border-gray-200 rounded-lg p-4 text-center cursor-pointer transition-all duration-200 hover:shadow-md" data-role="operations">-->
            <!--            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600">-->
            <!--                <i class="fas fa-tasks text-xl"></i>-->
            <!--            </div>-->
            <!--            <h3 class="mt-3 text-lg font-medium text-gray-900">Operations</h3>-->
            <!--            <p class="mt-1 text-sm text-gray-500">Daily bazar, costing & profile</p>-->
            <!--        </div>-->

            <!--        <div class="role-card border-2 border-gray-200 rounded-lg p-4 text-center cursor-pointer transition-all duration-200 hover:shadow-md" data-role="accountant">-->
            <!--            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-purple-100 text-purple-600">-->
            <!--                <i class="fas fa-calculator text-xl"></i>-->
            <!--            </div>-->
            <!--            <h3 class="mt-3 text-lg font-medium text-gray-900">Accountant</h3>-->
            <!--            <p class="mt-1 text-sm text-gray-500">Receive payments, monthly reports</p>-->
            <!--        </div>-->

            <!--        <div class="role-card border-2 border-gray-200 rounded-lg p-4 text-center cursor-pointer transition-all duration-200 hover:shadow-md" data-role="manager">-->
            <!--            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 text-red-600">-->
            <!--                <i class="fas fa-user-tie text-xl"></i>-->
            <!--            </div>-->
            <!--            <h3 class="mt-3 text-lg font-medium text-gray-900">Manager</h3>-->
            <!--            <p class="mt-1 text-sm text-gray-500">Manage members, accounts & reports</p>-->
            <!--        </div>-->
            <!--    </div>-->

                <!-- Login Form -->
                <form id="login-form" class="mt-8 space-y-6 " action="{{ route('login') }}" method="POST">

                    @csrf
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email"  class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10" placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password"  class="relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10" placeholder="Password">
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-green-600 hover:text-green-500">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Sign in 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--<script>-->
        // Role Selection
    <!--    document.querySelectorAll('.role-card').forEach(card => {-->
    <!--        card.addEventListener('click', function() {-->
                // Remove active class from all cards
    <!--            document.querySelectorAll('.role-card').forEach(c => {-->
    <!--                c.classList.remove('active');-->
    <!--                c.classList.remove('border-green-500');-->
    <!--            });-->

                // Add active class to clicked card
    <!--            this.classList.add('active');-->
    <!--            this.classList.add('border-green-500');-->

                // Show login form
    <!--            document.getElementById('login-form').classList.remove('hidden');-->

                // Update role name in login button
    <!--            const role = this.getAttribute('data-role');-->
    <!--            const roleNames = {-->
    <!--                'member': 'Member',-->
    <!--                'operations': 'Operations',-->
    <!--                'accountant': 'Accountant',-->
    <!--                'manager': 'Manager'-->
    <!--            };-->
    <!--            document.getElementById('role-name').textContent = roleNames[role];-->
    <!--        });-->
    <!--    });-->




    <!--</script>-->
</body>
</html>

