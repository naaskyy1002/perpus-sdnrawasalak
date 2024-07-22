<?php
    date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Buku</title>
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
        <h1 class="text-center">Data Peminjaman Buku</h1>
    </div>
    <div>
        <table>
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tanggal Pendataan</th>
                    <th>Keterangan</th>
                    <th>Foto Bukti</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach ($peminjaman as $pj): ?>
                <tr class="text-center">
                <td><?= $i++; ?></td>
                <td><?= $pj['kode_buku']; ?></td>
                  <td><?= $pj['pengarang']; ?></td>
                  <td><?= $pj['judul_buku']; ?></td>
                  <td><?= $pj['username']; ?></td>
                  <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam'])) ?></td>
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
