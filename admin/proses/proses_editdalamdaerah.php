<?php
session_start();
include '../../koneksi/koneksi.php';

$id                          = mysqli_real_escape_string($db, $_POST['id_dalamdaerah']);
$kode                = mysqli_real_escape_string($db, $_POST['kode']);
$nama_lengkap                = mysqli_real_escape_string($db, $_POST['nama_lengkap']);
$nip                         = mysqli_real_escape_string($db, $_POST['nip']);
$nomor_spt                      = mysqli_real_escape_string($db, $_POST['nomor_spt']);
$tgl_spt                     = mysqli_real_escape_string($db, $_POST['tgl_spt']);
$tgl_berangkat               = mysqli_real_escape_string($db, $_POST['tgl_berangkat']);
$tgl_kembali                 = mysqli_real_escape_string($db, $_POST['tgl_kembali']);
$tujuan                      = mysqli_real_escape_string($db, $_POST['tujuan']);
$maksud                      = mysqli_real_escape_string($db, $_POST['maksud']);
$gambar                                   = $_FILES['gambar']['name'];

date_default_timezone_set('Asia/Jakarta');
$thnNow                     = date("Y");
$tgl_spt                    = date('Y-m-d', strtotime($tgl_spt));
$tgl_berangkat              = date('Y-m-d', strtotime($tgl_berangkat));
$tgl_kembali                = date('Y-m-d', strtotime($tgl_kembali));


$sql1         = "SELECT * FROM tb_dalamdaerah where id_dalamdaerah ='" . $id . "'";
$query       = mysqli_query($db, $sql1);
$data         = mysqli_fetch_array($query);

if ($gambar == '') {
    $ext            = substr($data['gambar'], strripos($data['gambar'], '.'));
    $nama_b          = $kode . $ext;
    rename("../sptdalam/" . $data['gambar'], "../sptdalam/" . $nama_b);

    $sql1 = "UPDATE tb_dalamdaerah set 
    kode             = '$kode',
     nama_lengkap             = '$nama_lengkap',
						nip    		             = '$nip',
						
						nomor_spt	             = '$nomor_spt',
						tgl_spt                  = '$tgl_spt',
						
                        tgl_berangkat            = '$tgl_berangkat',
                        tgl_kembali              = '$tgl_kembali',
                        tujuan                   = '$tujuan',
                         
                        maksud                   = '$maksud',
                        gambar = '$nama_b'
                        
				where id_dalamdaerah = $id";

    $execute = mysqli_query($db, $sql1);

    echo "<Center><h2><br>Data SPPD Dalam Daerah telah diubah</h2></center>
        <meta http-equiv='refresh' content='2;url=../detail-dalamdaerah.php?id_dalamdaerah=" . $id . "'>";
} else {
    $tipe_file         = $_FILES['gambar']['type'];
    $ukuran_file     = $_FILES['gambar']['size'];
    if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)) {
        unlink("../sptdalam/" . $data['gambar']);
        $ext_file        = substr($gambar, strripos($gambar, '.'));
        $tmp_file         = $_FILES['gambar']['tmp_name'];

        $nama_baru = $kode;
        $path = "../sptdalam/" . $nama_baru;
        move_uploaded_file($tmp_file, $path);

        $sql1 = "UPDATE tb_dalamdaerah set kode             = '$kode',
						nama_lengkap             = '$nama_lengkap',
						nip    		             = '$nip',
						
						nomor_spt	             = '$nomor_spt',
						tgl_spt                  = '$tgl_spt',
						
                        tgl_berangkat            = '$tgl_berangkat',
                        tgl_kembali              = '$tgl_kembali',
                        tujuan                   = '$tujuan',
                         
                        maksud                   = '$maksud',
                        gambar = '$nama_baru'
                        
				where id_dalamdaerah = $id";
        $execute = mysqli_query($db, $sql1);

        echo "<Center><h2>Data SPPD Dalam Daerah Telah Berubah</h2></center>
        <meta http-equiv='refresh' content='2;url=../detail-dalamdaerah.php?id_dalamdaerah=" . $id . "'>";
    } else {
        echo "<Center><h2>Silahkan Ulangi, Data SPPD Dalam Daerah Belum Berubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../editdalamdaerah.php?id_dalamdaerah=" . $id . "'>";
    }
}
