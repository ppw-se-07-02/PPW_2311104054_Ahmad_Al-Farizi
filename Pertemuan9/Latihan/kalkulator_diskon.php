<?php
echo "<h2>Kalkulator Diskon Belanja</h2>";
echo "<hr>";

function hitungDiskon($totalBelanja) {
    $diskon = 0;
    $persenDiskon = 0;
    
    if ($totalBelanja >= 1000000) {
        $persenDiskon = 30;
        $diskon = $totalBelanja * 0.30;
    } elseif ($totalBelanja >= 500000) {
        $persenDiskon = 20;
        $diskon = $totalBelanja * 0.20;
    } elseif ($totalBelanja >= 100000) {
        $persenDiskon = 10;
        $diskon = $totalBelanja * 0.10;
    }
    
    $totalBayar = $totalBelanja - $diskon;
    
    return [
        'totalBelanja' => $totalBelanja,
        'persenDiskon' => $persenDiskon,
        'diskon' => $diskon,
        'totalBayar' => $totalBayar
    ];
}

$contohBelanja = [75000, 150000, 600000, 1200000];

foreach ($contohBelanja as $belanja) {
    $hasil = hitungDiskon($belanja);
    
    echo "<h3>Detail Pembelanjaan</h3>";
    echo "Total Belanja: Rp " . number_format($hasil['totalBelanja'], 0, ',', '.') . "<br>";
    echo "Diskon: " . $hasil['persenDiskon'] . "% = Rp " . number_format($hasil['diskon'], 0, ',', '.') . "<br>";
    echo "Total Bayar: Rp " . number_format($hasil['totalBayar'], 0, ',', '.') . "<br>";
}
?>