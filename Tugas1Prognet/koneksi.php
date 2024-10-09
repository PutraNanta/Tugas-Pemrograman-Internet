<?php

$hostname = "localhost"; 
$username = "root";
$password = "";
$database_name = "buku_user";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error){
    echo"KONEKSI DATABASE GAGAL";
    die("Error!");
}


?>