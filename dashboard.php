<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<h2>Selamat Datang, <?php echo $_SESSION['user]; ?</h2>

<a href="user.php">Data User</a> 
<a href="jabatan.php">Data Jabatan</a>
<a href="karyawan.php">Data Karyawan</a>
<a href="transaksi.php">Transaksi Gaji</a>
<a href="logout.php">Logout</a>