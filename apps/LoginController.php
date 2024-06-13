<?php
session_start();
require '../../config/config.php';

// cek session jika sudah ada session langsung arahin ke   --
if (isset($_SESSION['login'])) {
    header("Location: https://lontarbali.id/pages/admin/DashboardAdmin.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) { //mysqli_num_rows => ada berapa baris yang dikembalikan

        // check password
        $row = mysqli_fetch_assoc($result);
        if ($password === $row["password"]) {

            // set session
            $_SESSION["login"] = true;

            $_SESSION["id"] = $row["id"];
            $_SESSION["popup_login"] = "Login Berhasil";
            $_SESSION["nama"] = $row["nama"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["image"] = $row["gambar"];
            // Password cocok, redirect ke halaman DashboardAdmin
            header("location: https://lontarbali.id/pages/admin/DashboardAdmin.php");
            $success = true;
            exit;
        }
    }
    $error = true;
}
