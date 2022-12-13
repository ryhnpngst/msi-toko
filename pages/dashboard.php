<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php $page = 'dashboard';
        include "../template/sidebar.php"; ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Penjualan Hari ini -->
                    <?php
                    $data = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date = CURRENT_DATE()");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-chart-line fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Today Sale</p>
                                    <h6 class="mb-0">Rp<?php echo $d['jumlah']; ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>

                    <!-- Total Penjualan -->
                    <?php
                    $data = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Sale</p>
                                    <h6 class="mb-0">Rp<?php echo $d['jumlah']; ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>

                    <!-- Pendapatan Hari Ini -->
                    <div class="col-sm-6 col-xl-3">
                        <?php
                        $data = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date = CURRENT_DATE()");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-chart-area fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Today Revenue</p>
                                    <h6 class="mb-0">Rp<?php echo $d['jumlah'] + $d['jumlah'] * 0.5; ?></h6>
                                </div>
                            </div>
                        <?php }; ?>
                    </div>

                    <!-- Total Pendapatan -->
                    <div class="col-sm-6 col-xl-3">
                        <?php
                        $data = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Revenue</p>
                                    <h6 class="mb-0">Rp<?php echo $d['jumlah'] + $d['jumlah'] * 0.5; ?></h6>
                                </div>
                            </div>
                        <?php }; ?>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Penjualan dan Pendapatan Cabang Jalan Sangkuriang</h6>
                            </div>
                            <canvas id="penjualan"></canvas>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Penjualan dan Pendapatan Cabang Jalan Anabul</h6>
                            </div>
                            <canvas id="penjualan_anabul"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Penjualan Terakhir</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Pembeli</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM transaction ORDER BY id DESC LIMIT 5");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $d['date']; ?></td>
                                        <td>INV-00<?php echo $d['id']; ?></td>
                                        <td><?php echo $d['pembeli']; ?></td>
                                        <td>Rp<?php echo $d['total']; ?></td>
                                        <td>Lunas</td>
                                    </tr>
                                </tbody>
                            <?php }; ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <?php include "../template/footer.php"; ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script>
        // Salse & Revenue Chart
        var ctx2 = document.getElementById('penjualan').getContext('2d');
        var penjualan = new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                        label: "Penjualan",
                        data: [
                            <?php
                            $penjualanJul = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-07-%' AND branch = 'Sangkuriang'");
                            while ($pj = mysqli_fetch_array($penjualanJul)) {
                                echo $pj['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanAgu = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-08-%' AND branch = 'Sangkuriang'");
                            while ($pa = mysqli_fetch_array($penjualanAgu)) {
                                echo $pa['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanSep = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-09-%' AND branch = 'sangkuriang'");
                            while ($ps = mysqli_fetch_array($penjualanSep)) {
                                echo $ps['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanOkt = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-10-%' AND branch = 'Sangkuriang'");
                            while ($po = mysqli_fetch_array($penjualanOkt)) {
                                echo $po['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanNov = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-11-%' AND branch = 'Sangkuriang'");
                            while ($pn = mysqli_fetch_array($penjualanNov)) {
                                echo $pn['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanDes = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-12-%' AND branch = 'Sangkuriang'");
                            while ($pd = mysqli_fetch_array($penjualanDes)) {
                                echo $pd['jumlah'];
                            }
                            ?>
                        ],
                        backgroundColor: "rgba(0, 156, 255, .5)",
                        fill: true
                    },
                    {
                        label: "Pendapatan",
                        data: [
                            <?php
                            $pendapatanJul = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-07-%' AND branch = 'Sangkuriang'");
                            while ($pj = mysqli_fetch_array($pendapatanJul)) {
                                echo $pj['jumlah'] + $pj['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanAgu = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-08-%' AND branch = 'Sangkuriang'");
                            while ($pa = mysqli_fetch_array($pendapatanAgu)) {
                                echo $pa['jumlah'] + $pa['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanSep = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-09-%' AND branch = 'Sangkuriang'");
                            while ($ps = mysqli_fetch_array($pendapatanSep)) {
                                echo $ps['jumlah'] + $ps['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanOkt = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-10-%' AND branch = 'Sangkuriang'");
                            while ($po = mysqli_fetch_array($pendapatanOkt)) {
                                echo $po['jumlah'] + $po['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanNov = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-11-%' AND branch = 'Sangkuriang'");
                            while ($pn = mysqli_fetch_array($pendapatanNov)) {
                                echo $pn['jumlah'] + $pn['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanDes = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-12-%' AND branch = 'Sangkuriang'");
                            while ($pd = mysqli_fetch_array($pendapatanDes)) {
                                echo $pd['jumlah'] + $pd['jumlah'] * 0.5;
                            }
                            ?>
                        ],
                        backgroundColor: "rgba(0, 156, 255, .3)",
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true
            }
        });

        // Salse & Revenue Chart
        var ctx3 = document.getElementById('penjualan_anabul').getContext('2d');
        var penjualan_anabul = new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                        label: "Penjualan",
                        data: [
                            <?php
                            $penjualanJul = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-07-%' AND branch = 'Anabul'");
                            while ($pj = mysqli_fetch_array($penjualanJul)) {
                                echo $pj['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanAgu = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-08-%' AND branch = 'Anabul'");
                            while ($pa = mysqli_fetch_array($penjualanAgu)) {
                                echo $pa['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanSep = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-09-%' AND branch = 'Anabul'");
                            while ($ps = mysqli_fetch_array($penjualanSep)) {
                                echo $ps['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanOkt = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-10-%' AND branch = 'Anabul'");
                            while ($po = mysqli_fetch_array($penjualanOkt)) {
                                echo $po['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanNov = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-11-%' AND branch = 'Anabul'");
                            while ($pn = mysqli_fetch_array($penjualanNov)) {
                                echo $pn['jumlah'];
                            }
                            ?>,
                            <?php
                            $penjualanDes = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-12-%' AND branch = 'Anabul'");
                            while ($pd = mysqli_fetch_array($penjualanDes)) {
                                echo $pd['jumlah'];
                            }
                            ?>
                        ],
                        backgroundColor: "rgba(0, 156, 255, .5)",
                        fill: true
                    },
                    {
                        label: "Pendapatan",
                        data: [
                            <?php
                            $pendapatanJul = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-07-%' AND branch = 'Anabul'");
                            while ($pj = mysqli_fetch_array($pendapatanJul)) {
                                echo $pj['jumlah'] + $pj['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanAgu = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-08-%' AND branch = 'Anabul'");
                            while ($pa = mysqli_fetch_array($pendapatanAgu)) {
                                echo $pa['jumlah'] + $pa['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanSep = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-09-%' AND branch = 'Anabul'");
                            while ($ps = mysqli_fetch_array($pendapatanSep)) {
                                echo $ps['jumlah'] + $ps['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanOkt = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-10-%' AND branch = 'Anabul'");
                            while ($po = mysqli_fetch_array($pendapatanOkt)) {
                                echo $po['jumlah'] + $po['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanNov = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-11-%' AND branch = 'Anabul'");
                            while ($pn = mysqli_fetch_array($pendapatanNov)) {
                                echo $pn['jumlah'] + $pn['jumlah'] * 0.5;
                            }
                            ?>,
                            <?php
                            $pendapatanDes = mysqli_query($koneksi, "SELECT SUM(total) AS jumlah FROM transaction WHERE date LIKE '%-12-%' AND branch = 'Anabul'");
                            while ($pd = mysqli_fetch_array($pendapatanDes)) {
                                echo $pd['jumlah'] + $pd['jumlah'] * 0.5;
                            }
                            ?>
                        ],
                        backgroundColor: "rgba(0, 156, 255, .3)",
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>

</html>