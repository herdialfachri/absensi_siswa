<?= $this->extend('tmp/template') ?>

<?= $this->section('title') ?>

Export Laporan Absensi

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
            <a class="collapse-item" href="/attendance_export/view">Riwayat Absen</a>
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

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Export Laporan Absensi</h1>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Unduh Laporan Absensi</h6>
            </div>
            <div class="card-body">
                <form id="exportForm">
                    <div class="form-group">
                        <label for="filter_class_id">Kelas</label>
                        <select class="form-control" id="filter_class_id" name="class_id">
                            <option value="">Semua Kelas</option>
                            <?php foreach ($classes as $class) : ?>
                                <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filter_subject_id">Mata Pelajaran</label>
                        <select class="form-control" id="filter_subject_id" name="subject_id">
                            <option value="">Semua Mata Pelajaran</option>
                            <?php foreach ($subjects as $subject) : ?>
                                <option value="<?= $subject['id']; ?>"><?= $subject['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="#" onclick="downloadAttendanceReport()" class="btn btn-success mb-2">Download Laporan Absensi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function downloadAttendanceReport() {
        const classId = document.getElementById('filter_class_id').value;
        const subjectId = document.getElementById('filter_subject_id').value;
        
        let url = '/attendance_export';
        if (classId || subjectId) {
            url += '?';
            if (classId) {
                url += 'class_id=' + classId;
            }
            if (subjectId) {
                if (classId) {
                    url += '&';
                }
                url += 'subject_id=' + subjectId;
            }
        }
        
        window.location.href = url;
    }
</script>

<?= $this->endSection() ?>
