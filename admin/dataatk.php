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
    <!-- Datatables -->
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
                        <div class="title_right">
                            <h2>Pengguna > <small>Data Pengguna</small></h2>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">

                                    <?php
                                    include "../koneksi/koneksi.php";


                                    if (isset($_GET['id_jenis'])) {
                                        $id_jenis = $_GET['id_jenis'];
                                        $query = mysqli_query($db, "SELECT * FROM tb_stokbarang WHERE id_jenis='$id_jenis' ");
                                    } else {
                                        $query = mysqli_query($db, "SELECT * FROM tb_stokbarang");
                                    }



                                    ?>
                                    <!-- Main content -->
                                    <section class="content">
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="text-center">Olah Data Stok Barang ATK</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <a href="inputatk.php" class=" btn btn-primary"><i class="fa fa-plus"></i> Tambah Data ATK</a><br>
                                                    </div>

                                                    <div class="col-md-2 pull-right">
                                                        <a target="_blank" href="cetakstok.php?idjenis=<?= $id_jenis;  ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Stok</a><br>
                                                    </div>
                                                    <br><br>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="datatable" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Barang</th>
                                                                <th>Nama Barang</th>
                                                                <th>Harga Barang</th>
                                                                <th>Satuan</th>
                                                                <th>Masuk</th>
                                                                <th>Keluar</th>
                                                                <th>Sisa</th>
                                                                <th>Keterangan</th>

                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <?php
                                                                $no = 1;

                                                                while ($data = mysqli_fetch_array($query)) {

                                                                ?>
                                                                    <td> <?= $no; ?> </td>

                                                                    <td> <?= $data['kode_brg']; ?> </td>
                                                                    <td style="text-align: left;"> <?= $data['nama_brg']; ?> </td>
                                                                    <td> <?= number_format($data['hargabarang']); ?> </td>
                                                                    <td> <?= $data['satuan']; ?> </td>

                                                                    <td> <?= $data['stok']; ?> </td>
                                                                    <td> <?= $data['keluar']; ?> </td>
                                                                    <td> <?= $data['sisa']; ?> </td>
                                                                    <td> <?= $data['keterangan']; ?> </td>


                                                                    <td>
                                                                        <a href="editatk.php=editatk&id<?= $data['kode_brg']; ?>"><span data-placement='top' data-toggle='tooltip' title='Update'><button class="btn btn-info">Update</button></span></a>


                                                                        <a href="?p=material-m1&aksi=hapus&id=<?= $data['kode_brg']; ?>"><span data-placement='top' data-toggle='tooltip' title='Hapus'><button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button></span></a>
                                                                    </td>
                                                            </tr>
                                                        <?php $no++;
                                                                }  ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </section>
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
                    <!-- iCheck -->
                    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
                    <!-- Datatables -->
                    <script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                    <script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                    <script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                    <script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
                    <script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
                    <script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
                    <script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
                    <script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
                    <script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                    <script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                    <script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
                    <script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
                    <script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
                    <script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
                    <script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>

                    <!-- Custom Theme Scripts -->
                    <script src="../assets/build/js/custom.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable();
                        });
                    </script>
                    <script type="text/javascript" language="JavaScript">
                        function konfirmasi() {
                            tanya = confirm("Anda Yakin Akan Menghapus Data ?");
                            if (tanya == true) return true;
                            else return false;
                        }
                    </script>

</body>

</html>
<script>
    $(function() {
        $("#material").DataTable({
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable": "Tidak ada data di database"
            }
        });
    });
</script>