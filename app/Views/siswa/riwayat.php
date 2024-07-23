<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Riwayat Peminjaman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Koleksi Buku</a></li>
                <li class="breadcrumb-item">Riwayat Peminjaman</li>
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
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Isi tabel bisa diisi sesuai data sejarah peminjaman yang dimiliki -->
                <tr class="text-center">
                    <td>001</td>
                    <td>Tonya and her perfect tea</td>
                    <td>01-01-2024</td>
                    <td>15-01-2024</td>
                    <td><span class="badge badge-success">Telah Selesai</span></td>
                </tr>
                <tr class="text-center">
                    <td>002</td>
                    <td>The Secret Ingredient</td>
                    <td>05-02-2024</td>
                    <td>20-02-2024</td>
                    <td><span class="badge badge-success">Telah Selesai</span></td>
                </tr>
                <tr class="text-center">
                    <td>003</td>
                    <td>Our Beloved Summer</td>
                    <td>01-07-2024</td>
                    <td>07-07-2024</td>
                    <td><span class="badge badge-danger">Terlambat</span></td>
                </tr>
            </tbody>
        </table>
</div>
    </div>

</main>

<?=$this->endSection()?>
