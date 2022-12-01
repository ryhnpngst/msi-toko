<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$tanggal = $_POST['tanggal'];

mysqli_query($koneksi, "UPDATE product SET name='$nama', price='$harga', stok='$stok', date='$tanggal' WHERE id='$id'");

header("location:../pages/barang.php");
?>