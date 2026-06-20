<?php

    require 'fungsi.php';

        
        
    if(isset($_POST["submit"]))
            {

       

    if(tambahdata($_POST) > 0)
        {
            echo "<script>
            alert('Data berhasil ditambahkan!');
            window.location.href='mahasiswa.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Data gagal ditambahkan!');
            window.location.href='mahasiswa.php';
            </script>";
        }

            }





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data | INFORMATIKA</title>
    <link rel="stylesheet" href="assets/css/style.css?v=1.2">
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form action="" method="post">
        <table cellpadding="5px">
            <tr>
                <td><label for="nama">Nama </label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required /></td>
            </tr>
            <tr>
                <td><label for="nim">NIM </label></td>
                <td>:</td>
                <td><input type="number" name="nim" id="nim" required /></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi </label></td>
                <td>:</td>
                <td><input type="text" name="prodi" id="prodi" required /></td>
            </tr>
            <tr>
                <td><label for="email">Email </label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" required /></td>
            </tr>
            <tr>
                <td><label for="hp">Nomor HP </label></td>
                <td>:</td>
                <td><input type="number" name="hp" id="hp" required /></td>
            </tr>
            <tr>
                <td><label for="foto">Foto </label></td>
                <td>:</td>
                <td><input type="text" name="foto" id="foto"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="submit">
                        Tambah
                    </button>
                </td>
            </tr>
        </table>
    </form>
    <br>
    <td><a href="mahasiswa.php">Kembali</a></td>
</body>
</html>