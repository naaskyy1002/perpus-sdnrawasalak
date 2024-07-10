<?=$this->extend('user/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Riwayat Peminjaman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('buku'); ?>">Buku</a></li>
                <li class="breadcrumb-item">Riwayat Peminjaman</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="cari" placeholder="Cari berdasarkan judul.." class="form-control" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="history-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Isi tabel bisa diisi sesuai data sejarah peminjaman yang dimiliki -->
                <tr>
                    <td>001</td>
                    <td>Tonya and her perfect tea</td>
                    <td>01-01-2024</td>
                    <td>15-01-2024</td>
                    <td><span class="badge badge-success">Telah Selesai</span></td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>The Secret Ingredient</td>
                    <td>05-02-2024</td>
                    <td>20-02-2024</td>
                    <td><span class="badge badge-success">Telah Selesai</span></td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Our Beloved Summer</td>
                    <td>01-07-2024</td>
                    <td>07-07-2024</td>
                    <td><span class="badge badge-danger">Terlambat</span></td>
                </tr>
            </tbody>
        </table>
    </div>

</main>

<?=$this->endSection()?>
