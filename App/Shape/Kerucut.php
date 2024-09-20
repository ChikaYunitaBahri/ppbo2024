<?php

namespace App\Shape;

class Kerucut
{
    const PHI = 3.14;
    public $jari_jari;

    public function __construct($jari_jari) {
        $this->jari_jari = $jari_jari;
    }

    public function volume($tinggi): float {
        return (1 / 3) * self::PHI * pow($this->jari_jari, 2) * $tinggi;
    }
}