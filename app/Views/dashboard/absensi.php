<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Daftar Presensi
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Presensi</h1>
    <a href="<?= base_url('/create'); ?>" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Presensi</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="searchNis" class="form-label">Silakan masukkan NIS (Nomor Induk Siswa) untuk mencari data siswa yang diinginkan:</label>
                    <input type="text" id="searchNis" class="form-control" placeholder="Masukkan NIS disini...">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Jadwal</th>
                                <th>Siswa</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="attendanceTable">
                            <?php if (!empty($attendanceRecords)) : ?>
                                <?php foreach ($attendanceRecords as $record) : ?>
                                    <tr>
                                        <td><?= $record['id']; ?></td>
                                        <td><?= $record['student_nis']; ?></td>
                                        <td><?= $record['day'] . ', ' . $record['time']; ?></td>
                                        <td><?= $record['student_name']; ?></td>
                                        <td><?= $record['student_class']; ?></td>
                                        <td><?= $record['status']; ?></td>
                                        <td><?= $record['note'] ?? '-'; ?></td>
                                        <td>
                                            <a href="<?= base_url('/attendance_records/edit/' . $record['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
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

<script>
    document.getElementById('searchNis').addEventListener('input', function() {
        const nis = this.value;

        // Jika input kosong, reload seluruh data
        if (nis === '') {
            fetch('<?= base_url('/reload-attendance'); ?>', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    updateTable(data); // Fungsi untuk memperbarui tabel
                })
                .catch(error => console.error('Error:', error));
            return;
        }

        // Jika ada input, lakukan pencarian
        fetch('<?= base_url('/search-attendance'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    nis: nis
                })
            })
            .then(response => response.json())
            .then(data => {
                updateTable(data); // Fungsi untuk memperbarui tabel
            })
            .catch(error => console.error('Error:', error));
    });

    // Fungsi untuk memperbarui tabel
    function updateTable(data) {
        const tableBody = document.getElementById('attendanceTable');
        tableBody.innerHTML = ''; // Bersihkan tabel sebelum menambahkan data baru

        if (data.length > 0 && !data.message) {
            data.forEach((record, index) => {
                tableBody.innerHTML += `
            <tr>
                <td>${index + 1}</td>
                <td>${record.student_nis}</td>
                <td>${record.day}, ${record.time}</td>
                <td>${record.student_name}</td>
                <td>${record.student_class}</td>
                <td>${record.status}</td>
                <td>${record.note}</td>
                <td>
                    <a href="${record.edit_url}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            `;
            });
        } else {
            tableBody.innerHTML = '<tr><td colspan="8" class="text-center">Data tidak ditemukan.</td></tr>';
        }
    }
</script>

<?= $this->endSection() ?>