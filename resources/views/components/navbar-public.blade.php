<nav class="bg-white border-b border-gray-200 sticky top-0 z-30">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between h-14">

            <a href="{{ route('public.events.index') }}" class="font-semibold text-lg text-indigo-600">
                Event Management
            </a>

            {{-- Menu desktop --}}
            <div class="hidden md:flex items-center gap-1 text-sm">
                <a href="{{ route('public.events.index') }}"
                   class="px-3 py-2 rounded-md {{ request()->routeIs('public.events.*') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                    Event
                </a>
                <a href="#" class="px-3 py-2 rounded-md text-gray-600 hover:text-indigo-600">Tentang</a>
                <a href="#" class="px-3 py-2 rounded-md text-gray-600 hover:text-indigo-600">Kontak</a>

                <span class="mx-2 h-5 w-px bg-gray-200"></span>

                <a href="#" class="px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100">Masuk</a>
                <a href="#" class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">Daftar</a>
            </div>

            {{-- Tombol menu mobile --}}
            <button type="button" class="md:hidden p-2 rounded hover:bg-gray-100" aria-label="Buka menu"
                    onclick="document.getElementById('public-mobile-menu').classList.toggle('hidden')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Menu mobile --}}
        <div id="public-mobile-menu" class="hidden md:hidden pb-3 space-y-1 text-sm">
            <a href="{{ route('public.events.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Event</a>
            <a href="#" class="block px-3 py-2 rounded-md hover:bg-gray-100">Tentang</a>
            <a href="#" class="block px-3 py-2 rounded-md hover:bg-gray-100">Kontak</a>
            <div class="flex gap-2 pt-2">
                <a href="#" class="flex-1 text-center px-3 py-2 rounded-md border border-gray-300">Masuk</a>
                <a href="#" class="flex-1 text-center px-3 py-2 rounded-md bg-indigo-600 text-white">Daftar</a>
            </div>
        </div>
    </div>
</nav>