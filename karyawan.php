<?php
include "koneksi.php";
$id=$_GET['id'];

$query=mysqli_query($conn,"SELECT k.*, j.gaji_pokok, j.tunjangan_jabatan
FROM tbl_karyawan_pele k
JOIN tbl_jabatan_pele j ON k.id_jabatan=j.id_jabatan
WHERE id_karyawan='$id'");

echo json_encode(mysqli_fetch_assoc($query));
?>