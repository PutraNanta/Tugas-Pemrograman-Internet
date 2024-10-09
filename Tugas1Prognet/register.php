<?php
    include "koneksi.php";
    session_start();

    $register_message = "";

    if(isset($_SESSION["is_login"]))  {
        header("location: dashboard.php");
    }

    if (isset($_POST["daftar"])) {
        $nim = $_POST["nim"];
        $password = $_POST["password"];

        $sql = "INSERT INTO user (nim, password) VALUES ('$nim', '$password')";

        if($db->query($sql)) {
            $register_message = "DAFTAR AKUN BERHASIL";
        }else {
            $register_message = "DAFTAR AKUN GAGAL";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
        <!-- KONEKSI LAYOUT -->
        <?php include "layout/header.html" ?>
        <!-- KONEKSI LAYOUT -->

    <h3>DAFTAR AKUN</h3>
    <i><?= $register_message ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="USERNAME" name="nim"/>
        <input type="password" placeholder="PASSWORD" name="password"/>
        <button type="submit" name="daftar">DAFTAR</button>
    </form>

    
        <!-- KONEKSI LAYOUT -->
        <?php include "layout/footer.html" ?>
        <!-- KONEKSI LAYOUT -->
</body>
</html>