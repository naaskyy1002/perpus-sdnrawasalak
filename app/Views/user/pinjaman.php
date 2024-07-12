<?=$this->extend('user/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Pinjaman Terkini</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Buku</a></li>
          <li class="breadcrumb-item">Peminjaman</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <div class="history-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Harus Kembali</th>
                </tr>
            </thead>
            <tbody>
                <!-- Isi tabel bisa diisi sesuai data sejarah peminjaman yang dimiliki -->
                <tr>
                    <td>001</td>
                    <td>Buku A</td>
                    <td>01-01-2023</td>
                    <td>15-01-2023</td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Buku B</td>
                    <td>05-02-2023</td>
                    <td>20-02-2023</td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Buku C</td>
                    <td>10-03-2023</td>
                    <td>25-03-2023</td>
                </tr>
            </tbody>
        </table>
    </div>

<?=$this->endSection()?>