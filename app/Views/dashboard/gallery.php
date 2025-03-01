<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<!-- Header -->
<header class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Galeri</h1>
            <p class="text-gray-600">Dokumentasi kegiatan kelompok tani</p>
        </div>
        <button onclick="openUploadModal()" 
                class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-medium rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <i class="ph ph-upload-simple mr-2"></i>
            Upload Media
        </button>
    </div>
</header>

<!-- Success Message -->
<?php if (session()->has('success')): ?>
<div class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
    <?= session('success') ?>
</div>
<?php endif; ?>

<!-- Gallery Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php if (empty($galleries)): ?>
    <div class="col-span-full">
        <div class="text-center py-12 bg-white rounded-2xl">
            <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="ph ph-image text-3xl text-gray-400"></i>
            </div>
            <h3 class="text-gray-500">Belum ada media yang diunggah</h3>
        </div>
    </div>
    <?php else: ?>
        <?php foreach ($galleries as $gallery): ?>
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden group">
            <div class="aspect-w-16 aspect-h-9 relative">
                <img src="<?= base_url('uploads/gallery/' . $gallery['file_name']) ?>" 
                     alt="<?= esc($gallery['title']) ?>"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                    <a href="<?= base_url('uploads/gallery/' . $gallery['file_name']) ?>" 
                       target="_blank"
                       class="p-2 text-white hover:text-green-400 transition-colors"
                       title="Lihat">
                        <i class="ph ph-eye text-xl"></i>
                    </a>
                    <?php if (session()->get('role') === 'admin'): ?>
                    <?= form_open('dashboard/gallery/' . $gallery['id'], ['method' => 'delete', 'class' => 'inline', 'onsubmit' => 'return confirm("Apakah Anda yakin ingin menghapus media ini?");']) ?>
                        <button type="submit" 
                                class="p-2 text-white hover:text-red-400 transition-colors"
                                title="Hapus">
                            <i class="ph ph-trash text-xl"></i>
                        </button>
                    <?= form_close() ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-medium text-gray-900 mb-1"><?= esc($gallery['title']) ?></h3>
                <p class="text-sm text-gray-500"><?= date('d F Y', strtotime($gallery['created_at'])) ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Pagination -->
<?php if (isset($pager) && $pager->getPageCount() > 1): ?>
<div class="mt-8">
    <?= $pager->links('galleries', 'tailwind') ?>
</div>
<?php endif; ?>

<!-- Upload Modal -->
<div id="uploadModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Upload Media</h3>
                    <button onclick="closeUploadModal()" class="text-gray-400 hover:text-gray-500">
                        <i class="ph ph-x text-2xl"></i>
                    </button>
                </div>
                <form action="<?= base_url('dashboard/gallery') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="3"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
                        </div>
                        <div>
                            <label for="media" class="block text-sm font-medium text-gray-700 mb-1">Media</label>
                            <input type="file" 
                                   id="media" 
                                   name="media" 
                                   required
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            <p class="mt-1 text-sm text-gray-500">Format yang didukung: JPG, PNG, GIF. Maksimal 2MB.</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" 
                                class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openUploadModal() {
    document.getElementById('uploadModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeUploadModal() {
    document.getElementById('uploadModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('uploadModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeUploadModal();
    }
});
</script>

<?= $this->endSection() ?>
