<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1><?= $title ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('siswa'); ?>">Koleksi Buku</a></li>
          <li class="breadcrumb-item"><?= $title ?></li>
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
                    <th scope="col">Tanggal Harus Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php if (!empty($pinjamanTerkini)): ?>
                    <?php foreach ($pinjamanTerkini as $pinjaman): ?>
                        <?php
                            $tglHarusKembali = new DateTime($pinjaman['tgl_pinjam'] . ' +3 days');
                            $tglSekarang = new DateTime();
                            $terlambat = $tglSekarang > $tglHarusKembali;
                            $warna = $terlambat ? 'red' : 'black';
                            $status = $terlambat ? 'TERLAMBAT' : '';
                        ?>
                        <tr class="text-center">
                            <td><?= $i++ ?></td>
                            <td><?= esc($pinjaman['kode_buku']) ?></td>
                            <td><?= esc($pinjaman['judul_buku']) ?></td>
                            <td><?= date('d-M-Y', strtotime($pinjaman['tgl_pinjam'])) ?></td>
                            <td style="color: <?= $warna ?>;">
                                <?= date('d-M-Y', strtotime($pinjaman['tgl_pinjam'] . ' +3 days')) ?>
                                <?= $status ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pinjaman terkini</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</div>

<?=$this->endSection()?>
