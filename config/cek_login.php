<?php
//mengaktifkan session php
session_start();

//menghubungkan dengan koneksi
include "koneksi.php";

//menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['password'];

//menyeleksi data pengguna dengan username dan password yang sesuaia
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' and password='$password'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek>0){
    // Mengambil data nama depan
    $getFirstName = mysqli_query($koneksi, "SELECT first_name FROM user WHERE email = '$email'");
    $resultFirstName = mysqli_fetch_assoc($getFirstName);
    $firstName = implode($resultFirstName);

    // Mengambil data nama depan
    $getLastName = mysqli_query($koneksi, "SELECT last_name FROM user WHERE email = '$email'");
    $resultLastName = mysqli_fetch_assoc($getLastName);
    $lastName = implode($resultLastName);
    

    // Mengambil data role
    $ambilRole = mysqli_query($koneksi, "SELECT role FROM user WHERE email = '$email'");
    $hasilRole = mysqli_fetch_assoc($ambilRole);
    $role = implode($hasilRole);
    
    $_SESSION['name'] = $firstName." ".$lastName;
    $_SESSION['role'] = $role;
    $_SESSION['status'] = "login";

    if ($role == "Admin") {
        header("location:../pages/barang.php"); 
    }elseif ($role == "Reguler") {
        header("location:../pages/barang.php");
    }elseif ($role == "Manager") {
        header("location:../pages/dashboard.php");
    }
}else{
    header("location:../pages/login.php?pesan=gagal");
}
?>