<?php
    session_start();
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('location: index.php');
    }

    // Fungsi untuk menentukan grade berdasarkan nilai
function determineGrade($nilai) {
    if ($nilai >= 85) { 
        return 'A';
     } elseif ($nilai >= 80) { 
        return 'B+'; 
    } elseif ($nilai >= 70) { 
        return 'B'; 
    } elseif ($nilai >= 60) { 
        return 'C+'; 
    } elseif ($nilai >= 50) { 
        return 'C'; 
    } elseif ($nilai >= 40) { 
        return 'D+'; 
    } elseif ($nilai >= 30) { 
        return 'D'; 
    } else { return 'E'; } }

// Ambil input nilai dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST['nilai'];

    // Validasi input
    if (is_numeric($nilai) && $nilai >= 0 && $nilai <= 100) {
        $grade = determineGrade($nilai);
    } else {
        $grade = "Nilai tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- koneksi include -->
    <?php include "layout/header.html" ?>
    <!-- koneksi include -->

    <h3>SELAMAT DATANG <?= $_SESSION["nim"] ?></h3>

    <h1>Penentuan Grade Nilai Mahasiswa</h1>
    <form method="post" action="">
        <label for="nilai">Masukkan Nilai:</label>
        <input type="number" id="nilai" name="nilai" min="0" max="100" required>
        <input type="submit" value="Cek Grade">
    </form>

    <?php
    // Tampilkan hasil jika ada nilai yang dimasukkan
    if (isset($grade)) {
        echo "<h2>Grade: $grade</h2>";
    }
    ?>

<form action="dashboard.php" method="POST">
    <button type="submid" name="logout">LOGOUT</button>
    </form>

<!-- koneksi include -->
  <?php include "layout/footer.html" ?>
<!-- koneksi include -->

</body>
</html>