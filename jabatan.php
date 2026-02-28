<?php
include "koneksi.php";

if(isset($_POST['simpan'])){
    mysqli_query($conn,"INSERT INTO tbl_jabatan_alfi
    VALUES(NULL<'$_POST[nama]','$_POST[gaji]','$_POST[tunjungan]')");
}
?>

<h2>Data Jabatan</h2>

<form method="POST">
    <input type="text" name="nama"placeholder="Nama Jabatan" required>
     <input type="number" name="gaji"placeholder="gaji pokok" required>
      <input type="number" name="tunjangan"placeholder="tunjangan" required>
      <button name="simpan">Simpan</button>
</form>

<hr>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Gaji</th>
        <th>Tunjangan</th>
</tr>

<?php
$no=1;
$data=mysqli_query($conn,"SELECT * FROM tbl_jabatan_alfi");
while($d=mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d['nama_jabatan'] ?></td>
        <td><?= ['gaji_pokok'] ?></td>
           <td><?= ['tunjangan_jabatan'] ?></td>
    </tr>
<?php } ?>
</table>