<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 flex font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-indigo-600 to-indigo-400 text-white min-h-screen p-6 flex flex-col justify-between rounded-r-3xl shadow-xl">
        <div>
            <h1 class="font-extrabold text-3xl mb-10 text-center tracking-wide drop-shadow-lg">University System</h1>
            <nav class="flex flex-col gap-4">
                <a href="{{ route('universities.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-white/20 transition-all duration-300 shadow-md">
                    <i data-feather="book" class="stroke-[2]"></i> Universities
                </a>
                <a href="{{ route('faculties.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-white/20 transition-all duration-300 shadow-md">
                    <i data-feather="layers" class="stroke-[2]"></i> Faculties
                </a>
                <a href="{{ route('departments.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-2xl hover:bg-white/20 transition-all duration-300 shadow-md">
                    <i data-feather="grid" class="stroke-[2]"></i> Departments
                </a>
            </nav>
        </div>
        <div class="text-center mt-6 text-sm opacity-80 tracking-wider">
            &copy; 2025 University System
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-10">
        <!-- Top Navbar -->
        <nav class="bg-white p-4 rounded-2xl shadow-md mb-8 flex justify-between items-center">
            <h2 class="font-bold text-2xl text-indigo-700">@yield('page-title', 'Dashboard')</h2>
        </nav>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-xl mb-6 shadow-inner font-medium">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Content -->
        <div class="bg-white rounded-3xl p-8 shadow-lg">
            @yield('content')
        </div>
    </div>

    <script>
        feather.replace()  // Initialize Feather icons
    </script>
</body>
</html>
