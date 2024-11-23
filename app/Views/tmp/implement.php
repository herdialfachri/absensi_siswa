<!-- Implementasi untuk view admin -->
<?= $this->extend('template/admin_template') ?>

<?= $this->section('title') ?>

Daftar Pelanggan

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pelanggan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <?php if ($pelanggan) : ?>
                        <?php foreach ($pelanggan as $p) : ?>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                                <div class="card h-100" style="width: 100%;">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= esc($p['nama_pelanggan']); ?></h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Kode Pelanggan: <?= esc($p['kode_pelanggan']); ?></li>
                                        <li class="list-group-item">Alamat: <?= esc($p['alamat_pelanggan']); ?></li>
                                        <li class="list-group-item">Kontak: <?= esc($p['kontak_pelanggan']); ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No data found</p>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-center">
                    <?= $pager->links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>