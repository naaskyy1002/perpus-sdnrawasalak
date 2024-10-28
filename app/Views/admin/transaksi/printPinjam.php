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
            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div>
        <h1 class="text-center">Data Peminjaman Buku</h1>
    </div>

    <!-- Filter form for month and year (visible only on screen) -->
    <div class="text-center no-print filter-form">
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
    // Filter data based on selected month and year
    $filteredPeminjaman = [];
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
        foreach ($peminjaman as $pj) {
            $pjMonth = date('m', strtotime($pj['tgl_pinjam']));
            $pjYear = date('Y', strtotime($pj['tgl_pinjam']));
            if ($pjMonth == $month && $pjYear == $year) {
                $filteredPeminjaman[] = $pj;
            }
        }
    } else {
        $filteredPeminjaman = $peminjaman; // No filter if month/year not selected
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
                    <th>Tanggal Pinjaman</th>
                    <th>Tanggal Harus Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($filteredPeminjaman as $pj): ?>
                <tr class="text-center">
                    <td><?= $i++; ?></td>
                    <td><?= $pj['kode_buku']; ?></td>
                    <td><?= $pj['judul_buku']; ?></td>
                    <td><?= $pj['pengarang']; ?></td>
                    <td><?= $pj['username']; ?></td>
                    <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam'])) ?></td>
                    <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam']. ' +3 days')) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <p>Dicetak pada: <?= date("d-m-Y H:i:s"); ?> </p>
    </div>

    <script type="text/javascript">
        // Automatically trigger print when data is loaded
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
