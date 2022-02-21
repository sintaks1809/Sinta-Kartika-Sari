<?php
session_start();
include '../../koneksi/koneksi.php';
$kode                = mysqli_real_escape_string($db, $_POST['kode']);
$nama_lengkap                = mysqli_real_escape_string($db, $_POST['nama_lengkap']);
$nip                         = mysqli_real_escape_string($db, $_POST['nip']);
$nomor_spt                   = mysqli_real_escape_string($db, $_POST['nomor_spt']);
$tgl_spt                     = mysqli_real_escape_string($db, $_POST['tgl_spt']);
$tgl_berangkat               = mysqli_real_escape_string($db, $_POST['tgl_berangkat']);
$tgl_kembali                 = mysqli_real_escape_string($db, $_POST['tgl_kembali']);
$tujuan                      = mysqli_real_escape_string($db, $_POST['tujuan']);
$maksud                      = mysqli_real_escape_string($db, $_POST['maksud']);

$nama_file_lengkap         = $_FILES['gambar']['name'];
$nama_file                 = substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
$ext_file                = substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
$tipe_file                 = $_FILES['gambar']['type'];
$ukuran_file             = $_FILES['gambar']['size'];
$tmp_file                 = $_FILES['gambar']['tmp_name'];

$tgl_spt                    = date('Y-m-d', strtotime($tgl_spt));
$tgl_berangkat              = date('Y-m-d', strtotime($tgl_berangkat));
$tgl_kembali                = date('Y-m-d', strtotime($tgl_kembali));


if (
    !($nama_lengkap == '') and !($nip == '') and !($nomor_spt == '') and !($tgl_spt == '') and !($tgl_berangkat == '') and !($tgl_kembali == '') and !($tujuan == '')    and !($maksud == '') and !($kode == '')
    and ($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)

) {

    $nama_baru = $kode . $ext_file;
    $path = "../sptdalam/" . $nama_baru;
    move_uploaded_file($tmp_file, $path);

    $sql1 = "INSERT INTO tb_dalamdaerah (kode,nama_lengkap,nip,nomor_spt,tgl_spt,tgl_berangkat,tgl_kembali,tujuan,maksud,gambar)
    
	values ('$kode','$nama_lengkap','$nip','$nomor_spt','$tgl_spt','$tgl_berangkat','$tgl_kembali','$tujuan','$maksud','$nama_baru')";

    $execute = mysqli_query($db, $sql1);

    echo "<Center><h2><br>Terima Kasih<br>Data SPPD Dalam Daerah Telah Didaftarkan ke Sistem</h2></center>
			<meta http-equiv='refresh' content='2;url=../datadalamdaerah.php'>";
} else {
    echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../datadalamdaerah.php'>";
}
