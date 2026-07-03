<?php


session_start();

$koneksi = mysqli_connect("localhost:3306", "root", "", "ifhenweekly");


function tampildata($query) //proses data yg diminta
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query); //memilih lemari sesuai perintah

    $rows = []; //buat wadah

    while($row = mysqli_fetch_assoc($result)) //ambil data
    {
        $rows[] = $row; //ambil data kemudian ditaruh di wadah
    }

    return $rows; //array assoc
}

function tambahdata($data, $files)
{
    global $koneksi;

        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $prodi = $_POST["prodi"];
        $email = $_POST["email"];
        $nohp = $_POST["hp"];
        
        //file foto
        $namafoto = $files["name"];
        $newnamafoto = date('dmYhis_') .$namafoto;
        $tmpfoto = $files["tmp_name"];
        $folder = "assets/images/$newnamafoto";
        if(move_uploaded_file($tmpfoto,$folder))

        $query = "INSERT INTO mahasiswa (nama,nim,prodi,email,no_hp,foto) 
            VALUES ('$nama', '$nim', '$prodi', '$email', '$nohp', '$newnamafoto')";

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

function ubahdata($data, $id, $files)
{
    global $koneksi;

        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $prodi = $_POST["prodi"];
        $email = $_POST["email"];
        $nohp = $_POST["hp"];
        
        //file foto
        $namafoto = $files["name"];
        $newnamafoto = date('dmYhis_') .$namafoto;
        $tmpfoto = $files["tmp_name"];
        $folder = "assets/images/$newnamafoto";
        if(move_uploaded_file($tmpfoto,$folder))
        
        //$query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', prodi='$prodi', email='$email', no_hp='$nohp', foto='$newnamafoto' WHERE id=$id";
        $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', prodi='$prodi', email='$email', no_hp='$nohp' WHERE id=$id";
        $query = "INSERT INTO mahasiswa (foto) 
            VALUES ('$newnamafoto')";

        mysqli_query($koneksi,$query);

        return mysqli_affected_rows($koneksi);


}

function register($data)
{
    global $koneksi;

    $username = strtolower(stripcslashes($data["username"]));
    $password1 = mysqli_real_escape_string($koneksi,$data["password1"]);
    $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);

    if($password1 != $password2)
    {
        echo "<script>
        alert('Konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result))
    {
        echo "<script>
        alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password_hash')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

    function login($data)
    {
        global $koneksi;
        $username = strtolower(stripcslashes($data["username"]));
        $password = $data["password"];

        $query = "SELECT * FROM user WHERE username = '$username'";

        $result = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"]))
            {
            $_SESSION["login"] = true;    
            header("Location: mahasiswa.php");
                exit;
            }
        }

        return $error = true;
    }




?>