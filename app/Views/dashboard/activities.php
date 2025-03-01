<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<!-- Header -->
<header class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kegiatan</h1>
            <p class="text-gray-600">Daftar kegiatan kelompok tani</p>
        </div>
        <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('dashboard/activities/create') ?>" 
           class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-medium rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <i class="ph ph-plus mr-2"></i>
            Tambah Kegiatan
        </a>
        <?php endif; ?>
    </div>
</header>

<!-- Success Message -->
<?php if (session()->has('success')): ?>
<div class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
    <?= session('success') ?>
</div>
<?php endif; ?>

<!-- Activities List -->
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b-2 border-gray-100">
                        <th class="pb-4 font-semibold text-gray-900">Judul</th>
                        <th class="pb-4 font-semibold text-gray-900">Tanggal</th>
                        <th class="pb-4 font-semibold text-gray-900">Lokasi</th>
                        <th class="pb-4 font-semibold text-gray-900">Dibuat Oleh</th>
                        <th class="pb-4 font-semibold text-gray-900 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($activities)): ?>
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500">
                            Belum ada kegiatan yang ditambahkan.
                        </td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($activities as $activity): ?>
                        <tr>
                            <td class="py-4">
                                <div class="font-medium text-gray-900"><?= esc($activity['title']) ?></div>
                                <div class="text-sm text-gray-500"><?= substr(esc($activity['description']), 0, 100) ?>...</div>
                            </td>
                            <td class="py-4">
                                <div class="text-gray-900"><?= date('d F Y', strtotime($activity['date'])) ?></div>
                                <?php if (!empty($activity['time'])): ?>
                                <div class="text-sm text-gray-500"><?= date('H:i', strtotime($activity['time'])) ?> WIB</div>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 text-gray-900"><?= esc($activity['location']) ?></td>
                            <td class="py-4 text-gray-900"><?= esc($activity['created_by']) ?></td>
                            <td class="py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?= base_url('dashboard/activities/' . $activity['id']) ?>" 
                                       class="p-2 text-gray-500 hover:text-gray-700" 
                                       title="Detail">
                                        <i class="ph ph-eye text-lg"></i>
                                    </a>
                                    <?php if (session()->get('role') === 'admin'): ?>
                                    <a href="<?= base_url('dashboard/activities/' . $activity['id'] . '/edit') ?>" 
                                       class="p-2 text-gray-500 hover:text-gray-700" 
                                       title="Edit">
                                        <i class="ph ph-pencil-simple text-lg"></i>
                                    </a>
                                    <form action="<?= base_url('dashboard/activities/' . $activity['id']) ?>" 
                                          method="post" 
                                          class="inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" 
                                                class="p-2 text-gray-500 hover:text-red-600" 
                                                title="Hapus">
                                            <i class="ph ph-trash text-lg"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <?php if ($pager && $pager->getPageCount() > 1): ?>
    <div class="px-6 py-4 border-t border-gray-100">
        <?= $pager->links('activities', 'tailwind') ?>
    </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>