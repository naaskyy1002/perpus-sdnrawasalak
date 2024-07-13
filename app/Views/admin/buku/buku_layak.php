<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Buku Layak</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin');?>">Beranda</a></li>
                <li class="breadcrumb-item">Data Buku Layak</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <a class="btn btn-primary" href="<?= base_url('addBuku') ?>" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus"></i> Tambah Buku
            </a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-6 col-md-3">
                    <label for="pilihBulan">Pilih Bulan</label>
                    <select id="pilihBulan" class="form-control">
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>Oktober</option>
                        <option>November</option>
                        <option>Desember</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="pilihTahun">Pilih Tahun</label>
                    <select id="pilihTahun" class="form-control">
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-6 text-right d-flex align-items-end">
                    <button class="btn btn-info mr-2">
                        <i class="bi bi-download"></i> Excel
                    </button>
                    <button class="btn btn-warning">
                        <i class="bi bi-printer"></i> Print
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <section class="section">    
                    <div class="col-lg-12">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    <div class="search-box">
                                        <i class="bi bi-search"></i> 
                                        <input type="text" class="form-control" placeholder="Cari">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (session()->getFlashdata('message')): ?>
                            <div class="alert alert-success" id="success-message">
                                <?= session()->getFlashdata('message') ?>
                            </div>
                        <?php endif; ?>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">              
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Kode Buku</th>
                                    <th>Sampul</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Rak</th>
                                    <th>Jumlah Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($buku as $bk) : ?>
                                    <tr class="text-center">
                                        <td><?= $i++; ?></td>
                                        <td><?= $bk['kode_buku'] ;?></td>
                                        <td><img src="<?= base_url('assets/img/buku/' . $bk['sampul']) ?>" alt="sampulBuku" width="50"></td>
                                        <td><?= $bk['judul_buku'] ;?></td>
                                        <td><?= $bk['pengarang'] ;?></td>
                                        <td><?= $bk['jumlah_buku'] ;?></td>
                                        <td><?= $bk['kategori'] ;?></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="viewModalid" 
                                                data-vkodebuku="<?=$bk['kode_buku'];?>"
                                                data-vsampul="<?= base_url('assets/img/buku/' . $bk['sampul']) ;?>"
                                                data-vjudulbuku="<?=$bk['judul_buku'];?>"
                                                data-vpengarang="<?=$bk['pengarang'];?>"
                                                data-vpenerbit="<?=$bk['penerbit'];?>"
                                                data-vtahunterbit="<?=$bk['tahun_terbit'];?>"
                                                data-vkategori="<?=$bk['kategori'];?>"
                                                data-vnorak="<?=$bk['no_rak'];?>"
                                                data-vjumlahbuku="<?=$bk['jumlah_buku'];?>">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editModal" class="editModalid" 
                                                data-eidbuku="<?=$bk['id_buku']?>"
                                                data-ekodebuku="<?=$bk['kode_buku']?>"
                                                data-esampul="../buku/<?=$bk['sampul']?>"
                                                data-eoldsampul="<?=$bk['sampul']?>"
                                                data-ejudulbuku="<?=$bk['judul_buku']?>"
                                                data-epengarang="<?=$bk['pengarang']?>"
                                                data-epenerbit="<?=$bk['penerbit']?>"
                                                data-etahunterbit="<?=$bk['tahun_terbit']?>"
                                                data-ekategori="<?=$bk['kategori']?>"
                                                data-enorak="<?=$bk['no_rak']?>"
                                                data-ejumlahbuku="<?=$bk['jumlah_buku'];?>">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                                                data-didbuku="<?=$bk['id_buku'] ?>"
                                                data-dkodebuku="<?=$bk['kode_buku']?>"
                                                data-dsampul="../buku/<?=$bk['sampul']?>"
                                                data-doldsampul="<?=$bk['sampul']?>"
                                                data-djudulbuku="<?=$bk['judul_buku']?>"
                                                data-dpengarang="<?=$bk['pengarang']?>"
                                                data-dpenerbit="<?=$bk['penerbit']?>"
                                                data-dtahunterbit="<?=$bk['tahun_terbit']?>"
                                                data-dkategori="<?=$bk['kategori']?>"
                                                data-dnorak="<?=$bk['no_rak']?>"
                                                data-djumlahbuku="<?=$bk['jumlah_buku'];?>">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Tambah Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog d-flex justify-content-center">
            <div class="modal-content w-75">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Buku Layak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <form class="row g-3" method="post" enctype="multipart/form-data" action="addBuku">
                        <div class="col-12">
                            <label for="inputKode" class="form-label">Kode Buku</label>
                            <input type="text" name="a_kodebuku" class="form-control">
                        </div>
                        <div class="col-12">
                            <label>Sampul</label>
                            <input type="file" name="a_sampul" accept=".jpg,.png" onchange="ImgFile(this);" class="form-control-file">
                            <img id="previewImage" src="#" alt="Preview Image" style="display:none; width: 200px; margin-top: 10px;">
                        </div>
                        <div class="col-12">
                            <label for="inputJudul" class="form-label">Judul Buku</label>
                            <input type="text" name="a_judulbuku" class="form-control" >
                        </div>
                        <div class="col-12">
                            <label for="inputPenulis" class="form-label">Pengarang</label>
                            <input type="text" name="a_pengarang" class="form-control" >
                        </div>
                        <div class="col-12">
                            <label for="inputPenerbit" class="form-label">Penerbit</label>
                            <input type="text" name="a_penerbit" class="form-control" >
                        </div>
                        <div class="col-12">
                            <label for="inputTahun" class="form-label">Tahun Terbit</label>
                            <input type="number" name="a_tahunterbit" class="form-control" >
                        </div>
                        <div class="col-12">
                            <label for="inputKategori" class="form-label">Kategori</label>
                            <select name="a_kategori" class="form-control" >
                                <option value="">Pilih Kategori</option>
                                <option value="Fiksi">Fiksi</option>
                                <option value="Non-Fiksi">Non-Fiksi</option>
                                <option value="Referensi">Referensi</option>
                                <!-- Tambahkan opsi kategori lainnya di sini -->
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputRak" class="form-label">No Rak</label>
                            <input type="number" name="a_norak" class="form-control" >
                        </div>
                        <div class="col-12">
                            <label for="inputKondisi" class="form-label">Jumlah Buku</label>
                            <input type="number" name="a_jumlahbuku" class="form-control" >
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


  <!-- View Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-light bg-success">
        <div class="modal-header">
          <h5 class="modal-title">Detail Buku</h5>
          <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> &times; </span>
          </button>
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

                          <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
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

            $('#viewModal').modal('show');
        });
  </script>


  <!-- Edit Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content text-dark bg-warning">
                  <div class="modal-header">
                      <h5 class="modal-title">Ubah Data Buku</h5>
                      <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                  <form method="post" enctype="multipart/form-data" action="editBuku">
                          <div class="form-group" style="text-align:center;">
                              <img id="esampul" src="" style="width: 200px;">
                              <input type="file" name="e_sampul" accept=".jpg,.png" onchange="ImgFile(this);" class="form-control-file">
                              <input type="text" name="e_oldsampul" class="form-control" id="emhsoldphoto" hidden required>
                          </div>

                          <div class="form-group">
                              <label>Kode Buku</label>
                              <input type="text" id="ekodebuku" name="e_kodebuku" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Judul Buku</label>
                              <input type="text" id="ejudulbuku" name="e_judulbuku" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Pengarang</label>
                              <input type="text" id="epengarang" name="e_pengarang" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Penerbit</label>
                              <input type="text" id="epenerbit" name="e_penerbit" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Tahun Terbit</label>
                              <input type="number" id="etahunterbit" name="e_tahunterbit" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Kategori</label>
                              <input type="text" id="ekategori" name="e_kategori" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>No Rak</label>
                              <input type="number" id="enorak" name="e_norak" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Jumlah Buku</label>
                              <input class="form-control" id="ejumlahbuku" name="e_jumlahbuku" type="number" disabled></input>
                          </div>

                          <input type="number" id="eidbuku" name="e_idbuku" hidden>

                          <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Update</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
        $(".editModalid").click(function() {
            var ekodebuku = $(this).data('ekodebuku');
            $("#ekodebuku").val(ekodebuku);

            var esampul = $(this).data('esampul');
            $("#esampul").attr("src", esampul);

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

            $('#editModal').modal('show');
        });
  </script>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content text-dark bg-danger">
                  <div class="modal-header">
                      <h5 class="modal-title">Hapus Data Buku berikut?</h5>
                      <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                  <form method="post" enctype="multipart/form-data" action="deleteBuku">
                          <div class="form-group" style="text-align:center;">
                              <img id="dsampul" src="" style="width: 200px;">
                          </div>

                          <div class="form-group">
                              <label>Kode Buku</label>
                              <input type="text" id="dkodebuku" name="e_kodebuku" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Judul Buku</label>
                              <input type="text" id="djudulbuku" name="e_judulbuku" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Pengarang</label>
                              <input type="text" id="dpengarang" name="e_pengarang" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Penerbit</label>
                              <input type="text" id="dpenerbit" name="e_penerbit" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Tahun Terbit</label>
                              <input type="number" id="dtahunterbit" name="e_tahunterbit" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Kategori</label>
                              <input type="text" id="dkategori" name="e_kategori" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>No Rak</label>
                              <input type="number" id="dnorak" name="e_norak" class="form-control" disabled>
                          </div>

                          <div class="form-group">
                              <label>Jumlah Buku</label>
                              <input class="form-control" id="djumlahbuku" name="e_jumlahbuku" type="number" disabled></input>
                          </div>

                          <input type="text" id="doldsampul" name="d_oldsampul" hidden required>
                          <input type="number" id="didbuku" name="did_buku" hidden required>

                          <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Hapus</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
        $(".deleteModalid").click(function() {
            var dkodebuku = $(this).data('dkodebuku');
            $("#dkodebuku").val(dkodebuku);

            var dsampul = $(this).data('dsampul');
            $("#dsampul").attr("src", dsampul);

            var djudulbuku = $(this).data('djudulbuku');
            $("#djudulbuku").val(djudulbuku);

            var dpengarang = $(this).data('dpengarang');
            $("#dpengarang").val(dpengarang);

            var dpenerbit = $(this).data('dpenerbit');
            $("#dpenerbit").val(dpenerbit);

            var dtahunterbit = $(this).data('dtahunterbit');
            $("#dtahunterbit").val(dtahunterbit);

            var dkategori = $(this).data('dkategori');
            $("#dkategori").val(dkategori);

            var dnorak = $(this).data('dnorak');
            $("#dnorak").val(dnorak);

            var djumlahbuku = $(this).data('djumlahbuku');
            $("#djumlahbuku").val(djumlahbuku);

            $('#deleteModal').modal('show');
        });
  </script>


  <script type="text/javascript">
        var _validFileExtensions = [".jpg", ".jpeg", ".png"];    
        function ImgFile(oInput) {
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;
                        }
                    }
                    if (!blnValid) {
                        alert("Maaf, file " + sFileName + " tidak diperbolehkan! Ekstensi file yang diperbolehkan: " + _validFileExtensions.join(", "));
                        oInput.value = "";
                        return false;
                    }
                }
            }
            return true;
        }
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
    // Mengecek apakah elemen dengan id 'success-message' ada
    const message = document.getElementById('success-message');
    if (message) {
        // Mengatur timer untuk menghilangkan pesan setelah 5 detik
        setTimeout(() => {
            message.style.display = 'none';
        }, 5000);
    }
  </script>

</main><!-- End #main -->
<?=$this->endSection()?>