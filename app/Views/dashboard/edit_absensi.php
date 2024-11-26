<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Edit Absensi
<?= $this->endSection() ?>

<?= $this->section('sidebar') ?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-address-book" aria-hidden="true"></i>
        <span>Absensi</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/schedules">Jadwal Pelajaran</a>
            <a class="collapse-item" href="/attendance_records">Absen</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

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