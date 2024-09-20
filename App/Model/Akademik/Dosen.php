<?php

namespace App\Model\Akademik;

class Dosen extends Pegawai {
    public string $nidn;

    public function __construct(int $nip, string $nama, int $no_hp, string $alamat, string $nidn) {
        parent::__construct($nip, $nama, $no_hp, $alamat);
        $this->nidn = $nidn;
    }

    public function mengajar(): void {
        echo $this->nama . " sedang mengajar perkuliahan";
    }
}
