<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Event Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">

    {{-- Sidebar (opsional: hanya tampil jika halaman mengisi @section('sidebar')) --}}
    @hasSection('sidebar')
        <div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/50 hidden md:hidden"
             onclick="toggleSidebar()"></div>

        <aside id="sidebar"
               class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-900 text-gray-100
                      -translate-x-full transition-transform duration-200
                      md:translate-x-0 md:sticky md:top-0 md:h-screen md:shrink-0">
            @yield('sidebar')
        </aside>
    @endif

    <div class="flex-1 flex flex-col min-w-0">

        {{-- Topbar --}}
        <header class="h-14 bg-white border-b border-gray-200 flex items-center justify-between px-4">
            <div class="flex items-center gap-3">
                @hasSection('sidebar')
                    <button type="button" class="md:hidden p-2 -ml-2 rounded hover:bg-gray-100"
                            onclick="toggleSidebar()" aria-label="Buka menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                @else
                    <a href="{{ route('public.events.index') }}" class="font-semibold text-indigo-600">Event Management</a>
                @endif
                <h1 class="text-base font-semibold">@yield('page_title', 'Dashboard')</h1>
            </div>

            <div class="flex items-center gap-3 text-sm">
                <span class="hidden sm:inline text-gray-600">Nama Pengguna</span>
                <div class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-semibold">NP</div>
                <a href="#" class="text-gray-500 hover:text-red-600">Keluar</a>
            </div>
        </header>

        {{-- Konten --}}
        <main class="flex-1 p-4 md:p-6">

            @if (session('success'))
                <div class="mb-4 flex items-start justify-between rounded-md border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="ml-4" onclick="this.parentElement.remove()">&times;</button>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 flex items-start justify-between rounded-md border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="ml-4" onclick="this.parentElement.remove()">&times;</button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar')?.classList.toggle('-translate-x-full');
        document.getElementById('sidebar-overlay')?.classList.toggle('hidden');
    }
</script>
</body>
</html>