<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard - Meal Management System</title>
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

@include('components.message')

<body class="bg-gray-50">
    
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md transform transition-transform duration-300 ease-in-out md:translate-x-0 -translate-x-full fixed md:relative z-30 h-full" id="sidebar">
            <div class="p-4 border-b">
                <h1 class="text-xl font-bold text-gray-800">Meal Management</h1>
                <p class="text-xs text-red-600 font-medium">Manager Dashboard</p>
            </div>
            <nav class="mt-6">
                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase">Main Navigation</div>
                <a href="{{ route('manager.overview') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 {{ Route::is('manager.overview') ? 'sidebar-active' : '' }}" data-page="manager-overview">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                    <span>Overview</span>
                </a>
                <a href="{{ route('manager.members') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 {{ Route::is('manager.members') ? 'sidebar-active' : '' }}" data-page="manager-members">
                    <i class="fas fa-users w-5 mr-3"></i>
                    <span>Manage Members</span>
                </a>
                <a href="{{ route('manager.role') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 {{ Route::is('manager.role') ? 'sidebar-active' : '' }}" data-page="manager-role-management">
                    <i class="fas fa-user-cog w-5 mr-3"></i>
                    <span>Role Management</span>
                </a>
               
                <a href="{{ route('manager.expenses') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 {{ Route::is('manager.expenses') ? 'sidebar-active' : '' }}" data-page="manager-expense-heads">
                    <i class="fas fa-list-alt w-5 mr-3"></i>
                    <span>Expense Heads</span>
                </a>
               
                <a href="{{ route('manager.reports') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 {{ Route::is('manager.reports') ? 'sidebar-active' : '' }}" data-page="manager-reports">
                    <i class="fas fa-chart-bar w-5 mr-3"></i>
                    <span>Reports</span>
                </a>
                <a href="{{ route('manager.search') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 {{ Route::is('manager.search') ? 'sidebar-active' : '' }}" data-page="manager-search">
                    <i class="fas fa-search w-5 mr-3"></i>
                    <span>Search Members</span>
                </a>
                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase mt-4">Account</div>
                <a href="{{ route('manager.profile') }}" class="nav-link flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 {{ Route::is('manager.profile') ? 'sidebar-active' : '' }}" data-page="manager-profile">
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
                            <h2 class="text-lg font-semibold text-gray-800" id="pageTitle"></h2>
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
                                <div class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center text-white">
                                    <span>MN</span>
                                </div>
                                 <div>
                                    <span class="hidden md:block font-medium text-gray-700">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <p class="text-gray-400 text-sm -mt-1">
                                        {{ Auth::user()->role }}
                                    </p>
                                </div>
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
        function showNewMemberForm() {
            const form = document.getElementById('new-member-form');
            form.classList.toggle('hidden');
        }



    </script>
    
    <script>
    function showNewExpenseForm() {
        const form = document.getElementById('new-expense-form');

        // Toggle the hidden class
        form.classList.toggle('hidden');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // Arrays to store table values
    let names = [];
    let meals = [];
    let totalBills = [];
    let paidAmounts = [];

    // Loop through table rows
    document.querySelectorAll("tbody tr").forEach(row => {
        const cells = row.querySelectorAll("td");

        const name = cells[0].innerText.trim();
        const meal = parseFloat(cells[1].innerText.trim());
        const totalBill = parseFloat(cells[4].innerText.replace("Tk.", "").trim());
        const paid = parseFloat(cells[7].innerText.replace("Tk.", "").trim());

        names.push(name);
        meals.push(meal);
        totalBills.push(totalBill);
        paidAmounts.push(paid);
    });

    // -------------------------------
    // 1. MEAL DISTRIBUTION PIE CHART
    // -------------------------------
    const ctx1 = document.getElementById('mealChart').getContext('2d');
    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: names,
            datasets: [{
                data: meals,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // ----------------------------------------
    // 2. INCOME VS TOTAL BILL GROUP BAR CHART
    // ----------------------------------------
    const ctx2 = document.getElementById('incomeChart').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: names,
            datasets: [
                {
                    label: 'Paid',
                    data: paidAmounts,
                    borderWidth: 1
                },
                {
                    label: 'Total Bill',
                    data: totalBills,
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

});
</script>



</body>
</html>
