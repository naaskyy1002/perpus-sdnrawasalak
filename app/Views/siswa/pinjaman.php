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
    <div class="col-sm-12 col-md-4 ms-auto">
        <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukkan keyword pencarian" name="keyword">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
        </div>
        </form>
    </div>
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
                        <tr class="text-center">
                            <td><?= $i++ ?></td>
                            <td><?= esc($pinjaman['kode_buku']) ?></td>
                            <td><?= esc($pinjaman['judul_buku']) ?></td>
                            <td><?= esc($pinjaman['tgl_pinjam']) ?></td>
                            <td><?= esc($pinjaman['tgl_kembali']) ?></td>
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