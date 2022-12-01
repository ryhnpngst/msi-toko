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
                    <h6 class="mb-4">Tambah Produk</h6>
                    <form action="../config/tambah_aksi.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="text" name="stok" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <!--  -->
        <?php include "../template/footer.php"; ?>
        <!--  -->

    </div>


</body>

</html>