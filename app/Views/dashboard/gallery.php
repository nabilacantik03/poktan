<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<!-- Header -->
<header class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Galeri</h1>
            <p class="text-gray-600">Dokumentasi kegiatan kelompok tani</p>
        </div>
        <?php if (session()->get('role') === 'admin'): ?>
        <button onclick="openUploadModal()" 
                class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-medium rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <i class="ph ph-upload-simple mr-2"></i>
            Upload Media
        </button>
        <?php endif; ?>
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
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden group border">
            <div class="aspect-[16/9] relative">
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
                    <form class="inline delete-form" idMedia="<?= $gallery['id'] ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <?= csrf_field(); ?>
                        <button type="button" 
                                onclick="showDeleteConfirmation(<?php echo $gallery['id']; ?>, '<?php echo esc($gallery['title']); ?>')"
                                class="p-2 text-white hover:text-red-400 transition-colors"
                                title="Hapus">
                            <i class="ph ph-trash text-xl"></i>
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
            <div class="p-4 border-t border-dashed">
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

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl p-6 max-w-sm mx-4 w-full transform transition-all duration-300 scale-95 opacity-0">
        <div class="text-center">
            <div class="w-16 h-16 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4">
                <i class="ph ph-warning-circle text-3xl text-red-500"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Hapus</h3>
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus media "<span id="mediaTitle" class="font-medium"></span>"?</p>
            <div class="flex justify-center gap-3">
                <button onclick="hideDeleteConfirmation()" 
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 font-medium">
                    Batal
                </button>
                <button onclick="confirmDelete()" 
                        class="px-4 py-2 bg-red-500 text-white rounded-xl hover:bg-red-600 transition-all duration-200 font-medium flex items-center gap-2">
                    <i class="ph ph-trash"></i>
                    Hapus
                </button>
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

let currentForm = null;

function showDeleteConfirmation(id, title) {
    const modal = document.getElementById('deleteModal');
    const modalContent = modal.querySelector('.bg-white');
    const mediaTitle = document.getElementById('mediaTitle');
    currentForm = event.target.closest('form');
    
    mediaTitle.textContent = title;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    // Animate in
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function hideDeleteConfirmation() {
    const modal = document.getElementById('deleteModal');
    const modalContent = modal.querySelector('.bg-white');
    
    // Animate out
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        currentForm = null;
        // Restore body scroll
        document.body.style.overflow = 'auto';
    }, 200);
}

function confirmDelete() {
    if (currentForm) {
        const idMedia = currentForm.getAttribute('idMedia');
        currentForm.setAttribute('action', `<?= base_url() ?>/dashboard/gallery/${idMedia}`);
        currentForm.setAttribute('method', 'POST');
        currentForm.submit();
    }
    hideDeleteConfirmation();
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        hideDeleteConfirmation();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        hideDeleteConfirmation();
    }
});
</script>

<?= $this->endSection() ?>
