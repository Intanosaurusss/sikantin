<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Wrapper -->
    <div class="flex h-screen" x-data="{ sidebarOpen: false }">

        <!-- Sidebar -->
        <div 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
            class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transition-transform transform lg:translate-x-0 lg:static z-50">
            <div class="flex items-center justify-between p-4">
            <div class="flex items-center">
        <!-- foto profile -->
            <a href="{{ route('profile', ['id' => Auth::id()]) }}" class="inline-block ml-4">
                <img 
                    src="{{ asset(Auth::user()->foto_profile ?? 'images/default-profile.jpg') }}" 
                    alt="Profile user" 
                    class="w-12 h-12 rounded-full object-cover"
                />
            </a>

                <!-- Kontainer teks user dan user2, disusun vertikal -->
                <div class="ml-2 flex flex-col">
                    <p class="font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-600">{{ Auth::user()->kelas }}</p>
                </div>
            </div>

            <!-- button x menutup sidebar -->
                <button 
                    @click="sidebarOpen = false" 
                    class="lg:hidden p-2 rounded-md bg-purple-100 text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>

                </button>
            </div>
            <nav class="">
                <ul class="ml-4 mr-4 space-y-2 mt-2 text-gray-800">
                    
                    <li class="flex items-center px-4 py-2 rounded-xl space-x-4 {{ request()->is('dashboard-user') ? 'bg-purple-400 text-white' : 'hover:bg-purple-300' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                        <a href="{{ route('pages-user.dashboard-user') }}">Dashboard</a>
                    </li>

                    <li class="flex items-center px-4 py-2 rounded-xl space-x-4 {{ request()->is('keranjang-user') ? 'bg-purple-400 text-white' : 'hover:bg-purple-300' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                    </svg>
                        <a href="{{ route('pages-user.keranjang-user') }}">Keranjang</a>
                    </li>

                    <li class="flex items-center px-4 py-2 rounded-xl space-x-4 {{ request()->is('riwayat-user') ? 'bg-purple-400 text-white' : 'hover:bg-purple-300' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                    </svg>
                        <a href="riwayat-user">Riwayat</a>
                    </li>

                    <li id="logout-user" class="flex items-center px-4 py-2 hover:bg-red-200 rounded-xl space-x-4 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                        <a href="#">Logout</a>
                    </li>

                </ul>
            </nav>
        </div>

        <!-- Popup Logout Confirmation -->
        <div id="confirmationLogout" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50 text-sm md:text-lg">
            <div class="bg-white py-6 px-12 rounded-lg shadow-lg">
                <p class="text-center text-gray-700">Yakin mau logout?</p>
                <div class="mt-4 flex justify-center gap-6">
                    <button id="cancelLogout" class="bg-white text-green-500 border border-green-500 py-2 px-4 rounded-xl hover:bg-green-500 hover:text-white">Tidak</button>
                    <button id="confirmLogout" class="bg-white border border-red-500 text-red-500 py-2 px-4 rounded-xl hover:bg-red-500 hover:text-white">Ya</button>
                </div>
            </div>
        </div>

        <!-- Overlay (untuk layar kecil) -->
        <div 
            x-show="sidebarOpen" 
            @click="sidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 lg:hidden"></div>

        <!-- Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow p-4 flex items-center justify-start">
                <!-- button ☰ membuka sidebar -->
                <button 
                    @click="sidebarOpen = true" 
                    class="lg:hidden p-2 bg-purple-100 text-gray-700 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </button>
                <h5 class="text-md font-semibold pl-2 text-gray-700">@yield('title')</h5>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-6 overflow-auto">
                @yield('content')
            </main>
        </div>
    </div>

<!-- Script for Popup Logic -->
<script>
    // Menampilkan popup saat tombol logout diklik
    document.getElementById('logout-user').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('confirmationLogout').classList.remove('hidden');
    });

    // Mengonfirmasi logout dan redirect ke halaman lain
    document.getElementById('confirmLogout').addEventListener('click', function() {
        document.getElementById('confirmationLogout').classList.add('hidden');
        window.location.href = '/'; // Ganti '/' dengan URL halaman tujuan setelah logout
    });

    // Membatalkan logout dan menutup popup
    document.getElementById('cancelLogout').addEventListener('click', function() {
        document.getElementById('confirmationLogout').classList.add('hidden');
    });
</script>
</body>
</html>