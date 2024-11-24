<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Edit Absensi
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Absensi</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/attendance_records/update/' . $record['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" value="<?= $record['student_nis']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" value="<?= $record['student_name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="class">Kelas</label>
                        <input type="text" class="form-control" id="class" value="<?= $record['student_class']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Hadir" <?= $record['status'] == 'Hadir' ? 'selected' : ''; ?>>Hadir</option>
                            <option value="Sakit" <?= $record['status'] == 'Sakit' ? 'selected' : ''; ?>>Sakit</option>
                            <option value="Izin" <?= $record['status'] == 'Izin' ? 'selected' : ''; ?>>Izin</option>
                            <option value="Alfa" <?= $record['status'] == 'Alfa' ? 'selected' : ''; ?>>Alfa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Catatan</label>
                        <textarea name="note" id="note" class="form-control"><?= $record['note']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('/attendance_records'); ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>