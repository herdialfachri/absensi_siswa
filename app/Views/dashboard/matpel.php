<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Daftar Jadwal
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Jadwal</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Guru</th>
                                <th>Nama</th>
                                <th>Hari</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($schedules)) : ?>
                                <?php foreach ($schedules as $schedule) : ?>
                                    <tr>
                                        <td><?= $schedule['id']; ?></td>
                                        <td><?= $schedule['class_name']; ?></td>
                                        <td><?= $schedule['subject_name']; ?></td>
                                        <td><?= $schedule['teacher_name']; ?></td>
                                        <td><?= $schedule['name']; ?></td>
                                        <td><?= $schedule['day']; ?></td>
                                        <td><?= $schedule['time']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data.</td>
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
