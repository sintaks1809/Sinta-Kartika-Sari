<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN DATA PEGAWAI</title>
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
        <font size="4"><b><u>LAPORAN DATA PEGAWAI</u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%">
        <thead style="text-align: center;">
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Nama Lengkap </th>
                <th>Tanggal Lahir</th>
                <th>NIP </th>
                <th>Golongan </th>
                <th>Alamat </th>
                <th>Nomor HP </th>
            </tr>
        </thead>
        <?php
        include "../koneksi/koneksi.php";
        $result = mysqli_query($db, "SELECT * FROM tb_bagian WHERE id_bagian ");
        echo   "
               
            <thead><tr></tr></thead>";
        $no = 1;
        echo "<tbody>";
        while ($data = mysqli_fetch_array($result)) {
            echo "<tr align='center'><td>$no</td>
        <td>$data[nama_bagian]</td>
        <td>$data[nama_lengkap]</td>
        <td>$data[tanggal_lahir_bagian]</td>
        <td>$data[nip]</td>
         <td>$data[golongan]</td>
            <td>$data[alamat]</td>
               <td>$data[no_hp_bagian]</td>

        </tr>";
            $no++;
        }
        echo "</tbody></table>";
        ?>
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