<?php
require_once 'koneksi.php';
if(!isset($_SESSION['user_id'])){
header('Location: ./index.php'); exit;
}
