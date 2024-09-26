<?php

namespace App\Model\Akademik;

use App\Model\Akademik\Pegawai;

class Dosen extends Pegawai {
    private string $nidn;

    public function __construct(int $nip, string $nama, int $no_hp, string $alamat, string $nidn) {
        parent::__construct($nip, $nama, $no_hp, $alamat);
        $this->nidn = $nidn;
    }

    public function mengajar(): void {
        echo $this->nama . " sedang mengajar perkuliahan";
    }
}
