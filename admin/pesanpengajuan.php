<?php

include "../koneksi/koneksi.php";
$tgl = date('Y-m-d');



$query =  "INSERT INTO pengajuan SELECT * FROM pengajuan_sementara";
$query2 = "DELETE FROM pengajuan_sementara WHERE tgl_pengajuan='$tgl'";



if (mysqli_query($db, $query)) {
	mysqli_query($db, $query2);
	echo '<script language="javascript">alert("From Pengajuan Berhasil Di Buat  !!!"); document.location="datapengajuan.php";</script>';
} else {
	echo "gagal euy" . mysqli_error($db);
}
