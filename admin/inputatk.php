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
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>TAMBAH ATK <small> </small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="x_content">



                                        <?php
                                        include "../koneksi/koneksi.php";
                                        $query = mysqli_query($db, "SELECT MAX(kode_brg) from tb_stokbarang WHERE id_jenis=1");
                                        $kode_brg = mysqli_fetch_array($query);
                                        if ($kode_brg) {

                                            $nilaikode = substr($kode_brg[0], 4);

                                            $kode = (int) $nilaikode;

                                            //setiap kode ditambah 1
                                            $kode = $kode + 1;
                                            $kode_otomatis = "111." . str_pad($kode, 3, "0", STR_PAD_LEFT);
                                        } else {
                                            $kode_otomatis = "111001";
                                        }

                                        ?>

                                        <section class="content">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                </div>
                                                <form method="post" action="add-proses-m1.php" class="form-horizontal">
                                                    <div class="box-body">
                                                        <div class="form-group ">
                                                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Kode Barang</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" value="<?= $kode_otomatis; ?>" class="form-control" name="kode_brg" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_brg" class="col-sm-offset-1 col-sm-3 control-label">Jenis Barang</label>
                                                            <div class="col-sm-4">
                                                                <select id="jenis_brg" required="isikan dulu" class="form-control" name="id_jenis">
                                                                    <option value="">--Pilih Jenis Barang--</option>
                                                                    <?php

                                                                    $queryJenis = mysqli_query($db, "select * FROM tb_jenis_barang WHERE id_jenis=1");
                                                                    if (mysqli_num_rows($queryJenis)) {
                                                                        while ($row = mysqli_fetch_assoc($queryJenis)) :
                                                                    ?>
                                                                            <option value="<?= $row['id_jenis']; ?>"><?= $row['jenis_brg']; ?></option>
                                                                    <?php endwhile;
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="tes" for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Nama Barang</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="nama_brg">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="tes" for="hargabarang" class="col-sm-offset-1 col-sm-3 control-label">Harga Barang</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="hargabarang" name="hargabarang">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Satuan</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="satuan">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Jumlah</label>
                                                        <div class="col-sm-4">
                                                            <input type="number" class="form-control" name="jumlah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Keterangan</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="keterangan">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" name="simpan" class="btn btn-primary col-sm-offset-4 " value="Simpan">
                                                        &nbsp;
                                                        <input type="reset" class="btn btn-danger" value="Batal">
                                                        <a href="dataatk.php" style="margin:10px;" class="btn btn-success"><i class='fa fa-backward'> Kembali</i></a>


                                                    </div>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
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


    <script>
        $(document).ready(function() {
            $('.tanggal').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
        });


        var rupiah = document.getElementById("hargabarang");
        rupiah.addEventListener("keyup", function(e) {
            rupiah.value = currencyIdr(this.value, "Rp. ");
        });


        function currencyIdr(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : "");
        }
    </script>
</body>

</html>