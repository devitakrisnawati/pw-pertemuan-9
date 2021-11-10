<?php

$koneksi = mysqli_connect("localhost","root","","pemweb");

if (mysqli_connect_error()){
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>