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
                <a href="/" class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center">
                        <!-- <i class="ph ph-plant text-2xl text-green-600"></i> -->
                        <img src="<?= base_url('img/logo.png') ?>" />
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="text-xl font-bold text-gray-900">Ngudi</span>
                        <span class="text-xl font-bold text-green-600">Kamulyan</span>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2">
                <a href="<?= base_url('dashboard') ?>" 
                   class="flex items-center gap-3 px-4 py-2.5 <?= current_url() == base_url('dashboard') ? 'text-green-600 bg-green-50' : 'text-gray-700 hover:text-green-600 hover:bg-green-50' ?> rounded-xl font-medium transition-all duration-200">
                    <i class="ph ph-squares-four text-lg"></i>
                    <span>Dashboard</span>
                </a>
                <a href="<?= base_url('dashboard/profile') ?>" 
                   class="flex items-center gap-3 px-4 py-2.5 <?= current_url() == base_url('dashboard/profile') ? 'text-green-600 bg-green-50' : 'text-gray-700 hover:text-green-600 hover:bg-green-50' ?> rounded-xl font-medium transition-all duration-200">
                    <i class="ph ph-user text-lg"></i>
                    <span>Profil</span>
                </a>
                <a href="<?= base_url('dashboard/activities') ?>" 
                   class="flex items-center gap-3 px-4 py-2.5 <?= current_url() == base_url('dashboard/activities') ? 'text-green-600 bg-green-50' : 'text-gray-700 hover:text-green-600 hover:bg-green-50' ?> rounded-xl font-medium transition-all duration-200">
                    <i class="ph ph-calendar text-lg"></i>
                    <span>Kegiatan</span>
                </a>
                <a href="<?= base_url('dashboard/gallery') ?>" 
                   class="flex items-center gap-3 px-4 py-2.5 <?= current_url() == base_url('dashboard/gallery') ? 'text-green-600 bg-green-50' : 'text-gray-700 hover:text-green-600 hover:bg-green-50' ?> rounded-xl font-medium transition-all duration-200">
                    <i class="ph ph-image text-lg"></i>
                    <span>Galeri</span>
                </a>
                <a href="<?= base_url('dashboard/members') ?>" 
                   class="flex items-center gap-3 px-4 py-2.5 <?= current_url() == base_url('dashboard/members') ? 'text-green-600 bg-green-50' : 'text-gray-700 hover:text-green-600 hover:bg-green-50' ?> rounded-xl font-medium transition-all duration-200">
                    <i class="ph ph-users text-lg"></i>
                    <span>Anggota</span>
                </a>
            </nav>

            <!-- User Menu -->
            <div class="p-4 border-t">
                <a href="<?= base_url('auth/logout') ?>" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all duration-200">
                    <i class="ph ph-sign-out text-lg"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-8">
        <?= $this->renderSection('content') ?>
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
