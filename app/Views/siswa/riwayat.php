<?= $this->extend('siswa/template') ?>
<?= $this->section('body') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= esc($title) ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('siswa'); ?>">Koleksi Buku</a></li>
                <li class="breadcrumb-item"><?= esc($title) ?></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="book-collection">
        <div class="history-table">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php if (!empty($riwayat)): ?>
                            <?php foreach ($riwayat as $rw): ?>
                                <?php
                                    // Mendapatkan tanggal pinjam dan tanggal kembali
                                    $tgl_pinjam = new DateTime($rw['tgl_pinjam']);
                                    $tgl_kembali = !empty($rw['tgl_kembali']) ? new DateTime($rw['tgl_kembali']) : null;
                                    $batas_waktu = $tgl_pinjam->add(new DateInterval('P3D')); // Batas waktu 3 hari

                                    // Menentukan status
                                    if ($tgl_kembali) {
                                        $status = ($tgl_kembali <= $batas_waktu) ? 'Telah Selesai' : 'Terlambat';
                                    } else {
                                        $status = (new DateTime() > $batas_waktu) ? 'Terlambat' : 'Belum Kembali';
                                    }
                                ?>
                                <tr class="text-center">
                                    <td><?= esc($i++) ?></td>
                                    <td><?= esc($rw['kode_buku']) ?></td>
                                    <td><?= esc($rw['judul_buku']) ?></td>
                                    <td><?= date('d-M-Y', strtotime($rw['tgl_pinjam'])) ?></td>
                                    <td><?= ($rw['tgl_kembali'] !== null) ? date('d-M-Y', strtotime($rw['tgl_kembali'])) : '-' ?></td>
                                    <td>
                                        <span class="badge <?= ($status == 'Terlambat') ? 'badge-danger' : 'badge-success' ?>">
                                            <?= esc($status) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada riwayat peminjaman</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<?= $this->endSection() ?>
