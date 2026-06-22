<?php
include "koneksi.php";

$cari = "";

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
}

$query = "SELECT mahasiswa.nim,
                 mahasiswa.nama,
                 mahasiswa.tempat_lahir,
                 mahasiswa.tanggal_lahir,
                 fakultas.nama_fakultas,
                 jurusan.nama_jurusan,
                 mahasiswa.ipk
          FROM mahasiswa
          JOIN fakultas
          ON mahasiswa.id_fakultas = fakultas.id_fakultas
          JOIN jurusan
          ON mahasiswa.id_jurusan = jurusan.id_jurusan
          WHERE mahasiswa.nama LIKE '%$cari%'";

$data = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>

    <style>

        body{
            font-family: Arial;
        }

        table{
            border-collapse: collapse;
            width: 100%;
        }

        th, td{
            border:1px solid black;
            padding:10px;
            text-align:center;
        }

        th{
            background-color: lightgray;
        }

        a{
            text-decoration:none;
            padding:5px 10px;
            background-color: blue;
            color:white;
            border-radius:3px;
        }

    </style>
</head>

<body>

<h2>Daftar Mahasiswa</h2>

<form method="GET">
    <input type="text" name="cari" placeholder="Cari nama mahasiswa">
    <button type="submit">Cari</button>
</form>

<br>

<a href="tambah.php">Tambah Data</a>

<br><br>

<table>

<tr>
    <th>NIM</th>
    <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Fakultas</th>
    <th>Jurusan</th>
    <th>IPK</th>
    <th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)){ ?>

<tr>
    <td><?php echo $row['nim']; ?></td>
    <td><?php echo $row['nama']; ?></td>
    <td><?php echo $row['tempat_lahir']; ?></td>
    <td><?php echo $row['tanggal_lahir']; ?></td>
    <td><?php echo $row['nama_fakultas']; ?></td>
    <td><?php echo $row['nama_jurusan']; ?></td>
    <td><?php echo $row['ipk']; ?></td>

    <td>
        <a href="edit.php?nim=<?php echo $row['nim']; ?>">Edit</a>

        <a href="delete.php?nim=<?php echo $row['nim']; ?>">
        Delete
        </a>
    </td>

</tr>

<?php } ?>

</table>

</body>
</html>