<?php
include "koneksi.php";

$nim = $_GET['nim'];

$data = mysqli_query($conn,
"SELECT * FROM mahasiswa WHERE nim='$nim'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    mysqli_query($conn,"UPDATE mahasiswa SET
    nama='$_POST[nama]',
    tempat_lahir='$_POST[tempat]',
    tanggal_lahir='$_POST[tanggal]',
    ipk='$_POST[ipk]'
    WHERE nim='$nim'");

    header("location:DaftarMahasiswa.php");
}
?>

<form method="POST">

<input type="text" name="nama"
value="<?php echo $row['nama']; ?>">

<br><br>

<input type="text" name="tempat"
value="<?php echo $row['tempat_lahir']; ?>">

<br><br>

<input type="date" name="tanggal"
value="<?php echo $row['tanggal_lahir']; ?>">

<br><br>

<input type="text" name="ipk"
value="<?php echo $row['ipk']; ?>">

<br><br>

<button type="submit" name="update">
Update
</button>

</form>