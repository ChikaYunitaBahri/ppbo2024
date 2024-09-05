<?php

class Lingkaran
{
    const PHI = 3.14;
    public $jari_jari;

    public function luas(): float {
        return self::PHI * $this->jari_jari * $this->jari_jari;
    }

    public function keliling(): float {
        return 2 * self::PHI * $this->jari_jari;
    }
}

class Bola
{
    const PHI = 3.14;
    public $jari_jari;

    public function volume(): float {
        return (4 / 3) * self::PHI * pow($this->jari_jari, 3);
    }
}

class Tabung
{
    const PHI = 3.14;
    public $jari_jari;

    public function volume($tinggi): float {
        return self::PHI * pow($this->jari_jari, 2) * $tinggi;
    }
}

class Kerucut
{
    const PHI = 3.14;
    public $jari_jari;

    public function volume($tinggi): float {
        return (1 / 3) * self::PHI * pow($this->jari_jari, 2) * $tinggi;
    }
}

// Contoh penggunaan class Lingkaran
$lingkaran = new Lingkaran();
$lingkaran->jari_jari = 7;
$luas_lingkaran = $lingkaran->luas();
$keliling_lingkaran = $lingkaran->keliling();

echo "Luas lingkaran adalah: " . $luas_lingkaran . " cm^2\n";
echo "Keliling lingkaran adalah: " . $keliling_lingkaran . " cm\n";

// Contoh penggunaan class Bola
$bola = new Bola();
$bola->jari_jari = 5;
$volume_bola = $bola->volume();

echo "Volume bola adalah: " . $volume_bola . " cm^3\n";

// Contoh penggunaan class Tabung
$tabung = new Tabung();
$tabung->jari_jari = 3;
$volume_tabung = $tabung->volume(10); 

echo "Volume tabung adalah: " . $volume_tabung . " cm^3\n";

// Contoh penggunaan class Kerucut
$kerucut = new Kerucut();
$kerucut->jari_jari = 4;
$volume_kerucut = $kerucut->volume(10); 

echo "Volume kerucut adalah: " . $volume_kerucut . " cm^3\n";

// Contoh penggunaan class Kerucut untuk objek nasi tumpeng
$nasi_tumpeng = new Kerucut();
$nasi_tumpeng->jari_jari = 4;
$volume_nasi_tumpeng = $nasi_tumpeng->volume(10); 

echo "Volume nasi tumpeng adalah: " . $volume_nasi_tumpeng . " cm^3\n";
?>
