<?php
$host = 'localhost';        
$username = 'worksmar_admin';         
$password = 'UIZaCzx_;2@b';            
$dbname = 'worksmar_worksmartful_db'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
