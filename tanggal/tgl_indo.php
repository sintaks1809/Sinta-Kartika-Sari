<?php
//Memanggil file fungsi konversi tanggal
include "fungsi_indotgl.php";
//Memanggil file koneksi database
include "koneksi/koneksi.php";

//Query memanggil data dari database dengan nama Jundi
$tampil = mysqli_query($db, "SELECT * FROM tb_tanggal WHERE nama=''");
while ($data = mysqli_fetch_array($tampil)) {

    $tanggal = tgl_aja($data['tgl_lahir']);
    $bulan = bln_aja($data['tgl_lahir']);
    $tahun = thn_aja($data['tgl_lahir']);
    $tgl = tgl_indo($data['tgl_lahir']);
?>

    Nama saya <b><?php echo $data['nama'] ?></b></br>
    Saya lahir pada tanggal <b><?php echo terbilang($tanggal) ?></b>,
    bulan <b><?php echo $bulan ?></b>,
    tahun <b><?php echo terbilang($tahun) ?></b>.

<?php
}
?>