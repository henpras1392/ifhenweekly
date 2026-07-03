<?php
    require 'fungsi.php';

    if(isset($_POST["register"]))
    {
        if(register($_POST) > 0)
            {
                echo "<script>
                alert('User baru berhasil dibuat!');
                window.location.href='login.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('User baru gagal dibuat!');
                </script>";
            }
    }


 ?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="" method="post">
        <label for="username">Username: </label><br>
        <input type="text" name="username" 
        id="username" required><br>
        <label for="password1">Password: </label><br>
        <input type="password" name="password1" id="password1" required><br>
        <label for="password2">Konfirmasi Password: </label><br>
        <input type="password" name="password2" id="password2" required><br><br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>