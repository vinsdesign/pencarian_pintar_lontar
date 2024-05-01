<?php
require '../../model/AdminModel.php';
// query memunculkan table 
$admins = query("SELECT * FROM `admin`");

// query mengecek fungsi tambahdata berhasil atau tidak
if (isset($_POST['TambahData'])) {
    // memunculkan fungsi tambah
    if (tambah($_POST) > 0) {
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

// query Edit Data 
