<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN BARANG </title>
    <link rel="shortcut icon" href="../img/logo.PNG">
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
        <font size="4"><b><u>LAPORAN DATA BARANG</u></b></font><br>
    </div>
    <br>

    <br>

    <body>
        <?php
        include "../koneksi/koneksi.php";
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                echo '<b>Data Barang Perbulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . ' ' . $_GET['ruangan'] . '</b>';

                echo '<a href="print_barang.php?filter=2&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '&ruangan=' . $_GET['ruangan'] . '"class="btn btn-primary"></a><br />';
                $query = "SELECT * FROM tb_barangbaru WHERE MONTH(tahun_anggaran)='" . $_GET['bulan'] . "' AND YEAR(tahun_anggaran)='" . $_GET['tahun'] . "' AND ruangan='" . $_GET['ruangan'] . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter

            } else if ($filter == '4') {

                echo '<b>Data Barang Pertahun ' . $_GET['ruangan'] . '</b><br />';
                echo '<a href="print_barang.php?filter=4&ruangan=' . $_GET['ruangan'] . '" class="btn btn-primary"></a>';
                $query = "SELECT * FROM tb_barangbaru WHERE ruangan='" . $_GET['ruangan'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter


            } else { // Jika filter nya 3 (per tahun)
                echo '<b>Data Barang Pertahun ' . $_GET['tahun'] . '</b>';
                echo '<a href="print_barang.php?filter=3&tahun=' . $_GET['tahun'] . '&ruangan=' . $_GET['ruangan'] . '" class="btn btn-primary"></a>';
                $query = "SELECT * FROM tb_barangbaru WHERE YEAR(tahun_anggaran)='" . $_GET['tahun'] . "'AND ruangan='" . $_GET['ruangan'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            echo '<b>Semua Data Barang   </b><br/>';
            echo '<a href="print_barang.php" class="btn btn-primary"></a>';
            $query = "SELECT * FROM tb_barangbaru ORDER BY tahun_anggaran	"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
        }

        ?>
    </body>
    <table border="1" cellspacing="0" width="100%">
        <thead style="text-align: center;">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Type Barang </th>
                <th>Ruangan </th>
                <th>Penanggung Jawab </th>
                <th>Jumlah </th>
                <th>Tahun Anggaran </th>
            </tr>
        </thead>
        <?php
        $sql = mysqli_query($db, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
        $no = 1;
        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                echo "<tr>";
                echo "<td><center>" . $no++ . "</center></td>";
                echo "<td>" . $data['nama_barang'] . "</td>";
                echo "<td>" . $data['type_barang'] . "</td>";
                echo "<td>" . $data['ruangan'] . "</td>";
                echo "<td>" . $data['penanggung_jawab'] . "</td>";
                echo "<td><center>" . $data['jumlah'] . "</center></td>";
                echo "<td><center>" . $data['tahun_anggaran'] . "</center></td>";

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