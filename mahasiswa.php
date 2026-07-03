<?php

    require "fungsi.php";

    if(!isset($_SESSION["login"]))
    {
        header("Location: login.php");
        exit;
    }

    
    $qmahasiswa = "SELECT * FROM mahasiswa";
    $mahasiswas = tampildata($qmahasiswa); //array assoc

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa | HENPRAS WEBSITE</title>
    <link rel="stylesheet" href="assets/css/style.css?v=1.2">
</head>
<body>
    <a href="logout.php">
      <button>Logout</button>
    <h1 align="center">HENPRAS WEBSITE</h1>
    <center>
        <img src="assets/images/logo.png" width="200px"/>
    </center>
    <br>
    <table border="1" cellspasing="0" cellpadding="10" align="center">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>
    <br>
    <h2 align="center">Data Mahasiswa</h2>
    <a href="tambahdata.php">
      <button>Tambah Data</button>
    </a>
    <table border="1" cellspasing="0" cellpadding="10" align="center">   
    <br>
        <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Program Studi</th>
              <th>Email</th>
              <th>Nomor HP</th>
              <th>Foto</th>
              <th>Pengaturan</th>
            </tr>
            <?php
                $i = 1;
                foreach($mahasiswas as $mhs)
                    {
            ?>
            <tr>
              <td align="center"><?= $i++?></td>
              <td><?php echo $mhs["nama"] ?></td>
              <td><?= $mhs["nim"] ?></td>
              <td><?= $mhs["prodi"] ?></td>
              <td><?= $mhs["email"] ?></td>
              <td><?= $mhs["no_hp"] ?></td>
              <td>
                <div>
                  <img src="assets/images/<?= $mhs["foto"] ?>" width="100" height="120" alt="Foto Mahasiswa"/>
                </div>
              </td>
              <td>
                <a href="ubahdata.php?id=<?= $mhs["id"] ?>"><button>Sunting</button></a>
                <a href="hapusdata.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><button>Hapus</button></a>
              </td>
            </tr>
            <?php
            
                    }
            ?>
    </table>
</body>
</html>