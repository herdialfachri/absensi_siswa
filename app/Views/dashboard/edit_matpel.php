<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Edit Jadwal
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Jadwal</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Jadwal</h6>
            </div>
            <div class="card-body">
                <form action="/schedules/update/<?= $schedule['id']; ?>" method="post">
                    <div class="form-group">
                        <label for="class_id">Kelas</label>
                        <select class="form-control" id="class_id" name="class_id" required>
                            <?php foreach ($classes as $class) : ?>
                                <option value="<?= $class['id']; ?>" <?= $class['id'] == $schedule['class_id'] ? 'selected' : ''; ?>><?= $class['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject_id">Mata Pelajaran</label>
                        <select class="form-control" id="subject_id" name="subject_id" required>
                            <?php foreach ($subjects as $subject) : ?>
                                <option value="<?= $subject['id']; ?>" <?= $subject['id'] == $schedule['subject_id'] ? 'selected' : ''; ?>><?= $subject['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="teacher_id">Guru</label>
                        <select class="form-control" id="teacher_id" name="teacher_id" required>
                            <?php foreach ($teachers as $teacher) : ?>
                                <option value="<?= $teacher['id']; ?>" <?= $teacher['id'] == $schedule['teacher_id'] ? 'selected' : ''; ?>><?= $teacher['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Jadwal</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $schedule['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="day">Hari</label>
                        <select class="form-control" id="day" name="day" required>
                            <option value="Senin" <?= $schedule['day'] == 'Senin' ? 'selected' : ''; ?>>Senin</option>
                            <option value="Selasa" <?= $schedule['day'] == 'Selasa' ? 'selected' : ''; ?>>Selasa</option>
                            <option value="Rabu" <?= $schedule['day'] == 'Rabu' ? 'selected' : ''; ?>>Rabu</option>
                            <option value="Kamis" <?= $schedule['day'] == 'Kamis' ? 'selected' : ''; ?>>Kamis</option>
                            <option value="Jumat" <?= $schedule['day'] == 'Jumat' ? 'selected' : ''; ?>>Jumat</option>
                            <option value="Sabtu" <?= $schedule['day'] == 'Sabtu' ? 'selected' : ''; ?>>Sabtu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time">Waktu</label>
                        <input type="time" class="form-control" id="time" name="time" value="<?= $schedule['time']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/schedules" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
