<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil email dan password baru dari form
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'worksmart1');
    if ($conn->connect_error) {
        die('Could not connect to the database');
    }

    // Update password di database dengan prepared statement untuk menghindari SQL Injection
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT); // Hash password

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $new_password_hash, $email);

    if ($stmt->execute()) {
        // Cek apakah ada baris yang terupdate
        if ($stmt->affected_rows > 0) {
            // Redirect ke halaman success.php jika berhasil
            header("Location: success.php");
            exit(); // Pastikan script berhenti setelah redirect
        } else {
            echo "No changes made or email not found.";
        }
    } else {
        echo "Error updating password: " . $stmt->error;
    }

    // Menutup statement dan koneksi ke database
    $stmt->close();
    $conn->close();
}
?>
