<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Buku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('buku'); ?>">Buku</a></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="search-bar text-right mb-3"> <!-- Posisi kanan dan tambahkan margin bawah -->
        <form class="search-form d-flex align-items-center" method="GET" action="#">
            <input type="text" name="cari" placeholder="Cari berdasarkan judul.." class="form-control form-control-sm" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
            <button type="submit" class="btn btn-primary btn-sm ml-2">Cari</button>
        </form>
    </div>

    <div class="book-container">
        <div class="card shadow mb-4">
            <img src="<?= base_url('assets/img/buku1.jpg') ?>" alt="Book Cover" class="book-cover">
            <div class="card-body">
                <h5 class="card-title">Tonya and her perfect tea</h5>
                <a href="#" data-bs-toggle="modal" data-bs-target="#LDbuku" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <img src="<?= base_url('assets/img/buku2.jpg') ?>" alt="Book Cover" class="book-cover">
            <div class="card-body">
                <h5 class="card-title">The Secret Ingredient</h5>
                <a href="#" data-bs-toggle="modal" data-bs-target="#LDbuku" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <img src="<?= base_url('assets/img/buku3.jpg') ?>" alt="Book Cover" class="book-cover">
            <div class="card-body">
                <h5 class="card-title">Our Beloved Summer</h5>
                <a href="#" data-bs-toggle="modal" data-bs-target="#LDbuku" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="LDbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong> Tonya and her perfect tea</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="book-cover-container me-3">
                        <img src="<?= base_url('assets/img/buku1.jpg') ?>" alt="Book Cover" class="book-cover-detail">
                    </div>
                    <div class="book-info">
                        <p>Gadis keras kepala ini bernama Milly. Dia menyukai ungu dan tahu apa yang dia inginkan masuk jurusan pilihan ibunya bukanlah keinginannya, sementara itu berkampanye menyelamatkan paus Minke adalah keinginannya, apa pun risikonya.
                        </p>
                        <ul class="book-details">
                            <li><strong>Kode Buku:</strong> B-1234</li>
                            <li><strong>Penerbit:</strong> Penerbit ABC</li>
                            <li><strong>Pengarang:</strong> Penulis XYZ</li>
                            <li><strong>Tahun Terbit:</strong> 2023</li>
                            <li><strong>ISBN:</strong> 978-602-7870-64-2</li>
                            <li><strong>Tebal:</strong> 196 Halaman</li>
                            <li><strong>Nomor Rak:</strong> A-12</li>
                            <li><strong>Jumlah Buku Tersedia:</strong> 5</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?=$this->endSection()?>
