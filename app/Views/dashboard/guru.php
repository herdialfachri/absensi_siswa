<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Daftar Guru
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Guru</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($teachers)) : ?>
                                <?php foreach ($teachers as $teacher) : ?>
                                    <tr>
                                        <td><?= $teacher['id']; ?></td>
                                        <td><?= $teacher['name']; ?></td>
                                        <td><?= $teacher['nip']; ?></td>
                                        <td><?= $teacher['phone']; ?></td>
                                        <td><?= $teacher['email']; ?></td>
                                        <td><?= $teacher['address'] ?? '-'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data.</td>
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
