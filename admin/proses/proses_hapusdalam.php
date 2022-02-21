<?php
session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id_dalamdaerah'])) {

    $id = $_GET['id_dalamdaerah'];


    $sql1          = "SELECT * FROM tb_dalamdaerah where id_dalamdaerah='" . $id . "'";
    $query      = mysqli_query($db, $sql1);
    $data        = mysqli_fetch_array($query);
    $total       = mysqli_num_rows($query);

    // cek hasil query
    if ($total == 0) {
        echo '<script>window.history.back()</script>';
    } else {
        $sql          = "DELETE FROM tb_dalamdaerah WHERE id_dalamdaerah='" . $id . "'";
        $query      = mysqli_query($db, $sql);


        if ($query) {
            echo "<Center><h2><br>Data SPPD Dalam Daerah telah Dihapus</h2></center>
				<meta http-equiv='refresh' content='2;url=../datadalamdaerah.php'>";
        } else {
            echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../datadalamdaerah.php'>";
        }
    }
}
