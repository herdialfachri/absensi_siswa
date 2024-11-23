<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Daftar Siswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Siswa</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Kelas</th> <!-- Kolom kelas -->
                                <th>Dibuat</th>
                                <th>Diperbarui</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($students)) : ?>
                                <?php foreach ($students as $student) : ?>
                                    <tr>
                                        <td><?= $student['id']; ?></td>
                                        <td><?= $student['name']; ?></td>
                                        <td><?= $student['nis']; ?></td>
                                        <td><?= $student['email']; ?></td>
                                        <td><?= $student['phone']; ?></td>
                                        <td><?= $student['address']; ?></td>
                                        <td><?= $student['class_name']; ?></td> <!-- Menampilkan nama kelas -->
                                        <td><?= $student['created_at'] ?? '-'; ?></td>
                                        <td><?= $student['updated_at'] ?? '-'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
