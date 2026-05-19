<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'nzrfzr_notes';

$conn = mysqli_connect($host, $user, $pass, $dbname);

$sequel = "SELECT id FROM konten";
$hasil = $conn->query($sequel);
$jumlah_konten = $hasil->num_rows;
$kosong = True;

if ($jumlah_konten > 0) {
    $kosong = false;
};
?>

