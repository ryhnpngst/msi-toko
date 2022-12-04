<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!--  -->
        <?php $page = 'barang';
        include "../template/sidebar.php"; ?>
        <!--  -->

        <div class="content">

            <div class="container-fluid pt-4 px-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h6 class="mb-4">Tabel Produk</h6>
                            </div>
                            <div class="col-lg-3">
                                <form class="ms-4" action="../pages/barang.php" method="GET">
                                    <input class="form-control border-0" type="search" name="cari" placeholder="Cari">
                                </form>
                            </div>
                            <div class="col-lg-1">                          
                                <a href="barang.php" class="btn btn-danger">Reset</a>
                            </div>
                            <div class="col-lg-1">                          
                                <a href="tambah.php" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col"><a href="<?php $_SERVER['PHP_SELF']?>?by=harga">Harga</a></th>
                                        <th scope="col"><a href="<?php $_SERVER['PHP_SELF']?>?by=stok">Stok</a></th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($_GET['cari'])){
                                        $cari = $_GET['cari'];
                                        $data = mysqli_query($koneksi, "SELECT * FROM product WHERE name LIKE '%".$cari."%'");
                                    }else{
                                        $data = mysqli_query($koneksi, "SELECT * FROM product");
                                    }
                                    $no = 1;
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $no++; ?></th>
                                            <td><?php echo $d['name']; ?></td>
                                            <td><?php echo $d['price']; ?></td>
                                            <td><?php echo $d['stok']; ?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $d['id']; ?>"><i class="far fa-edit"></i></a> 
                                                <a href="../config/hapus_aksi.php?id=<?php echo $d['id']; ?>"><i class="far fa-trash-alt"></i></a>                                            
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
            <?php include "../template/footer.php"; ?>
            <!--  -->

        </div>
    </div>
</body>

</html>