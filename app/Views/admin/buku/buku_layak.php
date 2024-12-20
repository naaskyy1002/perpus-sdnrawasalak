<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin');?>">Beranda</a></li>
                <li class="breadcrumb-item">Data Data Buku</li>
                <li class="breadcrumb-item"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
        <div class="card-body">
            <div class="row mb-3">
                <div class="ex col-sm-12 col-md-6 text-right d-flex align-items-end"> <!--justify-content-end-->
                    <a class="btn btn-tambah" href="<?= base_url('addBuku') ?>" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="ri-add-line"></i> Tambah</a>
                    <a href="/admin/excelBuku" target="_blank" class="btn btn-infos btn-spacing">
                        <i class="ri-file-excel-2-line"></i> Excel</a>
                    <a href="/admin/printBuku" target="_blank" class="btn btn-jk btn-spacing">
                        <i class="ri-printer-line"></i> Print</a>
                </div>
            </div>
                <section class="section">    
                    <div class="col-lg-12">
                        <?php if (session()->getFlashdata('message')): ?>
                            <div class="alert alert-success" id="success-message">
                                <?= session()->getFlashdata('message') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger" id="error-message">
                                <?= session()->getFlashdata('errors') ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">              
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Kode Buku</th>
                                        <th>Sampul</th>
                                        <th>Judul</th>
                                        <th>Pengarang</th>
                                        <th>Kategori</th>
                                        <th>Rak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ; ?>
                                    <?php foreach($buku as $bk) : ?>
                                        <tr class="text-center">
                                            <td><?= $i++; ?></td>
                                            <td><?= $bk['kode_buku'] ;?></td>
                                            <td><img src="<?= base_url('assets/img/buku/' . $bk['sampul']) ?>" alt="sampulBuku" width="50"></td>
                                            <td><?= $bk['judul_buku'] ;?></td>
                                            <td><?= $bk['pengarang'] ;?></td>
                                            <td><?= $bk['kategori'] ;?></td>
                                            <td><?= $bk['no_rak'] ;?></td>
                                            <td>
                                                <a href="#" title="Detail" data-bs-toggle="modal" data-bs-target="#viewModal" class="viewModalid" 
                                                    data-vkodebuku="<?=$bk['kode_buku'];?>"
                                                    data-vsampul="<?= base_url('assets/img/buku/' . $bk['sampul']) ;?>"
                                                    data-vjudulbuku="<?=$bk['judul_buku'];?>"
                                                    data-vpengarang="<?=$bk['pengarang'];?>"
                                                    data-vpenerbit="<?=$bk['penerbit'];?>"
                                                    data-vtahunterbit="<?=$bk['tahun_terbit'];?>"
                                                    data-vkategori="<?=$bk['kategori'];?>"
                                                    data-vnorak="<?=$bk['no_rak'];?>"
                                                    data-vjumlahbuku="<?=$bk['jumlah_buku'];?>"
                                                    data-vsinopsis="<?= $bk['sinopsis'] ;?>"
                                                    data-vtanggalmasuk="<?=$bk['tgl_masuk'];?>">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="#" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal" class="editModalid" 
                                                    data-eidbuku="<?=$bk['id_buku']?>"
                                                    data-ekodebuku="<?=$bk['kode_buku']?>"
                                                    data-esampul="<?= base_url('assets/img/buku/' . $bk['sampul']) ;?>"
                                                    data-eoldsampul="<?=$bk['sampul'] ;?>"
                                                    data-ejudulbuku="<?=$bk['judul_buku']?>"
                                                    data-epengarang="<?=$bk['pengarang']?>"
                                                    data-epenerbit="<?=$bk['penerbit']?>"
                                                    data-etahunterbit="<?=$bk['tahun_terbit']?>"
                                                    data-ekategori="<?=$bk['kategori']?>"
                                                    data-enorak="<?=$bk['no_rak']?>"
                                                    data-ejumlahbuku="<?=$bk['jumlah_buku'];?>"
                                                    data-esinopsis="<?= $bk['sinopsis'] ;?>"
                                                    data-etanggalmasuk="<?=$bk['tgl_masuk'];?>">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="#" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                                                    data-idbuku="<?=$bk['id_buku'];?>">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
		            </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Tambah Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg d-flex justify-content-center">
            <div class="modal-content text-dark bg-tambah">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Buku Layak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <form class="row g-3" method="post" enctype="multipart/form-data" action="addBuku">
                        <div class="col-12">
                            <label for="inputKode">Kode Buku</label>
                            <input type="text" name="a_kodebuku" class="form-control"required>
                        </div>
                        <div class="col-12">
                            <label>Sampul (.jpg / .png / .jpeg)</label>
                            <input type="file" name="a_sampul" accept=".jpg,.png,.jpeg" onchange="ImgFile(this);" class="form-control-file" required>
                            <img id="previewImage" src="#" alt="Preview Image" style="display:none; width: 200px; margin-top: 10px;">
                        </div>
                        <div class="col-12">
                            <label for="inputJudul" class="form-label">Judul Buku</label>
                            <input type="text" name="a_judulbuku" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputPenulis" class="form-label">Pengarang</label>
                            <input type="text" name="a_pengarang" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputPenerbit" class="form-label">Penerbit</label>
                            <input type="text" name="a_penerbit" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputTahun" class="form-label">Tahun Terbit</label>
                            <input type="number" name="a_tahunterbit" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputKategori" class="form-label">Kategori</label>
                            <select name="a_kategori" class="form-select" required>
                                <option value="" disabled selected>Pilih Kategori Buku</option>
                                <option value="Tematik">Tematik</option>
                                <option value="Sejarah">Sejarah</option>
                                <option value="Referensi">Referensi</option>
                                <option value="Fiksi">Fiksi</option>
                                <option value="Non-Fiksi">Non-Fiksi</option>
                                <option value="Komik">Komik</option>
                                <option value="Kurikulum Merdeka">Kurikulum Merdeka</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputRak" class="form-label">No Rak</label>
                            <input type="number" name="a_norak" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputKondisi" class="form-label">Jumlah Buku</label>
                            <input type="number" name="a_jumlahbuku" class="form-control" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="inputSinopsis" class="form-label">Sinopsis</label>
                            <textarea type="text" name="a_sinopsis" class="form-control" required></textarea>
                        </div>
                        <div class="col-12">
                            <label for="inputMasuk" class="form-label">Tanggal Masuk Buku</label>
                            <input type="date" name="a_tanggalmasuk" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg d-flex justify-content-center">
            <div class="modal-content text-light bg-sukses">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Buku</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="#" enctype="multipart/form-data" action="#">
                        <div class="form-group" style="text-align:center;">
                            <img id="vsampul" src="" style="width: 200px;">
                        </div>

                        <div class="form-group">
                            <label>Kode Buku</label>
                            <input type="text" id="vkodebuku" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" id="vjudulbuku" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" id="vpengarang" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" id="vpenerbit" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="number" id="vtahunterbit" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" id="vkategori" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>No Rak</label>
                            <input type="number" id="vnorak" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input class="form-control" id="vjumlahbuku" type="number" disabled></input>
                        </div>

                        <div class="form-group">
                            <label>Sinopsis</label>
                            <textarea class="form-control" id="vsinopsis" type="text" disabled></textarea>
                        </div>

                        <div class="col-12">
                            <label>Tanggal Masuk Buku</label>
                            <input type="date" id="vtanggalmasuk" class="form-control" disabled>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
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

            var vsinopsis = $(this).data('vsinopsis');
            $("#vsinopsis").val(vsinopsis);

            var vtanggalmasuk = $(this).data('vtanggalmasuk');
            $("#vtanggalmasuk").val(vtanggalmasuk);

            $('#viewModal').modal('show');
        });
    </script>

    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg d-flex justify-content-center">
                <div class="modal-content text-dark bg-edit">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Buku</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="editBuku">
                        <div class="col-12">
                            <label>Kode Buku</label>
                            <input type="text" id="ekodebuku" name="e_kodebuku" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" id="ejudulbuku" name="e_judulbuku" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" id="epengarang" name="e_pengarang" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" id="epenerbit" name="e_penerbit" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="number" id="etahunterbit" name="e_tahunterbit" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="e_kategori" class="form-select" id="ekategori" required>
                                <option value="" disabled selected>Pilih Kategori Buku</option>
                                <option value="Tematik">Tematik</option>
                                <option value="Sejarah">Sejarah</option>
                                <option value="Referensi">Referensi</option>
                                <option value="Fiksi">Fiksi</option>
                                <option value="Non-Fiksi">Non-Fiksi</option>
                                <option value="Komik">Komik</option>
                                <option value="Kurikulum Merdeka">Kurikulum Merdeka</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>No Rak</label>
                            <input type="number" id="enorak" name="e_norak" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input class="form-control" id="ejumlahbuku" name="e_jumlahbuku" type="number" required></input>
                        </div>

                        <div class="form-group">
                            <label>Sinopsis</label>
                            <textarea class="form-control" id="esinopsis" name="e_sinopsis" type="text" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Masuk Buku</label>
                            <input type="date" id="etanggalmasuk" name="e_tanggalmasuk" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Foto Bukti (.jpg / .png / .jpeg) <br><i>abaikan jika tidak ingin mengubah</i></label>
                            <div class="form-group">
                                <img id="esampul" src="" style="width: 200px;">
                            </div>
                            <input type="file" name="e_sampul" accept=".jpg,.png,.jpeg" onchange="ImgFile(this);" class="form-control-file">
                            <input type="text" name="e_oldsampul" class="form-control" id="eoldsampul" hidden required>
                        </div>
                        <input type="number" id="eidbuku" name="e_idbuku" hidden>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sukses">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
            $(".editModalid").click(function() {
                var eidbuku = $(this).data('eidbuku');
                $("#eidbuku").val(eidbuku);

                var ekodebuku = $(this).data('ekodebuku');
                $("#ekodebuku").val(ekodebuku);

                var esampul = $(this).data('esampul');
                $("#esampul").attr("src", esampul);

                var eoldsampul = $(this).data('eoldsampul');
                $("#eoldsampul").val(eoldsampul);

                var ejudulbuku = $(this).data('ejudulbuku');
                $("#ejudulbuku").val(ejudulbuku);

                var epengarang = $(this).data('epengarang');
                $("#epengarang").val(epengarang);

                var epenerbit = $(this).data('epenerbit');
                $("#epenerbit").val(epenerbit);

                var etahunterbit = $(this).data('etahunterbit');
                $("#etahunterbit").val(etahunterbit);

                var ekategori = $(this).data('ekategori');
                $("#ekategori").val(ekategori);

                var enorak = $(this).data('enorak');
                $("#enorak").val(enorak);

                var ejumlahbuku = $(this).data('ejumlahbuku');
                $("#ejumlahbuku").val(ejumlahbuku);

                var esinopsis = $(this).data('esinopsis');
                $("#esinopsis").val(esinopsis);

                var etanggalmasuk = $(this).data('etanggalmasuk');
                $("#etanggalmasuk").val(etanggalmasuk);


                $('#editModal').modal('show');
            });
    </script>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Buku Ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Tutup</button>
                    <form method="post" action="<?= base_url('admin/deleteBuku') ?>">
                        <input type="hidden" id="idbuku" name="id_buku">
                        <button type="submit" class="btn btn-hapus">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".deleteModalid").click(function() {
            var idbuku = $(this).data('idbuku');
            $("#idbuku").val(idbuku);
        });
    </script>

    <script>
            function ImgFile(input) {
                const file = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
    </script>

    <script>
        // Function to hide element after 5 seconds
        function hideAfterDelay(elementId) {
            const element = document.getElementById(elementId);
            if (element) {
                setTimeout(() => {
                    element.style.display = 'none';
                }, 5000);
            }
        }

        // Hide success message after 5 seconds
        hideAfterDelay('success-message');

        // Hide error message after 5 seconds
        hideAfterDelay('error-message');
    </script>


</main><!-- End #main -->
<?=$this->endSection()?>