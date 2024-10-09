<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Kondisi AC</title>
</head>
<body>
    <h1>STATUS AC</h1>
    <form method="post">
        <label for="suhu">Suhu (°C):</label>
        <input type="text" id="suhu" name="suhu" required>
        <br><br>
        <label for="kelembaban">Kelembaban (%):</label>
        <input type="text" id="kelembaban" name="kelembaban" required>
        <br><br>
        <input type="submit" value="Cek Status AC">
    </form>


<?php
// Fungsi untuk menentukan status AC
function getACStatus($suhu, $kelembaban) {
    if ($suhu < 20) {
        return "AC Mati";
    } elseif ($suhu >= 20 && $suhu < 25 && $kelembaban < 60) {
        return "AC Menyala Rendah";
    } elseif ($suhu >= 25 && $suhu < 30 && $kelembaban >= 60) {
        return "AC Menyala Sedang";
    } elseif ($suhu >= 30) {
        return "AC Menyala Berat";
    } else {
        return "Input tidak valid";
    }
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu = $_POST['suhu'];
    $kelembaban = $_POST['kelembaban'];

    // Validasi input
    if (is_numeric($suhu) && is_numeric($kelembaban)) {
        $statusAC = getACStatus($suhu, $kelembaban);
    } else {
        $statusAC = "Input suhu dan kelembaban harus angka.";
    }
}

if (isset($statusAC)) {
    echo "<h2>Status AC: $statusAC</h2>";
}
?>

</body>
</html>