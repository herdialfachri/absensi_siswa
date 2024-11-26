<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Edit Pengguna
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<form action="<?= base_url('/users/update/' . $user['id']) ?>" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Password (Kosongkan jika tidak ingin mengganti)</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role">
            <option value="teacher" <?= $user['role'] == 'teacher' ? 'selected' : '' ?>>Teacher</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="master" <?= $user['role'] == 'master' ? 'selected' : '' ?>>Master</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>
