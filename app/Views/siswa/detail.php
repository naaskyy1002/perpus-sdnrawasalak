<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Koleksi Buku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('buku'); ?>">Buku</a></li>
                <li class="breadcrumb-item">Detail</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="book-detail card">
        <div class="book-cover-container">
            <img src="<?= base_url('assets/img/buku1.jpg') ?>" alt="Book Cover" class="book-cover-detail">
        </div>
        <div class="book-info">
            <h2>Tonya and her perfect tea</h2>
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

</main>

<?=$this->endSection()?>
