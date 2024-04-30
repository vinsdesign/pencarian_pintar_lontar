<?php
// Hapus session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('key', '', time() - 3600);

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: http://localhost/pencarian_pintar_lontar/pages/admin/login.php");
exit;
