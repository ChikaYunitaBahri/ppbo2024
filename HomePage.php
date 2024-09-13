<?php
class HomePage
{
    function tampil() : void {
        echo "Halaman depan guest";
    }
}


class HomePage
{
    function tampil() : void {
        echo "Halaman depan admin";
    }
}


$hp = new HomePage();
$hp->tampil();