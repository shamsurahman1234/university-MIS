<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 flex font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-purple-600 to-pink-500 text-white min-h-[85vh] ml-6 mt-6 mb-6 p-6 flex flex-col justify-between rounded-3xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
        <div>
            <h1 class="font-extrabold text-3xl mb-12 text-center tracking-wider drop-shadow-lg animate-bounce">University System</h1>
            <nav class="flex flex-col gap-4">
                <a href="{{ route('universities.index') }}" class="flex items-center gap-4 px-6 py-3 rounded-3xl bg-white/10 backdrop-blur-md hover:bg-white/30 shadow-lg hover:shadow-2xl transition-all duration-300">
                    <i data-feather="book" class="stroke-[2]"></i> Universities
                </a>
                <a href="{{ route('faculties.index') }}" class="flex items-center gap-4 px-6 py-3 rounded-3xl bg-white/10 backdrop-blur-md hover:bg-white/30 shadow-lg hover:shadow-2xl transition-all duration-300">
                    <i data-feather="layers" class="stroke-[2]"></i> Faculties
                </a>
                <a href="{{ route('departments.index') }}" class="flex items-center gap-4 px-6 py-3 rounded-3xl bg-white/10 backdrop-blur-md hover:bg-white/30 shadow-lg hover:shadow-2xl transition-all duration-300">
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
        <nav class="bg-white p-4 rounded-3xl shadow-lg mb-8 flex justify-between items-center animate-pulse">
            <h2 class="font-bold text-2xl text-purple-600">@yield('page-title', 'Dashboard')</h2>
        </nav>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-2xl mb-6 shadow-inner font-medium animate-fadeIn">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Content -->
        <div class="bg-white rounded-3xl p-8 shadow-2xl">
            @yield('content')
        </div>
    </div>

    <script>
        feather.replace()  // Initialize Feather icons
    </script>
</body>
</html>
