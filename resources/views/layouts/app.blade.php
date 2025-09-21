<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <h1 class="font-bold text-xl">University System</h1>
            <div class="space-x-4">
                <a href="{{ route('universities.index') }}" class="hover:underline">Universities</a>
                <a href="{{ route('faculties.index') }}" class="hover:underline">Faculties</a>
                <a href="{{ route('departments.index') }}" class="hover:underline">Departments</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto py-6">
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
