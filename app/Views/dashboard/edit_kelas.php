<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Daftar Kelas
<?= $this->endSection() ?>

<?= $this->section('sidebar') ?>
<hr class="sidebar-divider my-0">
<li class="nav-item ">
    <a class="nav-link" href="/dashboard_admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Beranda</span></a>
</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
    Menu
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-arrow-down"></i>
        <span>Data Sekolah</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/subjects">Data Pelajaran</a>
            <a class="collapse-item" href="/students">Data Siswa</a>
            <a class="collapse-item" href="/teachers">Data Guru</a>
            <a class="collapse-item" href="/classes">Data Kelas</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-arrow-up"></i>
        <span>Absensi</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/schedules">Jadwal Pelajaran</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider d-none d-md-block">
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Kelas</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Kelas</h6>
            </div>
            <div class="card-body">
                <form action="/classes/update/<?= $class['id']; ?>" method="post">
                    <div class="form-group">
                        <label for="name">Nama Kelas</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $class['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="teacher_id">Wali Kelas</label>
                        <select class="form-control" id="teacher_id" name="teacher_id" required>
                            <?php foreach ($teachers as $teacher) : ?>
                                <option value="<?= $teacher['id']; ?>" <?= $teacher['id'] == $class['teacher_id'] ? 'selected' : ''; ?>><?= $teacher['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/classes" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
