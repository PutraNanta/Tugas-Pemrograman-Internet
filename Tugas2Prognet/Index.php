<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 3px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .summary-table {
            width: auto;
            border: saddlebrown;
        }
        .summary-table td {
            border: none;
        }
    </style>
</head>
<body>

<?php
// Data siswa
$siswa = [
    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
];

// Inisialisasi variabel untuk menghitung jumlah mahasiswa lulus dan tidak lulus
$totalLulus = 0;
$totalTidakLulus = 0;

// Output tabel data mahasiswa
echo "<h1>PENILAIAN MAHASISWA</h1>";
echo "<table>";
echo "<tr><th>Nama Mahasiswa</th><th>Nilai Rata-Rata</th><th>Status Kelulusan Mahasiswa</th><th>Mata Kuliah Yang Harus Di Perbaiki</th></tr>";

foreach ($siswa as $data) {
    // Hitung rata-rata nilai
    $rataRata = ($data['matematika'] + $data['bahasa_inggris'] + $data['ipa']) / 3;

    // Tentukan status kelulusan
    $status = $rataRata >= 75 ? 'Lulus' : 'Tidak Lulus';

    // Tentukan mata pelajaran yang perlu diperbaiki jika tidak lulus
    $rekomendasi = '';
    if ($status == 'Tidak Lulus') {
        $nilai = [
            'matematika' => $data['matematika'],
            'bahasa_inggris' => $data['bahasa_inggris'],
            'ipa' => $data['ipa']
        ];
        asort($nilai); // Urutkan nilai dari yang terendah
        $rekomendasi = array_keys($nilai)[0]; // Ambil mata pelajaran dengan nilai terendah
        $totalTidakLulus++;
    } else {
        $totalLulus++;
    }

    // Cetak hasil
    echo "<tr>";
    echo "<td>{$data['nama']}</td>";
    echo "<td>" . number_format($rataRata, 2) . "</td>";
    echo "<td>{$status}</td>";
    echo "<td>" . ($rekomendasi ? ucfirst(str_replace('_', ' ', $rekomendasi)) : '-') . "</td>";
    echo "</tr>";
}

echo "</table>";

// Output tabel jumlah siswa lulus dan tidak lulus
echo "<h3>Jumlah Siswa</h3>";
echo "<table class='summary-table'>";
echo "<tr><td><strong>Total Lulus:</strong></td><td>$totalLulus</td></tr>";
echo "<tr><td><strong>Total Tidak Lulus:</strong></td><td>$totalTidakLulus</td></tr>";
echo "</table>";
?>
</body>
</html>
