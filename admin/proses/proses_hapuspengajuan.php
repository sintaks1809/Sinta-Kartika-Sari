<?php
session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id_pengajuan'])) {

    $id = $_GET['id_pengajuan'];


    $sql2          = "SELECT * FROM tb_pengajuan where id_pengajuan='" . $id . "'";
    $query2      = mysqli_query($db, $sql2);
    $data2         = mysqli_fetch_array($query2);
    $total        = mysqli_num_rows($query2);

    // cek hasil query
    if ($total == 0) {
        echo '<script>window.history.back()</script>';
    } else {
        $sql          = "DELETE FROM tb_pengajuan WHERE id_pengajuan='" . $id . "'";
        $query        = mysqli_query($db, $sql);


        if ($query) {

            echo "<Center><h2><br>Data Permintaan Barang Telah Dihapus</h2></center>
				<meta http-equiv='refresh' content='2;url=../datapengajuan.php'>";
        } else {
            echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../datapengajuan.php'>";
        }
    }
}
