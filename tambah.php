<?php
include "koneksi.php";

if(isset($_POST['simpan'])){

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];
    $ipk = $_POST['ipk'];

    mysqli_query($conn,"INSERT INTO mahasiswa
    VALUES('$nim','$nama','$tempat','$tanggal',
    '$fakultas','$jurusan','$ipk')");

    header("location:DaftarMahasiswa.php");
}
?>

<form method="POST">

<input type="text" name="nim" placeholder="NIM"><br><br>

<input type="text" name="nama" placeholder="Nama"><br><br>

<input type="text" name="tempat" placeholder="Tempat Lahir"><br><br>

<input type="date" name="tanggal"><br><br>

<input type="number" name="fakultas" placeholder="ID Fakultas"><br><br>

<input type="number" name="jurusan" placeholder="ID Jurusan"><br><br>

<input type="text" name="ipk" placeholder="IPK"><br><br>

<button type="submit" name="simpan">Simpan</button>

</form>