<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>

    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>

    <!--  -->
    <link rel="stylesheet" href="../assets/css/styleFaq.css">
    <!--  -->
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar -->
        <?php $page = 'faq';
        include "../template/sidebar.php"; ?>
        <!-- Sidebar -->

        <div class="content">

            <!-- faq -->
            <div class="container-fluid pt-4 px-4 ">
                <div class="bg-light rounded h-100 p-4">
                    <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
                        <ul class="cd-faq__categories" hidden>
                            <li><a class="cd-faq__category cd-faq__category-selected truncate" href="#basics">Basics</a></li>
                            <li><a class="cd-faq__category truncate" href="#mobile">Mobile</a></li>
                            <li><a class="cd-faq__category truncate" href="#account">Account</a></li>
                            <li><a class="cd-faq__category truncate" href="#payments">Payments</a></li>
                            <li><a class="cd-faq__category truncate" href="#privacy">Privacy</a></li>
                            <li><a class="cd-faq__category truncate" href="#delivery">Delivery</a></li>
                        </ul>
                        <!-- cd-faq__categories -->

                        <div class="cd-faq__items">
                            <ul id="basics" class="cd-faq__group">
                                <li class="cd-faq__title">
                                    <h2>Dasar</h2>
                                </li>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM faq WHERE category = 'basic'");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <li class="cd-faq__item">
                                        <a class="cd-faq__trigger" href="#0"><span><?php echo $d['question']; ?></span></a>
                                        <div class="cd-faq__content">
                                            <div class="text-component">
                                                <p><?php echo $d['answer']; ?></p>
                                            </div>
                                        </div> <!-- cd-faq__content -->
                                    </li>
                                <?php };
                                ?>
                            </ul> <!-- cd-faq__group -->


                            <ul id="mobile" class="cd-faq__group">
                                <li class="cd-faq__title">
                                    <h2>Akun</h2>
                                </li>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM faq WHERE category = 'account'");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <li class="cd-faq__item">
                                        <a class="cd-faq__trigger" href="#0"><span><?php echo $d['question']; ?></span></a>
                                        <div class="cd-faq__content">
                                            <div class="text-component">
                                                <p><?php echo $d['answer']; ?></p>
                                            </div>
                                        </div> <!-- cd-faq__content -->
                                    </li>
                                <?php };
                                ?>
                            </ul><!-- cd-faq__group -->

                            <a href="#0" class="cd-faq__close-panel text-replace">Close</a>

                            <div class="cd-faq__overlay" aria-hidden="true"></div>
                    </section> <!-- cd-faq -->
                </div>
            </div>
            <!-- faq -->

            <!-- Pertanyaan baru -->
            <?php if ($_SESSION['role'] == "Admin") { ?>
                <div class="container-fluid pt-4 px-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Pertanyaan Baru</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = mysqli_query($koneksi, "SELECT * FROM new_faq");
                                    $no = 1;
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $no++; ?></th>
                                            <td><?php echo $d['email']; ?></td>
                                            <td><?php echo $d['question']; ?></td>
                                            <td><a href="../config/hapus_pertanyaan.php?id=<?php echo $d['id']; ?>"><i class="fas fa-check"></i></a></td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php }; ?>
            <!-- Pertanyaan baru -->

            <!-- Input FAQ -->
            <?php if ($_SESSION['role'] == "Admin") { ?>
                <div class="container-fluid pt-4 px-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tambahkan FAQ</h6>
                            <form action="../config/tambah_aksi_faq.php" method="post">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="kategori" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="basic">Dasar</option>
                                        <option value="account">Akun</option>
                                    </select>
                                    <label for="floatingSelect">Kategori</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="pertanyaan" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Pertanyaan</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="jawaban" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
                                    <label for="floatingTextarea">Jawaban</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }; ?>

            <!-- Input FAQ -->

            <!-- Pertanyaan baru -->
            <?php if ($_SESSION['role'] == "Reguler") {?>
                <div class="container-fluid pt-4 px-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Memiliki pertanyaan yang belum terjawab?</h6>
                            <form action="../config/tambah_faq.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="pertanyaan" placeholder="Ajukan pertanyaan di sini" id="floatingTextarea" style="height: 150px;"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
           <?php }; ?>
            <!-- Pertanyaan baru -->



            <!-- Footer -->
            <?php include "../template/footer.php"; ?>
            <!-- Footer -->

            <script src="../assets/js/utilFaq.js"></script> <!-- util functions included in the CodyHouse framework -->
            <script src="../assets/js/mainFaq.js"></script>
        </div>
    </div>

</body>

</html>