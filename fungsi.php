<?php



$koneksi = mysqli_connect("localhost:3306", "root", "", "ifhenweekly");


function tampildata($query) //proses data yg diminta
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query); //memilih lemari sesuai perintah

    $rows = []; //buat wadah

    while($row = mysqli_fetch_assoc($result)) //ambil data
    {
        $rows[] = $row; //ambiul data kemudian ditaruh di wadah
    }

    return $rows; //array assoc
}

?>