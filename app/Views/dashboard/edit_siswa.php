<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Edit Siswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Siswa</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Siswa</h6>
            </div>
            <div class="card-body">
                <form action="/students/update/<?= $student['id']; ?>" method="post">
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" id="class_id" name="class_id" required>
                            <?php foreach ($classes as $class) : ?>
                                <option value="<?= $class['id']; ?>" <?= $class['id'] == $student['class_id'] ? 'selected' : ''; ?>><?= $class['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $student['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $student['nis']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $student['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $student['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3"><?= $student['address']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/students" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
