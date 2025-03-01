<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<!-- Header -->
<header class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="text-gray-600">Selamat datang kembali, <?= esc($user['name']) ?>!</p>
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
                <p class="text-2xl font-bold text-gray-900"><?= $totalMembers ?></p>
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
                <p class="text-2xl font-bold text-gray-900"><?= $totalActivities ?></p>
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
                <p class="text-2xl font-bold text-gray-900"><?= $totalGalleries ?></p>
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
                <p class="text-2xl font-bold text-gray-900"><?= count($recentAnnouncements) ?></p>
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
            <a href="<?= base_url('dashboard/activities') ?>" class="text-sm text-green-600 hover:text-green-700">Lihat Semua</a>
        </div>
        <div class="space-y-4">
            <?php foreach ($recentActivities as $activity): ?>
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="ph ph-calendar-check text-2xl text-green-600"></i>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900"><?= esc($activity['title']) ?></h3>
                    <p class="text-sm text-gray-600"><?= date('l, d F Y', strtotime($activity['date'])) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Latest Gallery -->
    <div class="bg-white p-6 rounded-2xl shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Galeri Terbaru</h2>
            <a href="<?= base_url('dashboard/gallery') ?>" class="text-sm text-green-600 hover:text-green-700">Lihat Semua</a>
        </div>
        <?php if (!empty($recentGalleries)): ?>
        <div class="grid grid-cols-2 gap-4">
            <?php foreach ($recentGalleries as $gallery): ?>
            <div class="aspect-square rounded-xl overflow-hidden">
                <img src="<?= base_url($gallery['image_path']) ?>" 
                     alt="<?= esc($gallery['title']) ?>" 
                     class="w-full h-full object-cover">
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-8 text-gray-500">
            <i class="ph ph-image-square text-4xl mb-2"></i>
            <p>Belum ada foto di galeri</p>
        </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
