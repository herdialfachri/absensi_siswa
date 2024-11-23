<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Daftar Kelas
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Kelas</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kelas</th>
                                <th>Guru</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($classes)) : ?>
                                <?php foreach ($classes as $class) : ?>
                                    <tr>
                                        <td><?= $class['id']; ?></td>
                                        <td><?= $class['name']; ?></td>
                                        <td><?= $class['teacher_name']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data.</td>
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
