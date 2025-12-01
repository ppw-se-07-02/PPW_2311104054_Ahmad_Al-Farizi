<?php
echo "<h2>Manipulasi Array Nilai Mahasiswa</h2>";
echo "<hr>";

$nilaiMahasiswa = [75, 89, 65, 90, 85, 70, 98, 65, 69, 70, 12];

echo "<h3>Data Nilai Mahasiswa</h3>";
echo "Nilai: " . implode(", ", $nilaiMahasiswa) . "<br><br>";

$nilaiTertinggi = max($nilaiMahasiswa);
echo "Nilai Tertinggi: " . $nilaiTertinggi . "<br>";

$nilaiTerendah = min($nilaiMahasiswa);
echo "Nilai Terendah: " . $nilaiTerendah . "<br>";

$totalNilai = array_sum($nilaiMahasiswa);
$jumlahMahasiswa = count($nilaiMahasiswa);
$rataRata = $totalNilai / $jumlahMahasiswa;
echo "Rata-rata Nilai: " . number_format($rataRata, 2) . "<br>";

$mahasiswaLulus = 0;
foreach ($nilaiMahasiswa as $nilai) {
    if ($nilai >= 70) {
        $mahasiswaLulus++;
    }
}
echo "Jumlah Mahasiswa Lulus (≥70): " . $mahasiswaLulus . " dari " . $jumlahMahasiswa . " mahasiswa<br>";

$nilaiUrut = $nilaiMahasiswa;
rsort($nilaiUrut); 

echo "<h3>Nilai Diurutkan dari Tertinggi ke Terendah</h3>";
echo "Nilai: " . implode(", ", $nilaiUrut);
?>