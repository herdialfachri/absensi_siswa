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
                                    data-class-id="<?= $schedule['class_id']; ?>"
                                    data-class-name="<?= $schedule['class_name']; ?>"
                                    data-day="<?= $schedule['day']; ?>">
                                    <?= $schedule['name'] . ' - ' . $schedule['day']; ?>
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
                        <!-- Untuk ditampilkan -->
                        <input type="text" id="class_name" class="form-control" readonly>
                        <!-- Untuk disimpan -->
                        <input type="hidden" id="class_id" name="class_id">
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

        // Isi data guru, mata pelajaran, dan nama kelas
        document.getElementById('teacher_name').value = selectedOption.getAttribute('data-teacher');
        document.getElementById('subject_name').value = selectedOption.getAttribute('data-subject');
        document.getElementById('class_name').value = selectedOption.getAttribute('data-class-name'); // Nama kelas untuk ditampilkan
        document.getElementById('class_id').value = selectedOption.getAttribute('data-class-id'); // ID kelas untuk disimpan

        // Muat siswa berdasarkan class_id
        loadStudents(selectedOption.getAttribute('data-class-id'));
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
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
        `;

                data.forEach((student, index) => {
                    tableHTML += `
                <tr>
                    <td>${index + 1}</td> <!-- Penomoran -->
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