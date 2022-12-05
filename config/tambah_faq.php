<?php
include 'koneksi.php';
$email = $_POST['email'];
$pertanyaan = $_POST['pertanyaan'];

mysqli_query($koneksi, "INSERT INTO new_faq VALUES('', '$email', '$pertanyaan')");

header("location:../pages/faq.php");
?>