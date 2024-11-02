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
        .filter-form {
            margin-bottom: 20px;
        }
        /* Hide the filter form during printing */
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
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

    <div>
        <h2 class="text-center">Data Peminjaman Buku</h2>
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
                <?php for ($y = 2023; $y <= date("Y"); $y++): ?>
                    <option value="<?= $y ?>" <?= (isset($_GET['year']) && $_GET['year'] == $y) ? 'selected' : '' ?>>
                        <?= $y ?>
                    </option>
                <?php endfor; ?>
            </select>

            <button type="submit">Tampilkan</button>
        </form>
        <form action="" method="GET" style="display: flex; align-items: center;">
            <div>
                <label for="kelas">Pilih Kelas:</label>
                <select name="kelas" id="kelas">
                    <option value="">Semua Kelas</option>
                    <option value="1" <?= (isset($_GET['kelas']) && $_GET['kelas'] == '1') ? 'selected' : '' ?>>Kelas 1</option>
                    <option value="2" <?= (isset($_GET['kelas']) && $_GET['kelas'] == '2') ? 'selected' : '' ?>>Kelas 2</option>
                    <option value="3" <?= (isset($_GET['kelas']) && $_GET['kelas'] == '3') ? 'selected' : '' ?>>Kelas 3</option>
                    <option value="4" <?= (isset($_GET['kelas']) && $_GET['kelas'] == '4') ? 'selected' : '' ?>>Kelas 4</option>
                    <option value="5" <?= (isset($_GET['kelas']) && $_GET['kelas'] == '5') ? 'selected' : '' ?>>Kelas 5</option>
                    <option value="6" <?= (isset($_GET['kelas']) && $_GET['kelas'] == '6') ? 'selected' : '' ?>>Kelas 6</option>
                </select>
                
                <button type="submit" name="filter_kelas">Tampilkan Kelas</button>
            </div>
        </form>
    </div>

    <?php
    $filteredPeminjaman = $peminjaman; // Mulai dengan semua data peminjaman

    // Filter berdasarkan bulan dan tahun
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
        $filteredPeminjaman = array_filter($filteredPeminjaman, function($pj) use ($month, $year) {
            $pjMonth = date('m', strtotime($pj['tgl_pinjam']));
            $pjYear = date('Y', strtotime($pj['tgl_pinjam']));
            return ($pjMonth == $month && $pjYear == $year);
        });
    }

    // Filter berdasarkan kelas
    if (isset($_GET['kelas']) && $_GET['kelas'] != '') {
        $kelas = $_GET['kelas'];
        $filteredPeminjaman = array_filter($filteredPeminjaman, function($pj) use ($kelas) {
            return ($pj['kelas'] == $kelas); // Memastikan data kelas sesuai dengan format di database
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
                    <th>Nama Peminjam</th>
                    <th>Kelas</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Tanggal Harus Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php if (empty($filteredPeminjaman)): ?>
                    <tr><td colspan="8" class="text-center">Tidak ada data peminjaman.</td></tr>
                <?php else: ?>
                    <?php foreach ($filteredPeminjaman as $pj): ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><?= htmlspecialchars($pj['kode_buku']); ?></td>
                        <td><?= htmlspecialchars($pj['judul_buku']); ?></td>
                        <td><?= htmlspecialchars($pj['pengarang']); ?></td>
                        <td><?= htmlspecialchars($pj['username']); ?></td>
                        <td><?= htmlspecialchars($pj['kelas']); ?></td>
                        <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam'])) ?></td>
                        <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam']. ' +3 days')) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
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
        // Automatically trigger print when data is loaded
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
