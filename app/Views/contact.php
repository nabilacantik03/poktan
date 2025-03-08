<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
    <h2 class="mb-4">Kirim Pesan</h2>
    
    <form id="contactForm">
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No. Telepon</label>
            <input type="tel" class="form-control" id="no_telepon" name="no_telepon" required>
        </div>
        
        <div class="mb-3">
            <label for="subjek" class="form-label">Subjek</label>
            <input type="text" class="form-control" id="subjek" name="subjek" required>
        </div>
        
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
    </form>
</div>

<script src="/js/contact.js"></script>
<?= $this->endSection(); ?>
