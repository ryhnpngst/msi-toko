<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>

<body>
    <!--  -->
    <?php $page = 'barang';
    include "../template/sidebar.php"; ?>
    <!--  -->

    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Data Produk</h6>
                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM product WHERE id='$id'");
                    $no = 1;
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <form action="../config/edit_aksi.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $d['id'];?>">
                            <input type="text" name="nama" class="form-control" value="<?php echo $d['name'];?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control" value="<?php echo $d['price'];?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="text" name="stok" class="form-control" value="<?php echo $d['stok'];?>">
                            <input type="hidden" name="tanggal" class="form-control" value="<?php echo $d['date'];?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!--  -->
        <?php include "../template/footer.php"; ?>
        <!--  -->

    </div>


</body>

</html>