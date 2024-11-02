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
        .filter-form {
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
        <h2 class="text-center"><?= $title ?></h2>
    </div>

    <div class="text-center no-print filter-form" style="display: flex; justify-content: space-between; margin-bottom: 20px;">
        <form action="" method="GET">
            <label for="month">Pilih Bulan:</label>
            <select name="month" id="month">
                <?php for ($m = 1; $m <= 12; $m++): ?>
                    <option value="<?= $m ?>" <?= (isset($_GET['month']) && $_GET['month'] == $m) ? 'selected' : '' ?>>
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
        <form action="" method="GET" style="display: flex; align-items: center;">
            <div>
                <label for="kategori">Pilih Kategori:</label>
                <select name="kategori" id="kategori">
                    <option value="">Semua Kategori</option>
                    <option value="Tematik" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Tematik') ? 'selected' : '' ?>>Tematik</option>
                    <option value="Sejarah" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Sejarah') ? 'selected' : '' ?>>Sejarah</option>
                    <option value="Fiksi" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Fiksi') ? 'selected' : '' ?>>Fiksi</option>
                    <option value="Non-Fiksi" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Non-Fiksi') ? 'selected' : '' ?>>Non-Fiksi</option>
                    <option value="Referensi" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Referensi') ? 'selected' : '' ?>>Referensi</option>
                    <option value="Komik" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Komik') ? 'selected' : '' ?>>Komik</option>
                    <option value="Kurikulum Merdeka" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Kurikulum Merdeka') ? 'selected' : '' ?>>Kurikulum Merdeka</option>
                </select>
                
                <button type="submit" name="filter_kategori">Tampilkan Kategori</button>
            </div>
        </form>
    </div>

    <?php
        $filteredBukuRusak = $bkrusak;

        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $filteredBukuRusak = array_filter($filteredBukuRusak, function ($bkr) use ($month, $year) {
                $bkrMonth = date('m', strtotime($bkr['tanggal_pendataan']));
                $bkrYear = date('Y', strtotime($bkr['tanggal_pendataan']));
                return $bkrMonth == $month && $bkrYear == $year;
            });
        }

        if (isset($_GET['kategori']) && $_GET['kategori'] != '') {
            $kategori = $_GET['kategori'];  
            $filteredBukuRusak = array_filter($filteredBukuRusak, function ($bkr) use ($kategori) {
                return $bkr['kategori'] == $kategori;
            });
        }
    ?>

    <div>
        <table>
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>kategori</th>
                    <th>Tanggal Pendataan</th>
                    <th>Keterangan</th>
                    <th>Foto Bukti</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php if (empty($filteredBukuRusak)): ?>
                    <tr><td colspan="8" class="text-center">Tidak ada data buku rusak.</td></tr>
                <?php else: ?>
                    <?php foreach ($filteredBukuRusak as $bkr): ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><?= htmlspecialchars($bkr['kode_buku']);?></td>
                        <td><?= htmlspecialchars($bkr['judul_buku']);?></td>
                        <td><?= htmlspecialchars($bkr['pengarang']);?></td>
                        <td><?= htmlspecialchars($bkr['kategori']);?></td>
                        <td><?= htmlspecialchars($bkr['tanggal_pendataan']);?></td>
                        <td><?= htmlspecialchars($bkr['keterangan']);?></td>
                        <td><img src="<?= base_url('assets/img/bukti/' . $bkr['foto_bukti']) ?>" alt="fotoBukti" width="50"></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
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
