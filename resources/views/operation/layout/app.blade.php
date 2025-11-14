<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operations Dashboard - Meal Management System</title>
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
        .stat-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

    @include('components.message')

<body class="bg-gray-50">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md transform transition-transform duration-300 ease-in-out md:translate-x-0 -translate-x-full fixed md:relative z-30 h-full" id="sidebar">
            <div class="p-4 border-b">
                <h1 class="text-xl font-bold text-gray-800">Meal Management</h1>
                <p class="text-xs text-blue-600 font-medium">Operations Dashboard</p>
            </div>
            <nav class="mt-6">
                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase">Main Navigation</div>
                <a href="{{ route('operation.overview') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600  {{ Route::is('operation.overview') ? 'sidebar-active' : '' }}" data-page="operations-overview">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                    <span>Overview</span>
                </a>
                <a href="{{ route('operation.bazars') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ Route::is('operation.bazars') ? 'sidebar-active' : '' }}" data-page="operations-bazar">
                    <i class="fas fa-shopping-cart w-5 mr-3"></i>
                    <span>Daily Bazar</span>
                </a>
               
                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase mt-4">Account</div>
                <a href="{{ route('operation.profile') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600  {{ Route::is('operation.profile') ? 'sidebar-active' : '' }}" data-page="operations-profile">
                    <i class="fas fa-user-cog w-5 mr-3"></i>
                    <span>Profile Settings</span>
                </a>
                <a href="index.html" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                    <span>Logout</span>
                </a>
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
                                <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                    <span>OM</span>
                                </div>
                                <span class="hidden md:block font-medium text-gray-700">Operations Manager</span>
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

 <script>
    function showNewBazarForm() {
        const form = document.getElementById('bazarForm');

        // Toggle the hidden class
        form.classList.toggle('hidden');
    }
</script>
</body>
</html>
