<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Dashboard') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white border-r border-gray-200 z-40">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="p-4 border-b">
                <a href="#" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="ph ph-plant text-2xl text-green-600"></i>
                    </div>
                    <div class="flex items-center">
                        <span class="text-2xl font-bold text-gray-900">Tani</span>
                        <span class="text-2xl font-bold text-green-600">Maju</span>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2">
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-2.5 text-green-600 bg-green-50 rounded-xl font-medium">
                    <i class="ph ph-squares-four text-lg"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/dashboard/profile" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-user text-lg"></i>
                    <span>Profil</span>
                </a>
                <a href="/dashboard/activities" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-calendar text-lg"></i>
                    <span>Kegiatan</span>
                </a>
                <a href="/dashboard/gallery" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-image text-lg"></i>
                    <span>Galeri</span>
                </a>
                <a href="/dashboard/members" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-users text-lg"></i>
                    <span>Anggota</span>
                </a>
            </nav>

            <!-- User Menu -->
            <div class="p-4 border-t">
                <div class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all duration-200 cursor-pointer">
                    <i class="ph ph-sign-out text-lg"></i>
                    <span>Keluar</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-8">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-gray-600">Selamat datang kembali!</p>
        </header>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Anggota -->
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="ph ph-users text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total Anggota</p>
                        <p class="text-2xl font-bold text-gray-900">24</p>
                    </div>
                </div>
            </div>

            <!-- Kegiatan Bulan Ini -->
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="ph ph-calendar text-2xl text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Kegiatan Bulan Ini</p>
                        <p class="text-2xl font-bold text-gray-900">8</p>
                    </div>
                </div>
            </div>

            <!-- Total Galeri -->
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <i class="ph ph-image text-2xl text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total Galeri</p>
                        <p class="text-2xl font-bold text-gray-900">156</p>
                    </div>
                </div>
            </div>

            <!-- Pengumuman -->
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                        <i class="ph ph-megaphone text-2xl text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Pengumuman</p>
                        <p class="text-2xl font-bold text-gray-900">3</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Upcoming Activities -->
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Kegiatan Mendatang</h2>
                    <a href="/dashboard/activities" class="text-sm text-green-600 hover:text-green-700">Lihat Semua</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="ph ph-tree text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">Pelatihan Pertanian Organik</h3>
                            <p class="text-sm text-gray-600">Sabtu, 15 Maret 2025</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="ph ph-users-three text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">Rapat Anggota Bulanan</h3>
                            <p class="text-sm text-gray-600">Minggu, 23 Maret 2025</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Latest Gallery -->
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">Galeri Terbaru</h2>
                    <a href="/dashboard/gallery" class="text-sm text-green-600 hover:text-green-700">Lihat Semua</a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-square rounded-xl overflow-hidden">
                        <img src="https://source.unsplash.com/featured/?farming" alt="Gallery 1" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden">
                        <img src="https://source.unsplash.com/featured/?agriculture" alt="Gallery 2" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden">
                        <img src="https://source.unsplash.com/featured/?harvest" alt="Gallery 3" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden">
                        <img src="https://source.unsplash.com/featured/?farm" alt="Gallery 4" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
        });
    </script>
</body>
</html>
