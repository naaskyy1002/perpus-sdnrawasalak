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
            <a class="btn btn-tambah" href="<?= base_url('addBkr') ?>" data-bs-toggle="modal" data-bs-target="#addModal">
              <i class="ri-add-line"></i> Tambah</a>
            <a href="/admin/excelBkr" target="_blank" class="btn btn-infos btn-spacing">
              <i class="ri-file-excel-2-line"></i> Excel</a>
            <a href="/admin/printBkr" target="_blank" class="btn btn-jk btn-spacing">
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
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th>Kategori</th>
                  <th>Tanggal Pendataan</th>
                  <th>Keterangan</th>
                  <th>Foto Bukti</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; ?>
                <?php foreach($bkrusak as $bkr) : ?>
                <tr class="text-center">
                  <td><?= $i++; ?></td>
                  <td><?= $bkr['kode_buku'] ;?></td>
                  <td><?= $bkr['judul_buku'] ;?></td>
                  <td><?= $bkr['pengarang'] ;?></td>
                  <td><?= $bkr['kategori'] ;?></td>
                  <td><?= date('d-M-Y', strtotime($bkr['tanggal_pendataan'])) ?></td>
                  <td><?= $bkr['keterangan'] ;?></td>
                  <td><img src="<?= base_url('assets/img/bukti/' . $bkr['foto_bukti']) ?>" alt="fotoBukti" width="50"></td>
                  <td>
                    <a href="#" title="Detail" data-bs-toggle="modal" data-bs-target="#viewModal" class="viewModalid" 
                      data-vbkrkode="<?=$bkr['kode_buku'];?>"
                      data-vbkrjudul="<?=$bkr['judul_buku'] ?>"
                      data-vbkrpengarang="<?=$bkr['pengarang'];?>"
                      data-vbkrkategori="<?= $bkr['kategori'] ;?>"
                      data-vbkrtgl="<?=$bkr['tanggal_pendataan'];?>"
                      data-vbkrbukti="<?= base_url('assets/img/bukti/' . $bkr['foto_bukti']) ;?>"
                      data-vbkrket="<?=$bkr['keterangan'];?>">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="#editModal" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal" class="editModalid"
                      data-ebkrid="<?=$bkr['id_buku'];?>"
                      data-ebkrkode="<?=$bkr['kode_buku'];?>"
                      data-ebkrjudul="<?=$bkr['judul_buku'];?>"
                      data-ebkrpengarang="<?=$bkr['pengarang'];?>"
                      data-ebkrkategori="<?=$bkr['kategori'] ;?>"
                      data-ebkrtgl="<?=$bkr['tanggal_pendataan'];?>"
                      data-ebkrket="<?=$bkr['keterangan'];?>"
                      data-ebkrbukti="<?= base_url('assets/img/bukti/' . $bkr['foto_bukti']) ;?>"
                      data-ebkroldbukti="<?=$bkr['foto_bukti']?>">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <a href="#" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                      data-idbuku="<?=$bkr['id_buku'];?>">
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

    <!-- Tambah Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel2" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg d-flex justify-content-center">
        <div class="modal-content text-dark bg-tambah">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Tambah Buku Rusak</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-3">
            <form class="row g-3" method="post" enctype="multipart/form-data" action="addBkr">
              <div class="col-12">
                <label for="inputKode" class="form-label">Kode Buku</label>
                <input type="text" name="abkr_kode" class="form-control" required>
              </div>
              <div class="col-12">
                <label for="inputJudul" class="form-label">Judul Buku</label>
                <input type="text" name="abkr_judul" class="form-control" required>
              </div>
              <div class="col-12">
                <label for="inputPenulis" class="form-label">Pengarang</label>
                <input type="text" name="abkr_pengarang" class="form-control" required>
              </div>
              <div class="col-12">
                <label for="inputKategori" class="form-label">Kategori</label>
                <select name="abkr_kategori" class="form-select" required>
                  <option value="" disabled selected>Pilih kategori Buku</option>
                  <option value="Tematik">Tematik</option>
                  <option value="Sejarah">Sejarah</option>
                  <option value="Fiksi">Fiksi</option>
                  <option value="Non-Fiksi">Non-Fiksi</option>
                  <option value="Referensi">Referensi</option>
                  <option value="Komik">Komik</option>
                  <option value="Kurikulum Merdeka">Kurikulum Merdeka</option>
                </select>
              </div>
              <div class="col-12">
                <label for="inputTanggal" class="form-label">Tanggal Pendataan</label>
                <input type="date" name="abkr_tgldata" class="form-control" required>
              </div>
              <div class="col-12">
                <label for="inputKeterangan" class="form-label">Keterangan</label>
                <input type="text" name="abkr_ket" class="form-control" required>
              </div>
              <div class="col-12">
                <label>Foto Bukti (.jpg / .png / .jpeg)</label>
                <input type="file" name="abkr_bukti" accept=".jpg,.png" onchange="ImgFile(this);" class="form-control-file">
                <img id="previewImage" src="#" alt="Preview Image" style="display:none; width: 200px; margin-top: 10px;">
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

    <!-- View Modal-->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel2" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg d-flex justify-content-center">
        <div class="modal-content text-light bg-sukses">
          <div class="modal-header">
            <h5 class="modal-title">Detail Buku Rusak</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" method="#" enctype="multipart/form-data" action="#">
              <div class="col-12">
                <label>Kode Buku</label>
                <input type="text" id="vbkrkode" name="vbkr_kode" class="form-control" disabled>
              </div>
              <div class="col-12">
                <label>Judul</label>
                <input type="text" id="vbkrjudul" name="vbkr_judul" class="form-control" disabled>
              </div>
              <div class="col-12">
                <label>Pengarang</label>
                <input type="text" id="vbkrpengarang" name="vbkr_pengarang" class="form-control" disabled>
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <input type="text" id="vbkrkategori" name="vbkr_kategori" class="form-control" disabled>
              </div>
              <div class="col-12">
                <label>Tanggal Pendataan</label>
                <input type="date" id="vbkrtgl" name="vbkr_tgl" class="form-control" disabled>
              </div>
              <div class="col-12">
                <label>Keterangan</label>
                <input type="text" id="vbkrket" name="vbkr_ket" class="form-control" disabled>
              </div>
              <div class="col-12">
                <div>
                <label>Foto Bukti Kerusakan</label>
                </div>
                <img id="vbkrbukti" src="" style="width: 150px;">
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
        var vbkrid = $(this).data('vbkrid');
        $("#vbkrid").val(vbkrid);

        var vbkrkode = $(this).data('vbkrkode');
        $("#vbkrkode").val(vbkrkode);

        var vbkrjudul = $(this).data('vbkrjudul');
        $("#vbkrjudul").val(vbkrjudul);

        var vbkrpengarang = $(this).data('vbkrpengarang');
        $("#vbkrpengarang").val(vbkrpengarang);

        var vbkrkategori = $(this).data('vbkrkategori');
        $("#vbkrkategori").val(vbkrkategori);

        var vbkrtgl = $(this).data('vbkrtgl');
        $("#vbkrtgl").val(vbkrtgl);
        
        var vbkrbukti = $(this).data('vbkrbukti');
        $("#vbkrbukti").attr("src", vbkrbukti);

        var vbkrket = $(this).data('vbkrket');
        $("#vbkrket").val(vbkrket);

        $('#viewModal').modal('show');
      });
    </script>

    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel2" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg d-flex justify-content-center">
        <div class="modal-content text-dark bg-edit">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data Buku Rusak</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-3">
            <form class="row g-3" method="post" enctype="multipart/form-data" action="editBkr">
              <div class="col-12">
                <label>Kode Buku</label>
                <input type="text" id="ebkrkode" name="ebkr_kode" class="form-control" required>
              </div>
              <div class="col-12">
                <label>Judul</label>
                <input type="text" id="ebkrjudul" name="ebkr_judul" class="form-control" required>
              </div>
              <div class="col-12">
                <label>Pengarang</label>
                <input type="text" id="ebkrpengarang" name="ebkr_pengarang" class="form-control" required>
              </div>
              <div class="col-12">
                <label>Kategori</label>
                <select name="ebkr_kategori" class="form-select" id="ebkrkategori" required>
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
                <label>Tanggal Pendataan</label>
                <input type="date" id="ebkrtgl" name="ebkr_tgl" class="form-control" required>
              </div>
              <div class="col-12">
                <label>Keterangan</label>
                <input type="text" id="ebkrket" name="ebkr_ket" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Foto Bukti (.jpg / .png / .jpeg) <br><i>abaikan jika tidak ingin mengubah</i></label>
                <div class="form-group">
                  <img id="ebkrbukti" src="" style="width: 200px;">
                </div>
                <input type="file" name="ebkr_bukti" accept=".jpg,.png,.jpeg" onchange="ImgFile(this);" class="form-control-file">
                <input type="text" name="ebkr_oldbukti" class="form-control" id="ebkroldbukti" hidden required>
              </div>

              <input type="number" id="ebkrid" name="ebkr_id" hidden>

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
        var ebkrid = $(this).data('ebkrid');
        $("#ebkrid").val(ebkrid);

        var ebkrkode = $(this).data('ebkrkode');
        $("#ebkrkode").val(ebkrkode);

        var ebkrjudul = $(this).data('ebkrjudul');
        $("#ebkrjudul").val(ebkrjudul);

        var ebkrpengarang = $(this).data('ebkrpengarang');
        $("#ebkrpengarang").val(ebkrpengarang);

        var ebkrkategori = $(this).data('ebkrkategori');
        $("#ebkrkategori").val(ebkrkategori);

        var ebkrtgl = $(this).data('ebkrtgl');
        $("#ebkrtgl").val(ebkrtgl);

        var ebkrket = $(this).data('ebkrket');
        $("#ebkrket").val(ebkrket);

        var ebkrbukti = $(this).data('ebkrbukti');
        $("#ebkrbukti").attr("src", ebkrbukti);
              
        var ebkroldbukti = $(this).data('ebkroldbukti');
        $("#ebkroldbukti").val(ebkroldbukti);

        $('#editModal').modal('show');
      });
    </script>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Buku Rusak Ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Tutup</button>
                    <form method="post" action="<?= base_url('admin/deleteBkr') ?>">
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

