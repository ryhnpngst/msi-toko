<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Cek Apakah Sudah Login -->
    <?php
    include '../config/koneksi.php';
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../pages/login.php?pesan=belum_login");
    }
    ?>

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="../pages/dashboard.php"  class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">TokoBapak</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0"><?php echo $_SESSION['name']; ?></h6>
                    <span><?php echo $_SESSION['role']; ?></span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <?php if ($_SESSION['role'] == "Admin") { ?>
                    <a href="../pages/barang.php" class="nav-item nav-link <?php if($page=='barang'){echo 'active';}?>"><i class="fa fa-keyboard me-2"></i>Barang</a>
                    <a href="../pages/faq.php" class="nav-item nav-link <?php if($page=='faq'){echo 'active';}?>"><i class="fas fa-question me-2"></i>FAQ</a>
                    <a href="../config/logout.php" class="nav-item nav-link "><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                <?php }
                if ($_SESSION['role'] == "Reguler"){?>
                    <a href="../pages/barang.php" class="nav-item nav-link <?php if($page=='barang'){echo 'active';}?>"><i class="fa fa-keyboard me-2"></i>Barang</a>
                    <a href="../pages/faq.php" class="nav-item nav-link <?php if($page=='faq'){echo 'active';}?>"><i class="fas fa-question me-2"></i>FAQ</a>
                    <a href="../config/logout.php" class="nav-item nav-link "><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                <?php }
                if ($_SESSION['role'] == "Manager"){?>
                    <a href="../pages/dashboard.php" class="nav-item nav-link <?php if($page=='dashboard'){echo 'active';}?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="../pages/pengguna.php" class="nav-item nav-link <?php if($page=='pengguna'){echo 'active';}?>"><i class="fas fa-users me-2"></i>Karyawan</a>
                    <a href="../pages/barang.php" class="nav-item nav-link <?php if($page=='barang'){echo 'active';}?>"><i class="fa fa-keyboard me-2"></i>Barang</a>
                    <a href="../pages/faq.php" class="nav-item nav-link <?php if($page=='faq'){echo 'active';}?>"><i class="fas fa-question me-2"></i>FAQ</a>
                    <a href="../config/logout.php" class="nav-item nav-link "><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                <?php }; ?>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item">Buttons</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div> -->
                <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a> -->
                <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div> -->
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->
</body>

</html>