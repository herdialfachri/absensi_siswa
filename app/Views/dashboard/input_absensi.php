<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>

Tambah Absensi

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Absensi</h1>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Absensi</h6>
            </div>
            <div class="card-body">
                <form action="<?= site_url('/save'); ?>" method="post">
                    <div class="form-group">
                        <label for="schedule_id">Jadwal</label>
                        <select class="form-control" id="schedule_id" name="schedule_id" required onchange="updateScheduleDetails()">
                            <?php foreach ($schedules as $schedule) : ?>
                                <option value="<?= $schedule['id']; ?>"
                                    data-teacher="<?= $schedule['teacher_name']; ?>"
                                    data-subject="<?= $schedule['subject_name']; ?>"
                                    data-class="<?= $schedule['class_id']; ?>">
                                    <?= $schedule['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Guru</label>
                        <input type="text" id="teacher_name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" id="subject_name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" id="class_id" name="class_id" class="form-control" readonly>
                    </div>
                    <div id="studentsTable" class="mt-4">
                        <!-- Tabel siswa akan ditampilkan di sini -->
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mb-2">Simpan Absensi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateScheduleDetails() {
        const schedule = document.getElementById('schedule_id');
        const selectedOption = schedule.options[schedule.selectedIndex];

        document.getElementById('teacher_name').value = selectedOption.getAttribute('data-teacher');
        document.getElementById('subject_name').value = selectedOption.getAttribute('data-subject');
        document.getElementById('class_id').value = selectedOption.getAttribute('data-class');

        loadStudents(selectedOption.getAttribute('data-class'));
    }

    function loadStudents(classId) {
        fetch(`/students/by-class/${classId}`)
            .then(response => response.json())
            .then(data => {
                const tableContainer = document.getElementById('studentsTable');
                let tableHTML = `
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Status</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

                data.forEach(student => {
                    tableHTML += `
                    <tr>
                        <td>${student.name}</td>
                        <td>
                            <select name="status_${student.id}" class="form-control">
                                <option value="present">Hadir</option>
                                <option value="absent">Alfa</option>
                                <option value="sick">Sakit</option>
                                <option value="permission">Izin</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="note_${student.id}" class="form-control">
                        </td>
                    </tr>
                `;
                });

                tableHTML += `
                    </tbody>
                </table>
            `;

                tableContainer.innerHTML = tableHTML;
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateScheduleDetails();
    });
</script>

<?= $this->endSection() ?>