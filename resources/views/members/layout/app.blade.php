<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard - Meal Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar-active {
            background-color: #4CAF50;
            color: white;
        }

        .page.active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('components.message')
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md transform transition-transform duration-300 ease-in-out md:translate-x-0 -translate-x-full fixed md:relative z-30 h-full" id="sidebar">
            <div class="p-4 border-b">
                <h1 class="text-xl font-bold text-gray-800">Meal Management</h1>
                <p class="text-xs text-green-600 font-medium">Member Dashboard</p>
            </div>
            <nav class="mt-6">
                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase">Main Navigation</div>
                <a href="{{ route('member.overview') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 {{ Route::is('member.overview') ? 'sidebar-active' : '' }} " data-page="member-overview">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                    <span>Overview</span>
                </a>
                <a href="{{ route('member.meals') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 {{ Route::is('member.meals') ? 'sidebar-active' : '' }}" data-page="member-meals">
                    <i class="fas fa-utensils w-5 mr-3"></i>
                    <span>My Meals</span>
                </a>
                <a href="{{ route('member.bills') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 {{ Route::is('member.bills') ? 'sidebar-active' : '' }}" data-page="member-bills">
                    <i class="fas fa-file-invoice-dollar w-5 mr-3"></i>
                    <span>Bills & Payments</span>
                </a>
                <a href="{{ route('member.history') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 {{ Route::is('member.history') ? 'sidebar-active' : '' }}" data-page="member-payment-history">
                    <i class="fas fa-history w-5 mr-3"></i>
                    <span>Payment History</span>
                </a>
                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase mt-4">Account</div>
                <a href="{{ route('member.profile') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 {{ Route::is('member.profile') ? 'sidebar-active' : '' }}" data-page="member-profile">
                    <i class="fas fa-user-cog w-5 mr-3"></i>
                    <span>Profile Settings</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <button class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600">
                    <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                    <span>Logout</span>
                </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden md:ml-0 ml-0">
            <!-- Navbar -->
            <header class="bg-white shadow-sm z-20">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="p-2 rounded-md text-gray-600 md:hidden">
                            <i class="fas fa-bars text-lg"></i>
                        </button>
                        <div class="ml-2 md:ml-0">
                            <h2 class="text-lg font-semibold text-gray-800" id="pageTitle">Overview</h2>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="p-2 text-gray-600 rounded-full hover:bg-gray-100">
                                <i class="fas fa-bell"></i>
                                <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                            </button>
                        </div>
                        <div class="relative">
                            <button class="flex items-center space-x-2 focus:outline-none">
                                <div class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center text-white">
                                    <span>JD</span>
                                </div>
                                <span class="hidden md:block font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-gray-500 text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
                <!-- Alert Component -->
                <div id="alert" class="hidden mb-4 p-4 rounded-md bg-green-100 border border-green-400 text-green-700">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span id="alertMessage">Operation completed successfully</span>
                    </div>
                </div>

                @yield('content')

            </main>
        </div>
    </div>

</body>
</html>
