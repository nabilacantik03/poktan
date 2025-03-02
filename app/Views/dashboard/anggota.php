<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<!-- Header -->
<header class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Anggota</h1>
            <p class="text-gray-600">Kelola data anggota kelompok tani</p>
        </div>
        <?php if (session()->get('role') === 'admin'): ?>
        <button onclick="openAddModal()" 
                class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-medium rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <i class="ph ph-user-plus mr-2"></i>
            Tambah Anggota
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

<!-- Error Message -->
<?php if (session()->has('error')): ?>
<div class="mb-8 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
    <?= session('error') ?>
</div>
<?php endif; ?>

<!-- Members Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. HP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                    <?php if (session()->get('role') === 'admin'): ?>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (empty($anggota)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <div class="flex flex-col items-center">
                            <i class="ph ph-users text-4xl mb-2"></i>
                            <span>Belum ada anggota yang terdaftar</span>
                        </div>
                    </td>
                </tr>
                <?php else: ?>
                    <?php foreach ($anggota as $member): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center">
                                    <i class="ph ph-user text-gray-500"></i>
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900"><?= esc($member['name']) ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900"><?= esc($member['role']) ?></span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900"><?= esc($member['phone']) ?></span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-900"><?= esc($member['address']) ?></span>
                        </td>
                        <?php if (session()->get('role') === 'admin'): ?>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form class="inline delete-form" idAnggota="<?= $member['id'] ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <?= csrf_field(); ?>
                                <button type="button" 
                                        onclick="showDeleteConfirmation(<?= $member['id'] ?>, '<?= esc($member['name']) ?>')"
                                        class="text-red-600 hover:text-red-900 transition-colors">
                                    <i class="ph ph-trash"></i>
                                    Hapus
                                </button>
                            </form>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Member Modal -->
<div id="addModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Tambah Anggota</h3>
                    <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-500">
                        <i class="ph ph-x text-2xl"></i>
                    </button>
                </div>
                <form action="<?= base_url('dashboard/members') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                            <select id="role" 
                                    name="role" 
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Jabatan</option>
                                <option value="admin">Administartor</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea id="address" 
                                    name="address" 
                                    rows="3"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" 
                                class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Simpan
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
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus anggota "<span id="memberName" class="font-medium"></span>"?</p>
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
function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('addModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAddModal();
    }
});

let currentForm = null;

function showDeleteConfirmation(id, name) {
    const modal = document.getElementById('deleteModal');
    const modalContent = modal.querySelector('.bg-white');
    const memberName = document.getElementById('memberName');
    currentForm = event.target.closest('form');
    
    memberName.textContent = name;
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
        const idAnggota = currentForm.getAttribute('idAnggota');
        currentForm.setAttribute('action', `<?= base_url() ?>dashboard/members/${idAnggota}`);
        currentForm.setAttribute('method', 'POST');
        console.log(currentForm);
        currentForm.submit();
    }
    hideDeleteConfirmation();
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        hideDeleteConfirmation();
        closeAddModal();
    }
});
</script>

<?= $this->endSection() ?>