<?php

    require "fungsi.php";
    $qmahasiswa = "SELECT * FROM mahasiswa";
    $mahasiswas = tampildata($qmahasiswa); //array assoc

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa | INFORMATIKA</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1 align="center">INFORMATIKA</h1>
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

    <table border="1" cellspasing="0" cellpadding="10" align="center">
    
    <button onclick="window.location.href='tambahdata.php'" class="btn-tambah">
      Tambah Data
    </button>
    <br>
    
    <br>
        <tr>
              <th>No</th>
              <th>Name</th>
              <th>NIM</th>
              <th>Program Studi</th>
              <th>Email</th>
              <th>Nomor HP</th>
              <th>Foto</th>
              <th>Action</th>
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
                  <img src="assets/images/Mike_Shinoda.jpg" width="100" height="120"alt="Mike_Shinoda.jpg"/>
                </div>
              </td>
              <td>
                <a href="edit-data.php" class="btn-edit">Edit</a>
                <a href="hapusdata.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data?')" class="btn-delete">Delete</a>
              </td>
            </tr>
            <?php
            
                    }
            ?>
    </table>
</body>
</html>