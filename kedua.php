<?php

function luasLingkaran($jari) : float 
{
    $luas = 3.14*$jari*$jari;
    return $luas;
}

function kelilingLingkaran($jari) : float 
{
    return 2 * 3.14 * $jari;
}

function volumeBola($jari) : float
{
    return (4/3) * 3.14 * pow($jari, 3);
}

function volumeTabung($jari, $tinggi) : float 
{
    return 3.14 * $jari * $jari * $tinggi;
}

function volumeKerucut($jari, $tinggi) : float 
{
    return (1/3) * 3.14 * $jari * $jari * $tinggi;
}

$luas_lingkaran = luasLingkaran(45);
echo "Luas lingkaran adalah {$luas_lingkaran}";

$keliling = kelilingLingkaran($jari);
echo "Keliling lingkaran adalah {$keliling}\n";

$volume_bola = volumeBola($jari);
echo "Volume bola adalah {$volume_bola}\n";

$volume_tabung = volumeTabung($jari, $tinggi_tabung);
echo "Volume tabung adalah {$volume_tabung}\n";

$volume_kerucut = volumeKerucut($jari, $tinggi_kerucut);
echo "Volume kerucut adalah {$volume_kerucut}\n";
