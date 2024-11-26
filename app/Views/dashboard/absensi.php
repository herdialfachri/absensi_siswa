<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>
Daftar Presensi
<?= $this->endSection() ?>

<?= $this->section('sidebar') ?>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item ">
    <a class="nav-link" href="/dashboard_admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Beranda</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-arrow-up"></i>
        <span>Absensi</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/attendance_records">Absen</a>
            <a class="collapse-item" href="/create">Lakukan Absen</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Presensi</h1>
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
                    <input type="text" id="searchNis" class="form-control" placeholder="Masukkan NIS disini untuk mencari data siswa">
                    <input type="date" id="searchTanggal" class="form-control mt-2" placeholder="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Tanggal</th>
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
                                        <td><?= $record['tanggal']; ?></td>
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
                                    <td colspan="9" class="text-center">Tidak ada data.</td>
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
    document.getElementById('searchNis').addEventListener('input', searchAttendance);
    document.getElementById('searchTanggal').addEventListener('change', searchAttendance);

    function searchAttendance() {
        const nis = document.getElementById('searchNis').value;
        const tanggal = document.getElementById('searchTanggal').value;

        if (!nis && !tanggal) {
            // Jika input kosong, reload seluruh data
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

        fetch('<?= base_url('/search-attendance'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    nis: nis,
                    tanggal: tanggal
                })
            })
            .then(response => response.json())
            .then(data => {
                updateTable(data); // Fungsi untuk memperbarui tabel
            })
            .catch(error => console.error('Error:', error));
    }


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
                <td>${record.attendance_date}</td> <!-- Menggunakan attendance_date -->
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
            tableBody.innerHTML = '<tr><td colspan="9" class="text-center">Data tidak ditemukan.</td></tr>';
        }
    }
</script>

<?= $this->endSection() ?>