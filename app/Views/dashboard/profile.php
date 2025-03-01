<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<!-- Header -->
<header class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Profil Saya</h1>
    <p class="text-gray-600">Kelola informasi profil Anda</p>
</header>

<!-- Profile Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Card -->
    <div class="lg:col-span-1">
        <div class="bg-white p-6 rounded-2xl shadow-sm">
            <div class="text-center mb-6">
                <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="ph ph-user text-4xl text-green-600"></i>
                </div>
                <h2 class="text-xl font-semibold text-gray-900"><?= esc($user['name']) ?></h2>
                <p class="text-sm text-gray-600"><?= ucfirst(esc($user['role'])) ?></p>
            </div>
            
            <!-- User Stats -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-900"><?= $stats['totalActivities'] ?></p>
                    <p class="text-sm text-gray-600">Kegiatan</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-900"><?= $stats['totalGalleries'] ?></p>
                    <p class="text-sm text-gray-600">Galeri</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-900"><?= $stats['totalAnnouncements'] ?></p>
                    <p class="text-sm text-gray-600">Pengumuman</p>
                </div>
            </div>

            <!-- Last Activity -->
            <?php if ($stats['lastActivity']): ?>
            <div class="border-t pt-4">
                <h3 class="text-sm font-medium text-gray-900 mb-2">Aktivitas Terakhir</h3>
                <div class="bg-gray-50 p-3 rounded-xl">
                    <p class="font-medium text-gray-900"><?= esc($stats['lastActivity']['title']) ?></p>
                    <p class="text-sm text-gray-600"><?= date('d F Y', strtotime($stats['lastActivity']['date'])) ?></p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="lg:col-span-2">
        <div class="bg-white p-6 rounded-2xl shadow-sm">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Edit Profil</h2>

            <?php if (session()->has('success')): ?>
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                <?= session('success') ?>
            </div>
            <?php endif; ?>

            <?php if (session()->has('errors')): ?>
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                <ul class="list-disc list-inside">
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="<?= base_url('dashboard/profile/update') ?>" method="post" class="space-y-6">
                <?= csrf_field() ?>

                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" id="name" 
                           value="<?= old('name', $user['name']) ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Username (Readonly) -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" id="username" 
                           value="<?= esc($user['username']) ?>"
                           class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-xl" readonly>
                    <p class="mt-1 text-sm text-gray-500">Username tidak dapat diubah</p>
                </div>

                <!-- No. HP -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">No. HP</label>
                    <input type="tel" name="phone" id="phone" 
                           value="<?= old('phone', $user['phone']) ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                    <textarea name="address" id="address" rows="3" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"><?= old('address', $user['address']) ?></textarea>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                    <input type="password" name="password" id="password" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengubah password</p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_password" id="confirm_password" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
