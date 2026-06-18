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

function tambahdata($data)
{
    global $koneksi;

     $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $prodi = $_POST["prodi"];
        $email = $_POST["email"];
        $nohp = $_POST["hp"];
        $foto = $_POST["foto"];

        $query = "INSERT INTO mahasiswa (nama,nim,prodi,email,no_hp,foto) VALUES ('$nama', '$nim', '$prodi', '$email', '$nohp', '$foto')";

        mysqli_query($koneksi,$query);

        return mysqli_affected_rows($koneksi);


}


function hapusdata($id)
{
    global $koneksi;

    $query = "DELETE FROM mahasiswa WHERE id=$id";
    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

?>