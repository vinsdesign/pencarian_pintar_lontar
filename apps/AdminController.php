<?php
require_once '../config/config.php';
// query mengecek fungsi tambahdata berhasil atau tidak
if (isset($_POST['TambahData'])) {

    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $gambar = htmlspecialchars($_POST['image_upload']);

    $query = "INSERT INTO `admin` (nama, username, password, gambar) VALUES ('$nama', '$username', '$password', '$gambar')";
    $simpan = mysqli_query($koneksi, $query);
    // memunculkan fungsi tambah
    if ($simpan) {
        echo "<script>
        alert('Data Berhasil Ditambahkan')
        document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
    </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan')
    </script>";
    }
}

// query mengecek fungsi Hapus berhasil atau tidak
if (isset($_POST['HapusData'])) {

    $id = $_POST['id_admin'];
    $query = "DELETE FROM `admin` WHERE id = $id";
    $delete = mysqli_query($koneksi, $query);
    // memunculkan fungsi tambah
    if ($delete) {
        echo "<script>
        alert('Data Berhasil didelete')
        document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
    </script>";
    } else {
        echo "<script>
        alert('Data gagal didelete')
    </script>";
    }
}

// query mengecek fungsi tombol EditData berhasil atau tidak
if (isset($_POST['EditData'])) {
    // mengambil data dengan method post
    $id = $_POST['id_admin'];
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $gambar = htmlspecialchars($_POST['image_upload']);

    $query = "UPDATE `admin` SET
                nama = '$nama',
                username = '$username',
                password = '$password',
                gambar = '$gambar'
                WHERE id = '$id'
                 ";
    $update = mysqli_query($koneksi, $query);
    // memunculkan fungsi tambah
    if ($update) {
        echo "<script>
        alert('Data Berhasil Diubah')
        document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
    </script>";
    } else {
        echo "<script>
        alert('Data gagal Diubah')
        document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
    </script>";
    }
}
