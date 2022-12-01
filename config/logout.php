<?php
//mengaktifkan session
session_start();

//menghapus semua session
session_destroy();

//mengalihkan halaman
header("location:../pages/login.php?pesan=logout");
?>