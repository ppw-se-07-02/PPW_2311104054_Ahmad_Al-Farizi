<?php
echo "<h2>Program Konversi Suhu</h2>";
echo "<hr>";

function celciusToFahrenheit($celcius) {
    $fahrenheit = ($celcius * 9/5) + 32;
    return number_format($fahrenheit, 2);
}

function fahrenheitToCelcius($fahrenheit) {
    $celcius = ($fahrenheit - 32) * 5/9;
    return number_format($celcius, 2);
}

function celciusToKelvin($celcius) {
    $kelvin = $celcius + 273.15;
    return number_format($kelvin, 2);
}

$suhuCelcius = 25;
$suhuFahrenheit = 77;

echo "<h3>Konversi Celcius ke Fahrenheit</h3>";
echo "Suhu: " . $suhuCelcius . "°C = " . celciusToFahrenheit($suhuCelcius) . "°F<br>";

echo "<h3>Konversi Fahrenheit ke Celcius</h3>";
echo "Suhu: " . $suhuFahrenheit . "°F = " . fahrenheitToCelcius($suhuFahrenheit) . "°C<br>";

echo "<h3>Konversi Celcius ke Kelvin</h3>";
echo "Suhu: " . $suhuCelcius . "°C = " . celciusToKelvin($suhuCelcius) . " K<br>";
?>