<?php
    date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html lang="en">

<div style="display: flex; align-items: center; border-bottom: 2px solid #000000; padding-bottom: 10px;">
    <div style="flex: 0 0 120px; text-align: left;">
        <img src="<?= base_url('assets/img/LOGO-DINAS-PENDIDIKAN.png') ?>" alt="logo" width="85" />
    </div>
    <div style="flex: 1; text-align: center;">
        <div style="font-family: Times; font-size: 20px;">PEMERINTAH KOTA SUKABUMI</div>
        <div style="font-family: Times; font-size: 20px;">DINAS PENDIDIKAN DAN KEBUDAYAAN KOTA SUKABUMI</div>
        <div style="font-family: Times; font-size: 23px; font-weight: bold;">SEKOLAH DASAR NEGERI RAWASALAK</div>
        <div style="font-size: 15px; margin-top: 5px;">
            Jalan Bhayangkara Gg. Beringin No. 53 Kecamatan Gunungpuyuh Kota Sukabumi 43121
        </div>
        <div style="font-size: 13px;">
            Email : <a href="mailto:sdnrawasalak@yahoo.co.id" style="color: blue; text-decoration: underline;">sdnrawasalak@yahoo.co.id</a>
        </div>
        <div style="font-size: 13px; margin-top: 8px;">
            <span>NSS. 101026201044</span>
            <span style="margin-left: 100px;">NPSN. 20221693</span>
        </div>
    </div>
    <div style="flex: 0 0 120px; text-align: right;">
        <img src="<?= base_url('assets/img/LOGO-BARU-RAWASALAK-2024.png') ?>" alt="logo" width="100" />
    </div>
</div>

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
        .filter.form {
            margin-bottom: 20px;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div>
        <h2 class="text-center"><?= $title; ?></h2>
    </div>

    <div class="text-center no-print filter-form">
        <form action="" method="GET">
            <label for="month">Pilih Bulan:</label>
            <select name="month" id="month">
                <?php for ($m = 1; $m <= 12; $m++): ?>
                    <option value="<?= str_pad($m, 2, '0', STR_PAD_LEFT) ?>" <?= (isset($_GET['month']) && $_GET['month'] == str_pad($m, 2, '0', STR_PAD_LEFT)) ? 'selected' : '' ?>>
                        <?= date('F', mktime(0, 0, 0, $m, 10)) ?>
                    </option>
                <?php endfor; ?>
            </select>

            <label for="year">Pilih Tahun:</label>
            <select name="year" id="year">
                <?php for ($y = 2020; $y <= date("Y"); $y++): ?>
                    <option value="<?= $y ?>" <?= (isset($_GET['year']) && $_GET['year'] == $y) ? 'selected' : '' ?>>
                        <?= $y ?>
                    </option>
                <?php endfor; ?>
            </select>

            <button type="submit">Tampilkan</button>
        </form>
    </div>

    <?php
        $filteredBuku = [];
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = str_pad($_GET['month'], 2, '0', STR_PAD_LEFT);
            $year = $_GET['year'];
            foreach ($buku as $bk) {
                $bkMonth = date('m', strtotime($bk['tgl_masuk']));
                $bkYear = date('Y', strtotime($bk['tgl_masuk']));
                if ($bkMonth == $month && $bkYear == $year) {
                    $filteredBuku[] = $bk;
                }
            }
        } else {
            $filteredBuku = $buku; // No filter if month/year not selected
        }
    ?>

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
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($filteredBuku as $bk): ?>
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
                    <td><?= $bk['tgl_masuk'] ;?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <p>Dicetak pada: <?=(date("d-m-Y H:i:s"));?> </p>
    </div>

    <div style="position: relative; font-family: Times; font-size: 16px; width: 100%;">
        <div style="position: absolute; right: 50px; top: 30px; font-weight: bold;">Mengetahui,</div>
        <div style="position: absolute; right: 50px; top: 60px;">Kepala Perpustakaan</div>
        <div style="position: absolute; right: 50px; top: 90px;">SDN RAWASALAK</div>
        <div style="position: absolute; right: 50px; top: 170px;">Putri</div>
    </div>

    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
