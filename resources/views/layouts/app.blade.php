<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-600 text-white min-h-screen p-6">
        <h1 class="font-bold text-2xl mb-6">University System</h1>
        <nav class="flex flex-col space-y-4">
            <a href="{{ route('universities.index') }}" class="hover:bg-blue-700 p-2 rounded">Universities</a>
            <a href="{{ route('faculties.index') }}" class="hover:bg-blue-700 p-2 rounded">Faculties</a>
            <a href="{{ route('departments.index') }}" class="hover:bg-blue-700 p-2 rounded">Departments</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <!-- Top Navbar -->
        <nav class="bg-white p-4 rounded shadow mb-6 flex justify-between items-center">
            <h2 class="font-bold text-xl">@yield('page-title', 'Dashboard')</h2>
            <div>
                <!-- Optional user info / logout -->
            </div>
        </nav>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <!-- Page Content -->
        @yield('content')
    </div>

</body>
</html>
