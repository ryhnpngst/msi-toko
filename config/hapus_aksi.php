<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM product WHERE id='$id'");

header("location:../pages/barang.php");
?>