<?php
require_once '../config/config.php';
// query mengecek fungsi tambahdata berhasil atau tidak
if (isset($_POST['TambahData'])) {

    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    // mengecek gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

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
        document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php
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
    // mengambil data dengan method postc:\Users\kelvin\OneDrive\Documents\kamus.oss.web.id\public_html\easyrdf
    $id = $_POST['id_admin'];
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $gambarLama = htmlspecialchars($_POST['gambar_lama']);

    // cek apakah user pilih gambar baru atau tidak?
    if ($_FILES['image_upload']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
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

function upload()
{
    $namaFile = $_FILES['image_upload']['name'];
    $ukuranFile = $_FILES['image_upload']['size'];
    $errorFIle = $_FILES['image_upload']['error'];
    $tmpName = $_FILES['image_upload']['tmp_name'];

    // adakah gambar yang di upload
    if ($errorFIle === 4) {
        echo "<script>
        alert('Masukan gambar profile anda!')
             document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
        </script>";
        return false;
    }
    // mengecek ekstensi gambar 
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
    $ekstensiGambar = explode('.', $namaFile); // memecah antara ekstensi dan nama file dalam array
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // mengambil array paling akhir
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Ekstensi Gambar Salah!')
             document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
        </script>";
        return false;
    }
    // cek ukuran gambar jika lebih dari 5MB
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('Gambar melebihi ukuran 1MB!')
             document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
        </script>";
        return false;
    }
    $namaFileNew = uniqid();
    $namaFileNew .= '.';
    $namaFileNew .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../image_base/' . $namaFileNew);
    return $namaFileNew;
}
