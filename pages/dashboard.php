<?php
require '../controllers/function.php';
checkAuth();
$monthlyParticipants = getMonthlyParticipants();
$role = $_SESSION['role'];
$workshops = getWorkshopsWithMitra(); // Using the enhanced function
$actualEarnings = getTotalPenghasilanByMitraId($_SESSION['user_id']);

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
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/brand.css" rel="stylesheet">
  <style>
    .workshop-card {
    transition: transform 0.3s ease-in-out;
    border: none;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .workshop-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    .workshop-details {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .workshop-card .badge {
        padding: 8px 12px;
        font-weight: 500;
    }
  </style>
</head>

<body>

  <?php require 'header.php'; ?>
  <?php require 'sidebar.php'; ?>

  <main id="main" class="main brand-bg-color">

  <div class="pagetitle">
    <h1 class="text-light">Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <?php require 'alert.php'; ?>
  <section class="section dashboard">
      <!-- Dashboard untuk Admin -->
      <?php if($role=='admin'){ ?>
        <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Workshop Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Buka</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title brand-color">Total Workshop <span>| Hari Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <a href="./data-workshop.php">
                      <i class="bi bi-calendar-event"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6><?= $total_workshop=countWorkshops();?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Workshop Card -->

            <!-- Participants Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Buka</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title brand-color">Total Peserta <span>| Bulan Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="./data-peserta.php" style="color: green;">
                      <i class="bi bi-people"></i>
                  </a>
                    </div>
                    <div class="ps-3">
                      <h6><?= $total_user=countRowsUsersByRole('user'); ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Participants Card -->

            <!-- Mentors Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Buka</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title brand-color">Total Mitra <span>| Tahun Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="./data-mitra.php" style="color: orange;">
                        <i class="bi bi-person-badge"></i>
                    </a>
                    </div>
                    <div class="ps-3">
                      <h6><?= $total_user=countRowsUsersByRole('mitra'); ?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Mentors Card -->

            <!-- Participants Chart -->
            <div class="col-md-8">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title brand-color">Pendaftaran Peserta <span>/Bulanan</span></h5>

                  <!-- Bar Chart -->
                  <canvas id="barChart_peserta" style="max-height: 400px;"></canvas>
                  <!-- End Bar CHart -->

                </div>

              </div>
            </div>
            <!-- End Participants Chart -->

            <div class="col-md-4">
            <!-- Popular Workshops -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Menu</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Hari Ini</a></li>
                  <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                  <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title brand-color">Workshop Terdaftar <span>| Bulan Ini</span></h5>

                <div class="activity">
                  <?php $workshops = getPopularWorkshop(); 
                  foreach ($workshops as $workshop) { 
                    ?>
                  <div class="activity-item d-flex">
                    <div class="activite-label"><?= $workshop['totalpendaftar'];?></div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                      <?= $workshop['title'];?>
                    </div>
                  </div>
                  <?php } ?>
                </div>

              </div>
            </div>
            <!-- End Popular Workshops -->
            </div>

          </div>
        </div><!-- End Left side columns -->


        </div>
      <?php }else if($role=='user'){ ?>
        <!-- Dashboard Untuk Peserta -->

        <!-- Recap Data -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Workshop Diikuti</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <a href="./aktivitas.php">
                                <i class="bi bi-journal-check"></i></a>
                            </div>
                            <div class="ps-3">
                                <h6><?= getTotalWorkshopsJoined($_SESSION['user_id']) ?> Workshop</h6>
                                <span class="text-muted small pt-2">Total workshop yang diikuti</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pembayaran</h5>
                        <?php $payments = getTotalPaymentsMade($_SESSION['user_id']); ?>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>Rp <?= number_format($payments['total_amount'] ?? 0, 0, ',', '.') ?></h6>
                                <span class="text-muted small pt-2"><?= $payments['total_payments'] ?> transaksi berhasil</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

       <!--   Title Section -->
         
      <!-- Dashboard Mitra-->
      <?php }else if($role=='mitra'){ ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <!-- Participants Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title brand-color">Total Peserta</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= countMitraParticipants($_SESSION['user_id']) ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Workshops Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title brand-color">Total Workshop</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <a href="./data-workshop.php">
                                        <i class="bi bi-calendar-event"></i> </a>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= countMitraWorkshops($_SESSION['user_id']) ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings Actual Card -->
                    <div class="col-xxl-4 col-md-4">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title brand-color">Total Penghasilan</h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <a href="./data_keuangan_mitra.php" style="color: red;">
                <i class="bi bi-currency-dollar"></i>
            </a>
                </div>
                <div class="ps-3">
                    <!-- Pastikan $actualEarnings tidak null -->
                    <h6>Rp <?= number_format($actualEarnings ?? 0, 0, ',', '.') ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>


                    <!-- Participants Chart -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title brand-color">Statistik Peserta Workshop</h5>
                                <canvas id="mitraParticipantsChart" style="max-height: 400px;"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Workshop List -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title brand-color">Workshop Saya</h5>
                                <div class="activity">
                                    <?php 
                                    $mitraWorkshops = getMitraWorkshopsList($_SESSION['user_id']);
                                    foreach($mitraWorkshops as $workshop) { 
                                    ?>
                                    <div class="activity-item d-flex">
                                        <div class="activite-label"><?= $workshop['participant_count'] ?></div>
                                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                        <div class="activity-content">
                                            <a href="data-workshop.php"><?= $workshop['title'] ?></a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php } ?>
  </section>  
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="assets/js/autohide.js"></script>
<script>
// Single DOMContentLoaded event handler
document.addEventListener("DOMContentLoaded", () => {
    // Initialize search if user dashboard
    const searchInput = document.getElementById('searchWorkshop');
    if (searchInput) {
        initWorkshopSearch(searchInput);
    }

    // Initialize charts based on role
    initDashboardCharts();
});

// Workshop search functionality
function initWorkshopSearch(searchInput) {
    const workshopCards = document.querySelectorAll('.workshop-card');
    searchInput.addEventListener('keyup', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        workshopCards.forEach(card => {
            const searchableElements = {
                title: card.querySelector('.card-title'),
                description: card.querySelector('.card-text'),
                location: card.querySelector('.bi-geo-alt').parentElement
            };
            
            const isVisible = Object.values(searchableElements).some(element => 
                element.textContent.toLowerCase().includes(searchTerm)
            );
            
            card.closest('.col-lg-4').style.display = isVisible ? '' : 'none';
        });
    });
}

// Dashboard charts initialization
function initDashboardCharts() {
    const baseChartConfig = {
        type: 'bar',
        options: {
            scales: { y: { beginAtZero: true } },
            responsive: true,
            maintainAspectRatio: false
        }
    };

    // Admin/General participants chart
const participantsChart = document.querySelector('#barChart_peserta');
if (participantsChart) {
    // Mendapatkan data peserta dari server
    const participantData = <?= json_encode($monthlyParticipants ?? []); ?>;

    // Jika ada data yang kosong atau tidak terisi, pastikan data tetap konsisten
    const normalizedData = Array(12).fill(0);  // Inisialisasi array dengan 0 untuk setiap bulan
    participantData.forEach((value, index) => {
        if (index >= 0 && index < 12) {
            normalizedData[index] = value;  // Masukkan data yang valid ke bulan yang sesuai
        }
    });

    // Menghitung nilai maksimum pada data peserta untuk menyesuaikan skala Y
    const maxParticipants = Math.max(...normalizedData, 1); // Minimal 1 agar tidak terlalu kecil

    // Tentukan nilai maksimal untuk sumbu Y
    const maxScale = Math.max(100, Math.ceil(maxParticipants / 10) * 10); // Maksimal hingga 100 atau lebih

    new Chart(participantsChart, {
        ...baseChartConfig,
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Peserta Terdaftar',
                data: normalizedData,  // Gunakan data yang sudah dinormalisasi
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', 'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)', 'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)', 'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)', 'rgba(100, 100, 100, 0.2)',
                    'rgba(170, 128, 128, 0.2)', 'rgba(200, 130, 150, 0.2)',
                    'rgba(130, 180, 160, 0.2)', 'rgba(150, 130, 200, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)', 'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)', 'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)', 'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)', 'rgb(100, 100, 100)',
                    'rgb(170, 128, 128)', 'rgb(200, 130, 150)',
                    'rgb(130, 180, 160)', 'rgb(150, 130, 200)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: maxScale, // Maksimal sesuai skala yang ditentukan
                    ticks: {
                        stepSize: 10, // Interval 10, mulai dari 10, 20, 30, dst.
                        min: 0, // Mulai dari 0
                        max: maxScale // Maksimal hingga skala yang dihitung
                    }
                }
            }
        }
    });
}


   // Mitra participants chart
const mitraChart = document.querySelector('#mitraParticipantsChart');
if (mitraChart) {
    // Mendapatkan data peserta dari server
    let participantData = <?= json_encode(isset($_SESSION['user_id']) ? getMitraMonthlyParticipants($_SESSION['user_id']) : []); ?>;

    // Batasi data peserta dari 10 hingga 100
    participantData = participantData.map(value => Math.min(Math.max(value, 10), 100));

    // Mitra participants chart
const mitraChart = document.querySelector('#mitraParticipantsChart');
if (mitraChart) {
    // Mendapatkan data peserta dari server
    let participantData = <?= json_encode(isset($_SESSION['user_id']) ? getMitraMonthlyParticipants($_SESSION['user_id']) : []); ?>;

    // Menghitung nilai maksimum pada data peserta untuk menyesuaikan skala Y
    const maxParticipants = Math.max(...participantData, 1); // Minimal 1 agar tidak terlalu kecil

    // Tentukan nilai maksimal untuk sumbu Y agar grafik lebih proporsional
    const maxScale = 100; // Maksimal hingga 100, meskipun jumlah peserta lebih rendah

    new Chart(mitraChart, {
        ...baseChartConfig,
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Peserta Workshop',
                data: participantData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: maxScale, // Membatasi hingga 100
                    ticks: {
                        stepSize: 10, // Interval 10, mulai dari 10, 20, 30, dst.
                        min: 0, // Mulai dari 0
                        max: maxScale // Maksimal hingga 100
                    }
                }
            }
        }
    });
}
}
}
</script>

</body>

</html>