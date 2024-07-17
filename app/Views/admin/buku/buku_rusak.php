<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Buku Rusak</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin');?>">Beranda</a></li>
          <li class="breadcrumb-item">Data Buku Rusak</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a class="btn btn-primary" href="<?= base_url('addBkr') ?>" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="bi bi-plus"></i> Tambah Buku</a>
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
              <i class="ri-file-excel-2-line"></i> Excel</button>
            <button class="btn btn-warning">
              <i class="ri-printer-line"></i> Print</button>
          </div>
        </div>
        <section class="section">    
          <div class="col-lg-12"> 
            <div class="row mb-3">
              <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="dataTable_length">
                  <label> 
                    <select name ="dataTable_length" aria-controls="dataTable" class="custom-select-sm from-control from-control-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                    entri
                  </label>
                </div>
              </div>                 
              <div class="col-sm-12 col-md-6 text-right">
                <form action="" method="post">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                  </div>
                </form>
              </div>
            </div>
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">              
              <thead>
                <tr class="text-center">
                  <th>No.</th>
                  <th>Kode Buku</th>
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th>Tanggal Pendataan</th>
                  <th>Keterangan</th>
                  <th>Foto Bukti</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach($bkrusak as $bkr) : ?>
                <tr class="text-center">
                  <td><?= $i++; ?></td>
                  <td><?= $bkr['kode_buku'] ;?></td>
                  <td><?= $bkr['judul_buku'] ;?></td>
                  <td><?= $bkr['pengarang'] ;?></td>
                  <td><?= $bkr['tanggal_pendataan'] ;?></td>
                  <td><?= $bkr['keterangan'] ;?></td>
                  <td><img src="<?= base_url('assets/img/bukti/' . $bkr['foto_bukti']) ?>" alt="fotoBukti" width="50"></td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="viewModalid" 
                      data-vbkrkode="<?=$bkr['kode_buku'];?>"
                      data-vbkrjudul="<?=$bkr['judul_buku'] ?>"
                      data-vbkrpengarang="<?=$bkr['pengarang'];?>"
                      data-vbkrtgl="<?=$bkr['tanggal_pendataan'];?>"
                      data-vbkrkategori="<?=$bkr['kategori'];?>"
                      data-vbkrhal="<?=$bkr['halaman'];?>"
                      data-vbkrbukti="<?= base_url('assets/img/bukti/' . $bkr['foto_bukti']) ;?>"
                      data-vbkrket="<?=$bkr['keterangan'];?>">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="#editModal" data-bs-toggle="modal" data-bs-target="#editModal" class="editModalid"  title="Edit"
                      data-ebkrid="<?=$bkr['id_buku'];?>"
                      data-ebkrkode="<?=$bkr['kode_buku'];?>"
                      data-ebkrjudul="<?=$bkr['judul_buku'];?>"
                      data-ebkrpengarang="<?=$bkr['pengarang'];?>"
                      data-ebkrtgl="<?=$bkr['tanggal_pendataan'];?>"
                      data-ebkrket="<?=$bkr['keterangan'];?>"
                      data-ebkrbukti="<?= base_url('assets/img/bukti/' . $bkr['foto_bukti']) ;?>"
                      data-ebkroldbukti="<?=$bkr['foto_bukti']?>">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                      data-idbuku="<?=$bkr['id_buku'];?>">
                      <i class="bi bi-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="clearfix">
              <div class="hint-text">Menampilkan 1 dari 1 entri</div>
              <?= $pager->links('buku_rusak', 'Pagination');?>
            </div>
          </div>
        </section>
      </div>
      </div>

    <!-- Tambah Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel2" role="dialog" aria-hidden="true">
      <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
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
                  <option value="Sejarah">Sejarah</option>
                  <option value="Fiksi">Fiksi</option>
                  <option value="Non-Fiksi">Non-Fiksi</option>
                  <option value="Referensi">Referensi</option>
                </select>
              </div>
              <div class="col-12">
                <label for="inputTanggal" class="form-label">Tanggal Pendataan</label>
                <input type="date" name="abkr_tgldata" class="form-control" required>
              </div>
              <div class="col-12">
                <label for="inputHalaman" class="form-label">Halaman</label>
                <input type="text" name="abkr_hal" class="form-control" required>
              </div>
              <div class="col-12">
                <label for="inputKeterangan" class="form-label">Keterangan</label>
                <input type="text" name="abkr_ket" class="form-control" required>
              </div>
              <div class="col-12">
                <label>Foto Bukti</label>
                <input type="file" name="abkr_bukti" accept=".jpg,.png" onchange="ImgFile(this);" class="form-control-file">
                <img id="previewImage" src="#" alt="Preview Image" style="display:none; width: 200px; margin-top: 10px;">
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

    <!-- View Modal-->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel2" role="dialog" aria-hidden="true">
      <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content text-light bg-success">
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
              <div class="col-12">
                <label>Tanggal Pendataan</label>
                <input type="date" id="vbkrtgl" name="vbkr_tgl" class="form-control" disabled>
              </div>
              <div class="col-12">
                <label>Keterangan</label>
                <input type="text" id="vbkrket" name="vbkr_ket" class="form-control" disabled>
              </div>
              <div class="col-12">
                <img id="vbkrbukti" src="" style="width: 150px;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

        var vbkrtgl = $(this).data('vbkrtgl');
        $("#vbkrtgl").val(vbkrtgl);

        var vbkrkategori = $(this).data('vbkrkategori');
        $("#vbkrkategori").val(vbkrkategori);

        var vbkrhal = $(this).data('vbkrhal');
        $("#vbkrhal").attr("src", vbkrhal);
        
        var vbkrbukti = $(this).data('vbkrbukti');
        $("#vbkrbukti").attr("src", vbkrbukti);

        var vbkrket = $(this).data('vbkrket');
        $("#vbkrket").val(vbkrket);

        $('#viewModal').modal('show');
      });
    </script>

    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel2" role="dialog" aria-hidden="true">
      <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content text-dark bg-warning">
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form method="post" action="<?= base_url('admin/deleteBkr') ?>">
                        <input type="hidden" id="idbuku" name="id_buku">
                        <button type="submit" class="btn btn-danger">Hapus</button>
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

