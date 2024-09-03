<?php
date_default_timezone_set("Asia/Jakarta");
$nama = readline('Masukkan nama Anda: ');
$waktu = date('H');
echo "Halo {$nama} sekarang pukul {$waktu}\n";

if ($jam >= 5 && $jam < 11) {
    $sapaan = "Selamat Pagi";
} elseif ($jam >= 11 && $jam < 15) {
    $sapaan = "Selamat Siang";
} elseif ($jam >= 15 && $jam < 19) {
    $sapaan = "Selamat Sore";
} else {
    $sapaan = "Selamat Malam";
}

echo "{$sapaan}, {$nama}, sekarang pukul {$waktu}\n";