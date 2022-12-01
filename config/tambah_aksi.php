<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$harga = $_POST['harga']; 
$stok = $_POST['stok'];

mysqli_query($koneksi, "INSERT INTO product VALUES('', '$nama', '$harga', '$stok', NOW())");

header("location:../pages/barang.php");
?>