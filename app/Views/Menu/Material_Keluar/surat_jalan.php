<html>

<head>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .footer-container {
        display: flex;
        flex-direction: column;
    }
    </style>
</head>

<body>
    <img src="/uploads/logo.png" width="80px" height="80px" />
    <div style="font-size:20px;text-align:center;">Surat Jalan<br><span style="font-size:10px;">No :
            <?= sprintf('%03s', $no_permintaan) ?>/LOG/MT</span>
    </div>
    <br>
    <br>
    <table style='width:650; font-size:7pt; padding-top: 20px;' cellspacing='2'>
        <tr>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'><span
                    style='font-size:12pt'>Nama&nbsp;&nbsp;&nbsp; : <?= $transaksi->nama ?></span><br>Tanggal :
                <?= $transaksi->tanggal_keluar ?><br>Telp
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                <?= $transaksi->no_telepon ?>
            </td>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'><span
                    style='font-size:12pt'>Wilayah &nbsp;&nbsp;&nbsp;&nbsp;:
                    <?= $transaksi->wilayah ?></span><br>Nomor PO : <?= $transaksi->no_permintaan ?></td>
        </tr>
    </table>
    <p></p>
    <table cellpadding="6" border="1">
        <tr>
            <th width="50px"><strong>No</strong></th>
            <th width="180px"><strong>Material</strong></th>
            <th><strong>Jumlah</strong></th>
            <th width="154px"><strong>Satuan</strong></th>
        </tr>
        <?php $no = 1; foreach ($datamaterialkeluar as $dkk) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $dkk->nama_material ?></td>
            <td><?= $dkk->jumlah ?></td>
            <td><?= $dkk->nama_satuan ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
<footer>
    <div class="footer-container">
        <table cellpadding="6" style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;'
            border='0'>
            <tr>
                <td align="center">Penerima<br><br><br>(.........................)</td>
                <td align="center">Pengirim<br><br><br>(.........................)</td>
                <td align="center">Logistik<br><br><br>(.........................)</td>
            </tr>
        </table>
    </div>
</footer>

</html>