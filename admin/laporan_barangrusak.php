<?php
// Load file koneksi.php
session_start();
include "login/ceksession.php";
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APLIKASI ADMINISTRASI PENGADILAN NEGERI PULANG PISAU KELAS II </title>

    <link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="../jst/jquery.min.js"></script> <!-- Load file jquery -->
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
                            <h2>LAPORAN BARANG RUSAK</h2>
                        </div>
                    </div>


                    <hr>
                    <form method="get" action="">
                        <label>Filter Berdasarkan</label><br>
                        <select name="filter" id="filter">
                            <option value="">Pilih</option>
                            <option value="3">Per Tahun</option>
                            <option value="4">Per Keterangan</option>

                        </select>
                        <br /><br />
                        <div id="form-keterangan">
                            <label>Keterangan</label><br>
                            <select name="keterangan">
                                <option value="">Pilih</option>
                                <option value="Digudangkan">Digudangkan</option>
                                <option value="Dimusnahkan">Dimusnahkan</option>
                            </select>
                            <br /><br />
                        </div>


                        <div id="form-tahun">
                            <label>Tahun</label><br>
                            <select name="tahun_anggaran">
                                <option value="">Pilih</option>
                                <?php
                                $query = "SELECT YEAR(tahun_anggaran) AS tahun_anggaran FROM tb_barangrusak GROUP BY YEAR(tahun_anggaran)"; // Tampilkan tahun sesuai di tabel transaksi
                                $sql = mysqli_query($db, $query); // Eksekusi/Jalankan query dari variabel $query
                                while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                    echo '<option value="' . $data['tahun_anggaran'] . '">' . $data['tahun_anggaran'] . '</option>';
                                }
                                ?>
                            </select>
                            <br /><br />
                        </div>


                        <button type="submit" class="btn btn-success">Tampilkan</button>
                        <a href="laporan_barangrusak.php" class="btn btn-warning">Reset Filter</a>
                    </form>
                    <hr />
                    <?php
                    if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
                        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                        if ($filter == '2') { // Jika filter nya 2 (per bulan)
                            $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                            echo '<b>Data Barang Rusak Perbulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun_anggaran'] . ' ' . $_GET['keterangan'] . '</b><br /><br />';

                            echo '<a href="print_barangrusak.php?filter=2&bulan=' . $_GET['bulan'] . '&tahun_anggaran=' . $_GET['tahun_anggaran'] . '&keterangan=' . $_GET['keterangan'] . '"class="btn btn-primary">Cetak PDF</a><br /><br />';

                            echo '<a href="surat.php?filter=2&bulan=' . $_GET['bulan'] . '&tahun_anggaran=' . $_GET['tahun_anggaran'] . '&keterangan=' . $_GET['keterangan'] . '"class="btn btn-danger">Berita Acara Pemusnahan Barang</a><br /><br />';
                            $query = "SELECT * FROM tb_barangrusak WHERE MONTH(tahun_anggaran)='" . $_GET['bulan'] . "' AND YEAR(tahun_anggaran)='" . $_GET['tahun_anggaran'] . "' AND keterangan='" . $_GET['keterangan'] . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter

                        } else if ($filter == '4') {

                            echo '<b>Data Barang Rusak Pertahun  ' . $_GET['keterangan'] . ' ' . $_GET['tahun_anggaran'] . '</b><br /><br />';

                            echo '<a href="print_barangrusak.php?filter=4&keterangan=' . $_GET['keterangan'] .  '&tahun_anggaran=' . $_GET['tahun_anggaran'] . '" class="btn btn-primary">Cetak PDF</a><br /><br />';

                            echo '<a href="surat.php?filter=4&keterangan=' . $_GET['keterangan'] .  '&tahun_anggaran=' . $_GET['tahun_anggaran'] . '" class="btn btn-danger">Berita Acara Pemusnahan Barang</a><br /><br />';

                            $query = "SELECT * FROM tb_barangrusak WHERE keterangan='" . $_GET['keterangan'] .  "' AND YEAR(tahun_anggaran)='" . $_GET['tahun_anggaran'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter


                        } else { // Jika filter nya 3 (per tahun)
                            echo '<b>Data Barang Rusak Pertahun  ' . $_GET['tahun_anggaran'] . '</b><br /><br />';
                            echo '<a href="print_barangrusak.php?filter=3&tahun_anggaran=' . $_GET['tahun_anggaran'] . '&keterangan=' . $_GET['keterangan'] . '" class="btn btn-primary">Cetak PDF</a><br /><br />';

                            echo '<a href="surat.php?filter=3&tahun_anggaran=' . $_GET['tahun_anggaran'] . '&keterangan=' . $_GET['keterangan'] . '" class="btn btn-danger">Berita Acara Pemusnahan Barang</a><br /><br />';

                            $query = "SELECT * FROM tb_barangrusak WHERE YEAR(tahun_anggaran)='" . $_GET['tahun_anggaran'] . "'AND keterangan='" . $_GET['keterangan'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                        }
                    } else { // Jika user tidak mengklik tombol tampilkan
                        echo '<b>Semua Data Barang Rusak  </b><br /><br />';
                        echo '<a href="print_barangrusak.php" class="btn btn-primary">Cetak PDF</a><br /><br />';
                        echo '<a href="surat.php" class="btn btn-danger">Berita Acara Pemusnahan Barang</a><br /><br />';
                        $query = "SELECT * FROM tb_barangrusak ORDER BY tahun_anggaran	"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
                    }

                    ?>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Type Barang </th>
                                <th>Ruangan </th>
                                <th>Penanggung Jawab </th>
                                <th>Jumlah </th>
                                <th>Tahun Anggaran </th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <?php
                        $sql = mysqli_query($db, $query); // Eksekusi/Jalankan query dari variabel $query
                        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                        $no = 1;
                        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $data['nama_barang'] . "</td>";
                                echo "<td>" . $data['type_barang'] . "</td>";
                                echo "<td>" . $data['ruangan'] . "</td>";
                                echo "<td>" . $data['penanggung_jawab'] . "</td>";
                                echo "<td>" . $data['jumlah'] . "</td>";
                                echo "<td>" . $data['tahun_anggaran'] . "</td>";
                                echo "<td>" . $data['keterangan'] . "</td>";

                                echo "</tr>";
                            }
                        } else { // Jika data tidak ada
                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                        }
                        ?>
                    </table>
                    <script>
                        $(document).ready(function() { // Ketika halaman selesai di load
                            $('.input-tanggal').datepicker({
                                dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
                            });
                            $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                            $('#filter').change(function() { // Ketika user memilih filter
                                if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                                    $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                                    $('#form-tanggal').show(); // Tampilkan form tanggal
                                } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                                    $('#form-tanggal').hide(); // Sembunyikan form tanggal
                                    $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                                } else { // Jika filternya 3 (per tahun)
                                    $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                                    $('#form-tahun').show(); // Tampilkan form tahun
                                }
                                $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                            })
                        })
                    </script>
                    </tbody>
                    </table>
                    <?php ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="pull-right">

        </div>
        <div class="clearfix">

        </div>
    </footer>
    <script src="../plugin/jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->
    </div>
    </div>

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