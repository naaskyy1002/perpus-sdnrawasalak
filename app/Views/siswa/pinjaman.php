<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Pinjaman Terkini</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Koleksi Buku</a></li>
          <li class="breadcrumb-item">Pinjaman Terkini</li>
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
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Harus Kembali</th>
                </tr>
            </thead>
            <tbody>
                <!-- Isi tabel bisa diisi sesuai data sejarah peminjaman yang dimiliki -->
                <tr class="text-center">
                    <td>001</td>
                    <td>Buku A</td>
                    <td>01-01-2023</td>
                    <td>15-01-2023</td>
                </tr>
                <tr class="text-center">
                    <td>002</td>
                    <td>Buku B</td>
                    <td>05-02-2023</td>
                    <td>20-02-2023</td>
                </tr>
                <tr class="text-center">
                    <td>003</td>
                    <td>Buku C</td>
                    <td>10-03-2023</td>
                    <td>25-03-2023</td>
                </tr>
            </tbody>
        </table>
</div>
    </div>
</div>

<?=$this->endSection()?>