<?php
    date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
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
        <h1 class="text-center"><?= $title; ?></h1>
    </div>
    <div>
        <table>
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Sampul</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>No Rak</th>
                    <th>Jumlah Buku</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($buku as $bk): ?>
                <tr class="text-center">
                <td><?= $i++; ?></td>
                    <td><?= $bk['kode_buku'] ;?></td>
                    <td><img src="<?= base_url('assets/img/buku/' . $bk['sampul']) ?>" alt="sampulBuku" width="50"></td>
                    <td><?= $bk['judul_buku'] ;?></td>
                    <td><?= $bk['pengarang'] ;?></td>
                    <td><?= $bk['penerbit'] ;?></td>
                    <td><?= $bk['tahun_terbit'] ;?></td>
                    <td><?= $bk['kategori'] ;?></td>
                    <td><?= $bk['no_rak'] ;?></td>
                    <td><?= $bk['jumlah_buku'] ;?></td>
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
