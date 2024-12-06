<?php

$konek = mysqli_connect("localhost", "root", "", "sekolahme");


if (!$konek) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
