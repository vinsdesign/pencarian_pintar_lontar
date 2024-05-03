<?php
require 'AdminModel.php';
// query Hapus Data 
$id = $_GET['id'];

if (hapus($id) > 0) {
    echo "<script>
            alert('Data Berhasil Dihapus')
            document.location.href='http://localhost/pencarian_pintar_lontar/pages/admin/TableDataAdmin.php'
        </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus')
        </script>";
}
