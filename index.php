<link href="./src/output.css" rel="stylesheet">

<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<?php include 'navbar.php'; ?>
