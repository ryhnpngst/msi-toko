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
                            <div class="col-lg-8">
                                <h6 class="mb-4">Tabel Produk</h6>
                            </div>
                            <div class="col-lg-4">
                                <form class="d-none d-md-flex ms-4">
                                    <input class="form-control border-0" type="search" placeholder="Search">
                                </form>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">ZIP</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM product");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $no++; ?></th>
                                            <td><?php echo $d['name']; ?></td>
                                            <td><?php echo $d['price']; ?></td>
                                            <td><?php echo $d['stok']; ?></td>
                                            <td>USA</td>
                                            <td>123</td>
                                            <td>Member</td>
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