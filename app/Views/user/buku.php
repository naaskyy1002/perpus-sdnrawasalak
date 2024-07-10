<?=$this->extend('user/template')?>
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
                <a href="<?= base_url('detail'); ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <img src="<?= base_url('assets/img/buku2.jpg') ?>" alt="Book Cover" class="book-cover">
            <div class="card-body">
                <h5 class="card-title">The Secret Ingredient</h5>
                <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <img src="<?= base_url('assets/img/buku3.jpg') ?>" alt="Book Cover" class="book-cover">
            <div class="card-body">
                <h5 class="card-title">Our Beloved Summer</h5>
                <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
        </div>
    </div>
</main>

<?=$this->endSection()?>
