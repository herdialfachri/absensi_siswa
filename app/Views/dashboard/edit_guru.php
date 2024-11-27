<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Edit Guru
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
    <h1 class="h3 mb-0 text-gray-800">Edit Guru</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Guru</h6>
            </div>
            <div class="card-body">
                <form action="/teachers/update/<?= $teacher['id']; ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <select class="form-control" id="username" name="username" required>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user['username']; ?>" <?= $user['id'] == $teacher['user_id'] ? 'selected' : ''; ?>><?= $user['username']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Guru</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $teacher['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $teacher['nip']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $teacher['phone']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $teacher['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3"><?= $teacher['address']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/teachers" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>