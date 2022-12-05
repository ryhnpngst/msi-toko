<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM new_faq WHERE id='$id'");

header("location:../pages/faq.php");
?>