<?php
    include "koneksi.php";
    session_start();

    $login_message = "";

    if(isset($_SESSION["is_login"]))  {
        header("location: dashboard.php");
    }

    if(isset($_POST['login'])) {
        $nim = $_POST['nim'];
        $password= $_POST['password'];

        $sql = "SELECT * FROM user WHERE nim='$nim' AND password='$password'
        ";
        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["nim"] = $data["nim"];
            $_SESSION["is_login"] = true;
            
            header("location: dashboard.php");

        }else {
        $login_message = "AKUN TIDAK TERDAFTAR";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
        <!-- KONEKSI LAYOUT -->
        <?php include "layout/header.html" ?>
        <!-- KONEKSI LAYOUT -->

    <h3>MASUK AKUN</h3>
    <i><?= $login_message ?></i>
    <form action="login.php" method="POST">
        <input type="text" placeholder="USERNAME" name="nim"/>
        <input type="password" placeholder="PASSWORD" name="password"/>
        <button type="submit" name="login">LOGIN</button>
    </form>

    
        <!-- KONEKSI LAYOUT -->
        <?php include "layout/footer.html" ?>
        <!-- KONEKSI LAYOUT -->
</body>
</html>