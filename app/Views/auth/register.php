<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .auth-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .auth-input {
            background: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 min-h-screen">
    <!-- Background Pattern -->
    <div class="fixed inset-0 -z-10 opacity-20">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23059669" fill-opacity="0.1" fill-rule="evenodd"%3E%3Ccircle cx="20" cy="20" r="3"/%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-md w-full">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 mb-4">
                    <i class="ph ph-plant text-3xl text-green-600"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">
                    Kelompok Tani Maju Bersama
                </h2>
                <p class="mt-3 text-base text-gray-600">
                    Daftar untuk bergabung dengan kami
                </p>
            </div>

            <!-- Alert Error -->
            <?php if (session()->has('errors')) : ?>
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative flex items-center gap-3" role="alert">
                    <i class="ph ph-warning text-xl"></i>
                    <?php foreach (session('errors') as $error) : ?>
                        <span class="block sm:inline"><?= $error ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Register Form -->
            <form class="mt-8 space-y-6" action="<?= base_url('auth/processRegister') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="auth-card rounded-2xl shadow-xl p-6 space-y-5 bg-white/80 backdrop-blur">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ph ph-user text-gray-400 text-lg"></i>
                            </div>
                            <input id="username" name="username" type="text" required 
                                class="auth-input appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all duration-200 sm:text-sm"
                                placeholder="Masukkan username">
                        </div>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1.5">Nomor HP</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ph ph-phone text-gray-400 text-lg"></i>
                            </div>
                            <input id="phone" name="phone" type="tel" required 
                                class="auth-input appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all duration-200 sm:text-sm"
                                placeholder="Masukkan nomor HP">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ph ph-lock text-gray-400 text-lg"></i>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="auth-input appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all duration-200 sm:text-sm"
                                placeholder="Masukkan password">
                        </div>
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="ph ph-lock-key text-gray-400 text-lg"></i>
                            </div>
                            <input id="confirm_password" name="confirm_password" type="password" required
                                class="auth-input appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all duration-200 sm:text-sm"
                                placeholder="Konfirmasi password">
                        </div>
                    </div>

                <div class="pt-2">
                    <button type="submit"
                        class="group relative w-full flex justify-center items-center gap-2 py-2.5 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 shadow-sm hover:shadow">
                        <i class="ph ph-user-plus text-lg"></i>
                        Daftar
                    </button>
                </div>

                </div>

                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun? 
                        <a href="<?= base_url('auth/login') ?>" class="font-semibold text-green-600 hover:text-green-500 transition-colors duration-200">
                            Masuk sekarang
                        </a>
                    </p>
                </div>
            </form>

            <!-- Back to Home -->
            <div class="text-center mt-8">
                <a href="<?= base_url() ?>" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="ph ph-arrow-left"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>
</html>
