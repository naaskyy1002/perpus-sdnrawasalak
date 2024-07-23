<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Koleksi Buku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('buku'); ?>">Koleksi Buku</a></li>
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
        <div class="book-container">
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($buku as $buku_item): ?>
                    <div class="card shadow col-xxl-4 col-md-3">
                        <img src="<?= base_url('assets/img/buku/' . $buku_item['sampul']) ?>" alt="sampulBuku" class="book-cover">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($buku_item['judul_buku']) ?></h5>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn btn-primary btn-sm viewModalid"
                                data-vsampul="<?= base_url('assets/img/buku/' . $buku_item['sampul']) ?>"
                                data-vkodebuku="<?= $buku_item['kode_buku'] ?>"
                                data-vpengarang="<?= $buku_item['pengarang'] ?>"
                                data-vpenerbit="<?= $buku_item['penerbit'] ?>"
                                data-vtahunterbit="<?= $buku_item['tahun_terbit'] ?>"
                                data-vkategori="<?= $buku_item['kategori'] ?>"
                                data-vnorak="<?= $buku_item['no_rak'] ?>"
                                data-vjumlahbuku="<?= $buku_item['jumlah_buku'] ?>"
                            >Lihat Detail</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>    
        </div>

        <!-- Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><strong><?= esc($buku_item['judul_buku']) ?></strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <form method="#" enctype="multipart/form-data" action="#">
                            <div class="book-cover-container me-3">
                                <img src="<?= base_url('assets/img/buku/' . $buku_item['sampul']) ?>" alt="Book Cover" class="book-cover-detail" id="vsampul">
                            </div>
                            <div class="book-info">
                                <!-- Ganti dengan deskripsi atau informasi lain -->
                                <ul class="book-details">
                                    <li id="vkodebuku"><strong>Kode Buku:</strong> <?= esc($buku_item['kode_buku']) ?> </li>
                                    <li id="vpengarang"><strong>Pengarang:</strong> <?= esc($buku_item['pengarang']) ?></li>
                                    <li id="vpenerbit"><strong>Penerbit:</strong> <?= esc($buku_item['penerbit']) ?></li>
                                    <li id="vtahunterbit"><strong>Tahun Terbit:</strong> <?= esc($buku_item['tahun_terbit']) ?></li>
                                    <li id="vkategori"><strong>Kategori:</strong> <?= esc($buku_item['kategori']) ?></li>
                                    <li id="vnorak"><strong>Nomor Rak:</strong> <?= esc($buku_item['no_rak']) ?></li>
                                    <li id="vjumlahbuku"><strong>Jumlah Buku Tersedia:</strong> <?= esc($buku_item['jumlah_buku']) ?></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".viewModalid").click(function() {
            var vkodebuku = $(this).data('vkodebuku');
            $("#vkodebuku").val(vkodebuku);

            var vsampul = $(this).data('vsampul');
            $("#vsampul").attr("src", vsampul);

            var vjudulbuku = $(this).data('vjudulbuku');
            $("#vjudulbuku").val(vjudulbuku);

            var vpengarang = $(this).data('vpengarang');
            $("#vpengarang").val(vpengarang);

            var vpenerbit = $(this).data('vpenerbit');
            $("#vpenerbit").val(vpenerbit);

            var vtahunterbit = $(this).data('vtahunterbit');
            $("#vtahunterbit").val(vtahunterbit);

            var vkategori = $(this).data('vkategori');
            $("#vkategori").val(vkategori);

            var vnorak = $(this).data('vnorak');
            $("#vnorak").val(vnorak);

            var vjumlahbuku = $(this).data('vjumlahbuku');
            $("#vjumlahbuku").val(vjumlahbuku);

            $('#viewModal').modal('show');
        });
    </script>
</main>

<?=$this->endSection()?>
