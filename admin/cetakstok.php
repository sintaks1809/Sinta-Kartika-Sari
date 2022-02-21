<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LAPORAN STOK BARANG</title>
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
  <div style="text-align: center;">
    <font size="4"><b><u>LAPORAN STOK BARANG</u></b></font><br>
  </div>
  <br>

  <br>
  <table border="1" cellspacing="0" width="100%">
    <thead style="text-align: center;">
      <tr>
        <td style="text-align: center; "><b>No.</b></td>
        <td style="text-align: center; "><b>Kode Barang</b></td>
        <td style="text-align: center; "><b>Nama Barang</b></td>
        <td style="text-align: center; "><b>Harga Barang</b></td>
        <td style="text-align: center; "><b>Satuan</b></td>
        <td style="text-align: center; "><b>Masuk</b></td>
        <td style="text-align: center; "><b>Keluar</b></td>
        <td style="text-align: center; "><b>Sisa</b></td>
        <td style="text-align: center; "><b>Keterangan</b></td>
      </tr>
    </thead>
    <tbody>
      <?php
      include "../koneksi/koneksi.php";
      $result = mysqli_query($db, "SELECT * FROM tb_stokbarang WHERE id_jenis ");
      $i   = 1;
      while ($data = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td style="text-align: center; width=15px; font-size: 12px;"><?php echo $i; ?></td>
          <td style="text-align: center; width=50px; font-size: 12px;"><?php echo $data['kode_brg']; ?></td>
          <td style="text-align: left; width=150px; font-size: 12px;"><?php echo $data['nama_brg']; ?></td>
          <td style="text-align: center; width=70px; font-size: 12px;"><?php echo number_format($data['hargabarang']); ?></td>
          <td style="text-align: center; width=50px; font-size: 12px;"><?php echo $data['satuan']; ?></td>
          <td style="text-align: center; width=30px; font-size: 12px;"><?php echo $data['stok']; ?></td>
          <td style="text-align: center; width=30px; font-size: 12px;"><?php echo $data['keluar']; ?></td>
          <td style="text-align: center; width=30px; font-size: 12px;"><?php echo $data['sisa']; ?></td>
          <td style="text-align: center; width=70px; font-size: 12px;"><?php echo $data['keterangan']; ?></td>

        </tr>
      <?php
        $i++;
      }
      ?>
    </tbody>
  </table>
  <br>

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
</body>