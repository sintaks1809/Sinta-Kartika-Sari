<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>APLIKASI ADMINISTRASI PENGADILAN NEGERI PULANG PISAU KELAS II </title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.PNG">

    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- Profile and Sidebarmenu -->
            <?php
            include("sidebarmenu.php");
            ?>
            <!-- /Profile and Sidebarmenu -->

            <!-- top navigation -->
            <?php
            include("header.php");
            ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">

                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">

                                <?php include '../koneksi/koneksi.php';
                                $id       = mysqli_real_escape_string($db, $_GET['id_pengajuan']);
                                $sql1      = "SELECT * FROM tb_pengajuan where id_pengajuan='" . $id . "'";
                                $query1    = mysqli_query($db, $sql1);
                                $data     = mysqli_fetch_array($query1); ?> <div class="x_content">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="profile_title">
                                            <div class="col-md-6">
                                                <h2>DETAIL DATA PERMINTAAN BARANG</h2>
                                            </div>
                                        </div>
                                        <div class="x_content">
                                        </div>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Barang</td>
                                                    <td><?php echo $data['nama_barang'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Type Barang</td>
                                                    <td><?php echo $data['type_barang'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td><?php echo $data['jumlah'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>satuan</td>
                                                    <td><?php echo $data['satuan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Pegawai</td>
                                                    <td><?php echo $data['nama_pegawai'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ruangan</td>
                                                    <td><?php echo $data['ruangan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Permintaan</td>
                                                    <td><?php echo $data['tanggal_pengajuan'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                            <a href="datapengajuan.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../assets/vendors/raphael/raphael.min.js"></script>
    <script src="../assets/vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/vendors/moment/min/moment.min.js"></script>
    <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>

</body>

</html>