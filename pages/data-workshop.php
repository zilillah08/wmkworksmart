<?php
require '../controllers/function.php';
checkAuth();

$user_role = $_SESSION['role']; // Mengambil role pengguna
$user_id = $_SESSION['user_id']; // Mengambil user_id dari sesi

if ($user_role === 'admin') {
    // Jika pengguna adalah admin, tampilkan semua workshop
    $workshops = getAllWorkshopsForAdmin();
} else {
    // Jika pengguna bukan admin, tampilkan workshop berdasarkan mitra_id mereka
    $workshops = getWorkshopByMitraId($user_id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - WorkSmart</title>
  <meta content="WorkSmart" name="description">
  <meta content="WorkSmart" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-worksmart.png" rel="icon">
  <link href="assets/img/logo-worksmart.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  
  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/brand.css" rel="stylesheet">
  
</head>

<body>

  <?php require 'header.php'; ?>
  <?php require 'sidebar.php'; ?>

  <main id="main" class="main brand-bg-color">

    <div class="pagetitle">
      <h1 class="text-light">Data Workshop</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Data Workshop</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php require 'alert.php'; ?>
    <section class="section dashboard">
          <div class="row">

            <!-- Full side columns -->
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Data Workshop</h5>
                  <p class="text-dark">Berikut adalah daftar peserta yang terdaftar dalam sistem.</p>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#tambahWorkshop" class="brand-btn btn mt-2 mb-4 rounded-pill" 
                  <?php if ($_SESSION['role'] !== 'mitra') echo 'style="display:none;"'; ?>>
                  <i class="bi bi-person-plus me-2"></i>Tambah Workshop
              </a>                  <a href="#" onclick="location.reload();" class="brand-btn btn mt-2 mb-4 rounded-pill"><i class="bi bi-arrow-clockwise me-2"></i>Refresh</a>              
                                
                <!-- Fetch Data Workshop dari db -->
                <div class="table-responsive">
                  <table class="table table-striped table-hover dt-responsive nowrap" id="participantTable" style="width:100%">
                  <thead>
                  <tr>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th>Banner</th>
                      <th>Gambaran Pelatihan</th>
                      <th>Kompetensi Yang Diajarkan</th>
                      <th>Sesi</th>
                      <th>Persyaratan</th>
                      <th>Manfaat</th>
                      <th>Harga</th>
                      <th>Tipe</th>
                      <th>media_pembelajaran</th>
                      <th>Lokasi Pelatihan</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Status</th>
                      <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($workshops as $workshop) {
                  ?>
                  <tr>
                      <td><?= $workshop['title'] ?></td>
                      <td><?= $workshop['description'] ?></td>
                      <td><img src="assets/img/workshops/<?= $workshop['banner'] ?>" width="50"></td>
                      <td><?= $workshop['training_overview'] ?></td>
                      <td><?= $workshop['trained_competencies'] ?></td>
                      <td><?= $workshop['training_session'] ?></td>
                      <td><?= $workshop['requirements'] ?></td>
                      <td><?= $workshop['benefits'] ?></td>
                      <td>Rp <?= number_format($workshop['price'],0,',','.') ?></td>
                      <td><?= $workshop['tipe'] ?></td>
                      <td><?= $workshop['media_pembelajaran'] ?></td>
                      <td><?= $workshop['location'] ?></td>
                      <td><?= date('d/m/Y', strtotime($workshop['start_date'])) ?></td>
                      <td><?= date('d/m/Y', strtotime($workshop['end_date'])) ?></td>
                      <td><?= $workshop['status'] ?></td>
                      <td class="text-center">
                      <div class="btn-group" role="group">
                          <button type="button" class="btn btn-sm btn-outline-warning me-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal<?= $workshop['workshop_id'] ?>" title="Edit"><i class="bi bi-pencil-square"></i></button>
                          <a onclick="return confirm('Apakah Anda yakin ingin menghapus workshop ini?')" href="../controllers/controller.php?deleteWorkshop=<?= $workshop['workshop_id'] ?>" class="btn btn-sm btn-outline-danger rounded-pill" title="Hapus"><i class="bi bi-trash"></i></a>
                      </div>
                      </td>
                  </tr>

                      <!-- Modal for editing workshop -->
                      <div class="modal fade" id="editModal<?= $workshop['workshop_id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $workshop['workshop_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header brand-bg-color text-white">
                                      <h5 class="modal-title" id="editModalLabel<?= $workshop['workshop_id'] ?>"><i class="bi bi-pencil-square me-2"></i>Edit Workshop</h5>
                                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="../controllers/controller.php" method="POST" enctype="multipart/form-data">
                                          <input type="hidden" name="workshop_id" value="<?= $workshop['workshop_id'] ?>">
                                          <input type="hidden" name="old_banner" value="<?= $workshop['banner'] ?>">

                                          <!-- Fields that will be read-only for Admin -->
                                          <div class="mb-3">
                                              <label for="title" class="form-label">Judul</label>
                                              <input type="text" class="form-control" id="title" name="title" value="<?= $workshop['title'] ?>" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required>
                                          </div>

                                          <div class="mb-3">
                                              <label for="description" class="form-label">Deskripsi</label>
                                              <textarea class="form-control" id="description" name="description" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required><?= $workshop['description'] ?></textarea>
                                          </div>

                                          <div class="mb-3">
                                          <label for="banner" class="form-label">Banner</label>
                                          <input type="file" class="form-control" id="banner" name="banner" <?= ($user_role === 'admin') ? 'disabled' : '' ?>>
                                          <small class="text-muted">Biarkan kosong jika tidak ingin mengubah banner</small>
                                      </div>

                                          <div class="mb-3">
                                              <label for="training_overview" class="form-label">Gambaran Pelatihan</label>
                                              <textarea class="form-control" id="training_overview" name="training_overview" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required><?= $workshop['training_overview'] ?></textarea>
                                          </div>

                                          <div class="mb-3">
                                              <label for="trained_competencies" class="form-label">Kompetensi Yang Diajarkan</label>
                                              <textarea class="form-control" id="trained_competencies" name="trained_competencies" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required><?= $workshop['trained_competencies'] ?></textarea>
                                          </div>

                                          <div class="mb-3">
                                              <label for="training_session" class="form-label">Sesi</label>
                                              <textarea class="form-control" id="training_session" name="training_session" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required><?= $workshop['training_session'] ?></textarea>
                                          </div>

                                          <div class="mb-3">
                                              <label for="requirements" class="form-label">Persyaratan</label>
                                              <textarea class="form-control" id="requirements" name="requirements" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required><?= $workshop['requirements'] ?></textarea>
                                          </div>

                                          <div class="mb-3">
                                              <label for="benefits" class="form-label">Manfaat</label>
                                              <textarea class="form-control" id="benefits" name="benefits" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required><?= $workshop['benefits'] ?></textarea>
                                          </div>

                                          <div class="mb-3">
                                              <label for="price" class="form-label">Harga</label>
                                              <input type="number" class="form-control" id="price" name="price" value="<?= $workshop['price'] ?>" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required>
                                          </div>

                                          <div class="mb-3">
                                          <label for="tipe" class="form-label">Tipe</label>
                                          <select class="form-select" id="tipe" name="tipe" 
                                                  <?= ($user_role === 'admin') ? 'disabled' : '' ?> required>
                                              <option value=" " disabled selected>Pilih</option>
                                              <option value="online" <?= $workshop['tipe'] == 'online' ? 'selected' : '' ?>>Online</option>
                                              <option value="offline" <?= $workshop['tipe'] == 'offline' ? 'selected' : '' ?>>Offline</option>
                                          </select>
                                          <!-- Kirim nilai tipe sebagai input tersembunyi jika pengguna adalah admin -->
                                          <?php if ($user_role === 'admin'): ?>
                                              <input type="hidden" name="tipe" value="<?= $workshop['tipe'] ?>">
                                          <?php endif; ?>
                                      </div>

                                          <!-- Media Pembelajaran Field (editable only by Admin) -->
                                          <div class="mb-3">
                                              <label for="media_pembelajaran" class="form-label">Media Pembelajaran</label>
                                              <?php if ($user_role === 'admin'): ?>
                                                  <input type="text" class="form-control" id="media_pembelajaran" name="media_pembelajaran" value="<?= $workshop['media_pembelajaran'] ?>" required>
                                              <?php else: ?>
                                                  <input type="text" class="form-control" name="media_pembelajaran" value="<?= htmlspecialchars($workshop['media_pembelajaran']) ?>" readonly>
                                              <?php endif; ?>
                                          </div>

                                          <div class="mb-3">
                                              <label for="location" class="form-label">Lokasi</label>
                                              <input type="text" class="form-control" id="location" name="location" value="<?= $workshop['location'] ?>" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required>
                                          </div>

                                          <div class="mb-3">
                                              <label for="start_date" class="form-label">Tanggal Mulai</label>
                                              <input type="date" class="form-control" id="start_date" name="start_date" value="<?= date('Y-m-d', strtotime($workshop['start_date'])) ?>" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required>
                                          </div>

                                          <div class="mb-3">
                                              <label for="end_date" class="form-label">Tanggal Selesai</label>
                                              <input type="date" class="form-control" id="end_date" name="end_date" value="<?= date('Y-m-d', strtotime($workshop['end_date'])) ?>" <?= ($user_role === 'admin') ? 'readonly' : '' ?> required>
                                          </div>

                                          <div class="mb-3">
                                              <label for="status" class="form-label">Status</label>
                                              <select class="form-select" id="status" name="status" <?= ($user_role === 'admin') ? 'disabled' : '' ?> required>
                                                  <option value="active" <?= $workshop['status'] == 'active' ? 'selected' : '' ?>>Aktif</option>
                                                  <option value="inactive" <?= $workshop['status'] == 'inactive' ? 'selected' : '' ?>>Tidak Aktif</option>
                                                  <option value="cancelled" <?= $workshop['status'] == 'cancelled' ? 'selected' : '' ?>>Dibatalkan</option>
                                              </select>
                                          </div>

                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                              <button type="submit" name="updateWorkshop" class="btn btn-primary brand-bg-color">Simpan Perubahan</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>


                    <?php } ?>
                    </tbody>

                    </table>
                  </div>

                </div>
              </div>
            </div>
            <!-- Full side columns -->


          </div>
    </section>  
  </main>
  <!-- End #main -->

  <?php require "modals.php";?>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer brand-bg-color">
    <div class="copyright text-light">
      © Copyright <strong><span>WorkSmart</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  
  <!-- DataTables JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/autohide.js"></script>

  <!-- Initialize DataTable -->
  <script>
    $(document).ready(function() {
      $('#participantTable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        buttons: [
          {
            extend: 'copy',
            className: 'btn btn-sm btn-primary'
          },
          {
            extend: 'excel',
            className: 'btn btn-sm btn-success'
          },
          {
            extend: 'pdf',
            className: 'btn btn-sm btn-danger'
          },
          {
            extend: 'print',
            className: 'btn btn-sm btn-info'
          }
        ],  
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records...",
          lengthMenu: "_MENU_ records per page",
          info: "Showing _START_ to _END_ of _TOTAL_ entries",
          paginate: {
            first: '<i class="bi bi-chevron-double-left"></i>',
            previous: '<i class="bi bi-chevron-left"></i>',
            next: '<i class="bi bi-chevron-right"></i>',
            last: '<i class="bi bi-chevron-double-right"></i>'
          }
        },
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        order: [[0, 'asc']],
        drawCallback: function() {
          $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
      });
    });
  </script>

</body>

</html>