<?php
$host = "lontarserver.vinsjs.site";
$user = "vinh5761_admin_lontar";
$pass = "NHusj=9.e$Nw";
$db = "vinh5761_lontar_bali";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
