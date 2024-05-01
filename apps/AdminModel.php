<?php

// koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'lontar_bali');
// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
function tambah($data)
{
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $gambar = htmlspecialchars($data['image_upload']);

    $query = "INSERT INTO `admin` (nama, username, password, gambar) VALUES ('$nama', '$username', '$password', '$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM `admin` WHERE `admin`.`id` = '$id'");

    return mysqli_affected_rows($koneksi);
}
