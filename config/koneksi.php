<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'nzrfzr_notes';

$conn = mysqli_connect($host, $user, $pass, $dbname);

$sql = "SELECT id FROM konten";
$result = $conn->query($sql);
$jumlah_konten = $result->num_rows;
$kosong = True;

if ($jumlah_konten > 0) {
    $kosong = false;
};
?>

