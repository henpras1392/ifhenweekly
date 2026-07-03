<?php

    require 'fungsi.php';

    if(!isset($_SESSION["login"]))
    {
        header("Location: login.php");
        exit;
    }

    $id = $_GET["id"];

    $query = "SELECT * FROM mahasiswa WHERE id = $id";

    $mhs = tampildata($query)[0]; // wadah dengan data isi data spesifik id


        
        
    if(isset($_POST["submit"]))
            {

    if(ubahdata($_POST, $id, $_FILES["foto"]) > 0)
        {
            echo "<script>
            alert('Data berhasil disunting!');
            window.location.href='mahasiswa.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Data gagal disunting!');
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
    <title>Sunting Data | HENPRAS WEBSITE</title>
    <link rel="stylesheet" href="assets/css/style.css?v=1.2">
</head>
<body>
    <h2>Sunting Data Mahasiswa</h2>
    <form action="" method="post">
        <table cellpadding="5px">
            <tr>
                <td><label for="nama">Nama </label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>"required /></td>
            </tr>
            <tr>
                <td><label for="nim">NIM </label></td>
                <td>:</td>
                <td><input type="number" name="nim" id="nim" value="<?= $mhs["nim"] ?>"required /></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi </label></td>
                <td>:</td>
                <td><input type="text" name="prodi" id="prodi" value="<?= $mhs["prodi"] ?>"required /></td>
            </tr>
            <tr>
                <td><label for="email">Email </label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" value="<?= $mhs["email"] ?>"required /></td>
            </tr>
            <tr>
                <td><label for="hp">Nomor HP </label></td>
                <td>:</td>
                <td><input type="number" name="hp" id="hp" value="<?= $mhs["no_hp"] ?>"></td>
            </tr>
            <tr>
                <td><label for="foto">Foto </label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto" value="<?= $mhs["foto"] ?>"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="submit">
                        Sunting
                    </button>
                </td>
            </tr>
        </table>
    </form>
    <br>
    <td><a href="mahasiswa.php">Kembali</a></td>
</body>
</html>