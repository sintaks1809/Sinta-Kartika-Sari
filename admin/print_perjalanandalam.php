<?php ob_start(); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN SPPD DALAM DAERAH</title>
    <link rel="shortcut icon" href="../img/logo.PNG">
    </style>
</head>

<body onLoad="window.print()">
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td width="1px">
                <img width="80px" src="../img/logo.PNG">
            </td>
            <td>
                <b>
                    <font size="5">PENGADILAN NEGERI PULANG PISAU KELAS II</font>
                </b> <br>
                <font size="3">Alamat : Jl. Tingang Menteng No.39 TELP.(0513) 2027516. FAX.(0513) 2027516.<br>
                </font>

                <font size="3">Website : <b> www.pn-pulangpisau.go.id </b>. Email :<b><u> pnpulangpisau@gmail.com</u></b><br>
                </font>

            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>
    <br>
    <div style="text-align: center;">
        <font size="4"><b><u>LAPORAN SPPD DALAM DAERAH</u></b></font><br>
    </div>
    <br>

    <br>

    <body>
        <?php
        // Load file koneksi.php
        include "../koneksi/koneksi.php";
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                echo '<b>Data SPPD Dalam Daerah Perbulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b><br /><br />';

                echo '<a href="print_perjalanandalam.php?filter=2&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '"class="btn btn-primary"></a>';
                $query = "SELECT * FROM tb_dalamdaerah WHERE MONTH(tgl_spt)='" . $_GET['bulan'] . "' AND YEAR(tgl_spt)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter


            } else { // Jika filter nya 3 (per tahun)
                echo '<b>Data SPPD Dalam Daerah Pertahun ' . $_GET['tahun'] . '</b><br /><br />';
                echo '<a href="print_perjalanandalam.php?filter=3&tahun=' . $_GET['tahun'] .  '" class="btn btn-primary"></a>';
                $query = "SELECT * FROM tb_dalamdaerah WHERE YEAR(tgl_spt)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            echo '<b>Semua Data SPPD Dalam Daerah  </b><br /><br />';
            echo '<a href="print_perjalanandalam.php" class="btn btn-primary"></a>';
            $query = "SELECT * FROM tb_dalamdaerah ORDER BY tgl_spt	"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
        }

        ?>
        <table border="1" cellspacing="0" width="100%">
            <thead style="text-align: center;">
                <tr>
                    <th>No</th>
                    <th>Kode Perjalanan</th>
                    <th>Nama Lengkap</th>
                    <th>NIP </th>
                    <th>Nomor SPT </th>
                    <th>Tanggal SPT </th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Kembali</th>
                    <th>Tujuan</th>
                    <th>Maksud</th>
                </tr>
            </thead>
            <?php
            $sql = mysqli_query($db, $query); // Eksekusi/Jalankan query dari variabel $query
            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
            $no = 1;
            if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                    $tgl = date('d-m-Y', strtotime($data['tgl_spt'])); // Ubah format tanggal jadi dd-mm-yyyy
                    echo "<tr>";
                    echo "<td><center>" . $no++ . "</center></td>";
                    echo "<td>" . $data['kode'] . "</td>";
                    echo "<td>" . $data['nama_lengkap'] . "</td>";
                    echo "<td>" . $data['nip'] . "</td>";
                    echo "<td>" . $data['nomor_spt'] . "</td>";
                    echo "<td>" . $tgl . "</td>";
                    echo "<td>" . $data['tgl_berangkat'] . "</td>";
                    echo "<td>" . $data['tgl_kembali'] . "</td>";
                    echo "<td>" . $data['tujuan'] . "</td>";
                    echo "<td>" . $data['maksud'] . "</td>";
                    echo "</tr>";
                }
            } else { // Jika data tidak ada
                echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
            }
            ?>
        </table>
        <ol></ol>
        <div style="width:300px;float:right;">
            Dikeluarkan : Pulang Pisau<br>
            Pada Tanggal : <?= date('d-m-Y') ?><br>
            <ol></ol>
            <div style="font-weight:bold;text-align:center">
                <br />
                PENGADILAN NEGERI PULANG PISAU</br>
                KETUA,</br>
                <p>&nbsp;</p>
                <br />
                <p><u>Dr. Nenny Ekawaty Barus, S.H., M.H</u><br>
                    NIP. 19770112 200112 2 001</p>
            </div>
        </div>
        </div>
    </body>

</html>