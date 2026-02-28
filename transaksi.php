<?php
include "koneksi.php";

$query = mysqli_query($conn,"SELECT COUNT(*) as total FROM tbl_transaksi_pele");
$data = mysqli_fetch_assoc($query);
$no = $data['total'] + 1;
$id_transaksi = "TRS-".str_pad($no,2,"0",STR_PAD_LEFT);

if(isset($_POST['simpan'])){
mysqli_query($conn,"INSERT INTO tbl_transaksi_pele 
VALUES('$id_transaksi','$_POST[tanggal]',
'$_POST[id_karyawan]','$_POST[tunjangan_anak]',
'$_POST[bpjs]','$_POST[total]')");
}
?>

<h2>Form Transaksi Gaji</h2>

<form method="POST">
ID Transaksi:
<input type="text" value="<?= $id_transaksi ?>" readonly><br><br>

Tanggal:
<input type="date" name="tanggal" required><br><br>

Nama Karyawan:
<select name="id_karyawan" id="karyawan" required>
<option value="">Pilih</option>
<?php
$data=mysqli_query($conn,"SELECT * FROM tbl_karyawan_pele");
while($d=mysqli_fetch_array($data)){
echo "<option value='$d[id_karyawan]'>$d[nama]</option>";
}
?>
</select><br><br>

Gaji Pokok:
<input type="text" id="gaji" readonly><br><br>

Tunjangan Jabatan:
<input type="text" id="tunjangan_jabatan" readonly><br><br>

Jumlah Anak:
<input type="number" id="anak"><br><br>

Tunjangan Anak:
<input type="text" name="tunjangan_anak" id="tunjangan_anak" readonly><br><br>

BPJS:
<input type="text" name="bpjs" id="bpjs" readonly><br><br>

Total Pendapatan:
<input type="text" name="total" id="total" readonly><br><br>

<button name="simpan">Save</button>
</form>

<script>
document.getElementById("karyawan").addEventListener("change", function(){
fetch("get_karyawan.php?id="+this.value)
.then(res=>res.json())
.then(data=>{
document.getElementById("gaji").value=data.gaji_pokok;
document.getElementById("tunjangan_jabatan").value=data.tunjangan_jabatan;

let bpjs=data.gaji_pokok*0.04;
document.getElementById("bpjs").value=bpjs;
});
});

document.getElementById("anak").addEventListener("input", function(){
let gaji=parseInt(document.getElementById("gaji").value);
let anak=parseInt(this.value);

let tunjangan=gaji*0.10*anak;
document.getElementById("tunjangan_anak").value=tunjangan;

let jabatan=parseInt(document.getElementById("tunjangan_jabatan").value);
let bpjs=parseInt(document.getElementById("bpjs").value);

let total=(gaji+jabatan+tunjangan)-bpjs;
document.getElementById("total").value=total;
});
</script>