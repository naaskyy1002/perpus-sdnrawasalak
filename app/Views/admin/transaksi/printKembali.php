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
    <title>Data Pengembalian Buku</title>
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
        <h2 class="text-center">Data Pengembalian Buku</h2>
    </div>
    <div class="text-center no-print filter-form" >
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
    </div>

    <?php
    $filteredPeminjaman = [];
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
        foreach ($peminjaman as $pj) {
            $pjMonth = date('m', strtotime($pj['tgl_kembali']));
            $pjYear = date('Y', strtotime($pj['tgl_kembali']));
            if ($pjMonth == $month && $pjYear == $year) {
                $filteredPeminjaman[] = $pj;
            }
        }
    } else {
        $filteredPeminjaman = $peminjaman; 
    }
    ?>

    <div>
        <table>
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Penulis</th>
                    <th>Judul</th>
                    <th>Nama Peminjam</th>
                    <th>Kelas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($filteredPeminjaman as $pj): ?>
                <tr class="text-center">
                    <td><?= $i++; ?></td>
                    <td><?= $pj['kode_buku']; ?></td>
                    <td><?= $pj['pengarang']; ?></td>
                    <td><?= $pj['judul_buku']; ?></td>
                    <td><?= $pj['username']; ?></td>
                    <td><?= $pj['kelas']; ?></td>
                    <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam'])) ?></td>
                    <td><?= date('d-M-Y', strtotime($pj['tgl_kembali'])) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <p>Dicetak pada: <?= date("d-m-Y H:i:s"); ?> </p>
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
