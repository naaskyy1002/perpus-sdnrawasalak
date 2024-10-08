<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('buku'); ?>"><?= $title ?></a></li>
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
                            <?php if ($buku_item['jumlah_buku'] > 0): ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn btn-simpan btn-sm viewModalid"
                                    data-vsampul="<?= base_url('assets/img/buku/' . $buku_item['sampul']) ?>"
                                    data-vkodebuku="<?= $buku_item['kode_buku'] ?>"
                                    data-vjudulbuku="<?= $buku_item['judul_buku'] ?>"
                                    data-vpengarang="<?= $buku_item['pengarang'] ?>"
                                    data-vpenerbit="<?= $buku_item['penerbit'] ?>"
                                    data-vtahunterbit="<?= $buku_item['tahun_terbit'] ?>"
                                    data-vkategori="<?= $buku_item['kategori'] ?>"
                                    data-vnorak="<?= $buku_item['no_rak'] ?>"
                                    data-vjumlahbuku="<?= $buku_item['jumlah_buku'] ?>"
                                    data-vsinopsis="<?= $buku_item['sinopsis'] ?>"
                                >Lihat Detail</a>
                            <?php else: ?>
                                <p class="text-danger">Stok Buku Habis</p>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn btn-simpan btn-sm viewModalid"
                                    data-vsampul="<?= base_url('assets/img/buku/' . $buku_item['sampul']) ?>"
                                    data-vkodebuku="<?= $buku_item['kode_buku'] ?>"
                                    data-vjudulbuku="<?= $buku_item['judul_buku'] ?>"
                                    data-vpengarang="<?= $buku_item['pengarang'] ?>"
                                    data-vpenerbit="<?= $buku_item['penerbit'] ?>"
                                    data-vtahunterbit="<?= $buku_item['tahun_terbit'] ?>"
                                    data-vkategori="<?= $buku_item['kategori'] ?>"
                                    data-vnorak="<?= $buku_item['no_rak'] ?>"
                                    data-vjumlahbuku="<?= $buku_item['jumlah_buku'] ?>"
                                    data-vsinopsis="<?= $buku_item['sinopsis'] ?>"
                                >Lihat Detail</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>    
        </div>

        <?= $pager->links('buku', 'Pagination');?>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong id="vjudulbuku"></strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex">
                    <!-- <form method="#" enctype="multipart/form-data" action="#"> -->
                        <div class="book-cover-container me-3">
                            <img src="<?= base_url('assets/img/buku/' . $buku_item['sampul']) ?>" alt="Book Cover" class="book-cover-detail" id="vsampul">
                        </div>
                        <div class="book-info">
                            <!-- Ganti dengan deskripsi atau informasi lain -->
                            <ul class="book-details">
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Kode Buku</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vkodebuku"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Pengarang</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vpengarang"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Penerbit</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vpenerbit"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Tahun Terbit</strong> </div>
                                    <div class="col-lg-7 col-md-8">: <span id="vtahunterbit"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Kategori</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vkategori"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Nomor Rak</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vnorak"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Jumlah Buku Tersedia</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vjumlahbuku"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Sinopsis</strong></div>
                                    <span id="vsinopsis"></span>
                                </div>
                            </ul>
                        </div>
                        
                    <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Kembali</button>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".viewModalid").click(function() {
            var vkodebuku = $(this).data('vkodebuku');
            $("#vkodebuku").text(vkodebuku);

            var vsampul = $(this).data('vsampul');
            $("#vsampul").attr("src", vsampul);

            var vjudulbuku = $(this).data('vjudulbuku');
            $("#vjudulbuku").text(vjudulbuku);

            var vpengarang = $(this).data('vpengarang');
            $("#vpengarang").text(vpengarang);

            var vpenerbit = $(this).data('vpenerbit');
            $("#vpenerbit").text(vpenerbit);

            var vtahunterbit = $(this).data('vtahunterbit');
            $("#vtahunterbit").text(vtahunterbit);

            var vkategori = $(this).data('vkategori');
            $("#vkategori").text(vkategori);

            var vnorak = $(this).data('vnorak');
            $("#vnorak").text(vnorak);

            var vjumlahbuku = $(this).data('vjumlahbuku');
            $("#vjumlahbuku").text(vjumlahbuku);

            var vsinopsis = $(this).data('vsinopsis');
            $("#vsinopsis").text(vsinopsis);

            $('#viewModal').modal('show');
        });
    </script>
</main>

<?=$this->endSection()?>
