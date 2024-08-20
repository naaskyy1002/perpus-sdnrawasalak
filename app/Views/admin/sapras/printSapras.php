<?php
    date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="<?= base_url('assets/img/LOGO-BARU-RAWASALAK-2024.png') ?>" rel="icon">
    <style>
        .text-center {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <h1 class="text-center"><?= $title ?></h1>
    </div>
    <div>
        <table>
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Kondisi Barang</th>
                    <th>Asal Barang</th>
                    <th>Penyimpanan Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Nama Peminjam</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ; ?>
                <?php foreach ($sapras as $sp): ?>
                <tr class="text-center">
                    <td><?= $i++; ?></td>
                    <td><?= $sp['kode_barang'] ;?></td>
                    <td><?= $sp['nama_barang'] ;?></td>
                    <td><?= $sp['tanggal_masuk'] ;?></td>
                    <td><?= $sp['kondisi_barang'] ;?></td>
                    <td><?= $sp['asal_barang'] ;?></td>
                    <td><?= $sp['penyimpanan_barang'] ;?></td>
                    <td><?= $sp['jumlah_barang'] ;?></td>
                    <td><?= $sp['nama_peminjam'] ;?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <p>Dicetak pada: <?=(date("d-m-Y H:i:s"));?> </p>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
