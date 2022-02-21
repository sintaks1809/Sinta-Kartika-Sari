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
              <h2>DATA GOLONGAN</h2>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">


                  <a href="inputgolongan.php"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Golongan</button></a>
                  </form>
                  <br>
                  <p>


                    <?php
                    include '../koneksi/koneksi.php';
                    $sql1      = "SELECT * FROM tb_golongan order by id_bagian asc";
                    $query1    = mysqli_query($db, $sql1);
                    $total    = mysqli_num_rows($query1);
                    $no = 1;
                    if ($total == 0) {
                      echo "<center><h2>Belum Ada Data Golongan</h2></center>";
                    } else { ?>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="1%">No </th>
                        <th width="50%">
                          <center> Golongan </center>
                        </th>
                        <th width="6%">Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php
                      while ($data = mysqli_fetch_array($query1)) {
                        echo '<tr>
                              <td>	' . $no++ . '  	</td>
                            <td>   <center>	' . $data['golongan'] . '	</center>	</td> 
                              
                              
                              
                              <td style="text-align:center;">
                              <a href=detail-golongan.php?id_bagian=' . $data['id_bagian'] . '><button type="button" title="Detail" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                              <a href=editgolongan.php?id_bagian=' . $data['id_bagian'] . '><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a>
                              <a onclick="return konfirmasi()" href="proses/proses_hapusgolongan.php?id_bagian=' . $data['id_bagian'] . '"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a></td>
                              </tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                <?php } ?>
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
  <script type="text/javascript" language="JavaScript">
    function konfirmasi() {
      tanya = confirm("Anda Yakin Akan Menghapus Data ?");
      if (tanya == true) return true;
      else return false;
    }
  </script>

</body>

</html>