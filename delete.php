<?php
include './config/koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM content WHERE id_nota = $id";
mysqli_query($conn, $query);

header("Location: index.php");
exit;
?>