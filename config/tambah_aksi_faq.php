<?php
include 'koneksi.php';
$kategori = $_POST['kategori'];
$pertanyaan = $_POST['pertanyaan'];
$jawaban = $_POST['jawaban'];

mysqli_query($koneksi, "INSERT INTO faq VALUES('', '$kategori', '$pertanyaan', '$jawaban')");

header("location:../pages/faq.php");
?>