<?php
require '../controllers/function.php';
checkAuthorized();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Worksmart</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-worksmart.png" rel="icon">
  <link href="assets/img/logo-worksmart.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/brand.css" rel="stylesheet">
  
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Password Toggle Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const togglePassword = document.querySelector('#togglePassword');
      const passwordField = document.querySelector('#password');
      
      togglePassword.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Show' : 'Hide';
      });
    });
  </script>
  

  <style>
    body {
      background-color: #003366;
      font-family: 'Arial', sans-serif;
    }

    .card-header {  
      border-bottom: none;
      font-size: 1.25rem;
    }

    .btn-primary {
      background-color: #d3d3d3;
      border: none;
      color: #003366;
      font-weight:lighter;
    }

    .link-primary {
      color: #003366;
      text-decoration: none;
    }

    .link-primary:hover {
      text-decoration: underline;
    }

    .password-input {
      border-radius: 8px 0 0 8px;
    }

    .password-toggle {
      border-radius: 0 8px 8px 0;
      padding: 12px;
    }
  </style>
</head>

<body>
  <main>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6">
          <div class="card rounded-4 mt-4 mb-4">
            <div class="card-header brand-color">
              Log in to your account
            </div>
            <div class="card-body">
              <p class="text-muted">Masuk untuk mengakses fitur eksklusif, kolaborasi dengan mitra, dan kelola workshop Anda dengan mudah di Worksmart.</p>

              <!-- Form Login -->
              <form method="POST" action="../controllers/controller.php">
                <div class="mb-3">
                  <label for="email" class="form-label brand-color">Email address</label>
                  <input type="text" class="form-control p-3 rounded-3" id="email" name="username_email" placeholder="Email address" required>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label brand-color">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control password-input p-3" id="password" name="password" placeholder="password" required>
                    <button type="button" id="togglePassword" class="btn btn-outline-secondary password-toggle">Hide</button>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="role" class="form-label brand-color">Login sebagai</label>
                  <select class="form-select p-3 rounded-3" id="role" name="role" required>
                    <option value="">-- Pilih --</option>
                    <option value="mitra">Mitra</option>
                    <option value="user">Peserta</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>

                <!-- Tampilkan pesan error login -->
                <?php
                if (isset($_SESSION['login_error'])) {
                  echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                  echo "<script>window.alert('login error');</script>";
                  unset($_SESSION['login_error']);
                }
                ?>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <button type="submit" name="login" class="btn btn-primary rounded-pill btn-lg w-100">Log in</button>
                  </div>
                  <div class="col-md-6 d-flex align-items-center justify-content-end">
                  <a href="forgot_password.php" class="link-primary">Forgot your password?</a>
                  </div>
                </div>

             <!--   <div class="text-center mb-3">
                  <span>Or log in with</span>
                </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-lg w-100"><i class="bi bi-facebook me-2"></i> Facebook</button>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-lg w-100"><i class="bi bi-google me-2"></i> Google</button>
                  </div>
                </div>  -->              
                
                <div class="text-muted text-center">
                  Not a member? Get exclusive access to exhibitions and events, free admission every day, and much more. <a href="#" class="link-primary">Join today</a>.
                </div>
              </form>            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card rounded-4 mt-4 mb-4">
            <div class="card-header brand-color">
              Create your new account
            </div>
            <div class="card-body">
              <p class="text-muted">Gabung dengan Worksmart untuk melihat workshop atau mengelola workshop, bertemu dengan mitra baru, dan menjangkau audiens yang lebih luas.</p>
              <div class="d-grid">
                <a type="button" class="btn btn-outline-primary btn-lg rounded-pill" href="register.php">Create an account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </main>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>