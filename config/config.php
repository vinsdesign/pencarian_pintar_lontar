<?php
$host = "server.lontarbali.id";
$user = "lonq9289_admin_lontar";
$pass = "4v.HZqZw(=qB";
$db = "lonq9289_lontar_bali";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
