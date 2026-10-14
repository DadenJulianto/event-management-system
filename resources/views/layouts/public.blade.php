<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Event Management')</title>
    {{-- Tailwind via CDN (khusus tes layout) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <x-navbar-public />

    <main class="flex-1">
        <div class="max-w-6xl mx-auto px-4 py-8">
            @yield('content')
        </div>
    </main>

    <footer class="border-t border-gray-200 bg-white">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-500 text-center">
            &copy; {{ date('Y') }} Event Management. Semua hak dilindungi.
        </div>
    </footer>

</body>
</html>