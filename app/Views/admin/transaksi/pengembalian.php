<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Pengembalian</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item">Data Data Buku</li>
          <li class="breadcrumb-item">Data Pengembalian</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
      <div class="card-body">
        <div class="row mb-3">
          <div class="pilih col-sm-6 col-md-3">
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
          <div class="pilih col-sm-6 col-md-3">
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
          <div class="ex col-sm-12 col-md-6 text-right d-flex align-items-end justify-content-end">
            <a href="/admin/excelKembali" target="_blank" class="btn btn-info btn-spacing">
              <i class="ri-file-excel-2-line"></i> Excel</a>
            <a href="/admin/printKembali" target="_blank" class="btn btn-warning btn-spacing">
              <i class="ri-printer-line"></i> Print</a>
          </div>
        </div>
        <section class="section">    
          <div class="col-lg-12">
            <div class="row mb-3">                 
              <div class="col-sm-12 col-md-6 ms-auto">
                <form action="" method="post">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                  </div>
                </form>
              </div>
            </div>
          <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Penulis</th>
                  <th>Judul</th>
                  <th>Nama Peminjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach($pengembalian as $kb) : ?>
                <tr class="text-center">
                  <td><?= $i++; ?></td>
                  <td><?= $kb['kode_buku'] ;?></td>
                  <td><?= $kb['pengarang'] ;?></td>
                  <td><?= $kb['judul_buku'] ;?></td>
                  <td><?= $kb['username'] ;?></td>
                  <td><?= date('d-M-Y', strtotime($kb['tgl_pinjam'])) ?></td>
                  <td><?= date('d-M-Y', strtotime($kb['tgl_kembali'])) ?></td>
                  <td>
                    <a href="#" class="doneModalid" title="Selesai" data-bs-toggle="modal" data-bs-target="#doneModal"><i class="bi bi-check-lg"></i></a>
                    <!-- <a href="#editModal" class="edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i></a> -->
                    <a href="#" class="deleteModalid" title="Hapus" data-toggle="tooltip"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            </div>
				      <?= $pager->links('transaksi', 'Pagination');?>
		      </div>
        </section>
      </div>
    </div>

    <!-- Selesai Modal-->
  <div class="modal fade" id="doneModal" tabindex="-1" aria-labelledby="doneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="doneModalLabel">Konfirmasi Pengembalian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="pengembalian" method="post">
          <div class="modal-body">
            Apakah Anda yakin buku ini sudah dikembalikan?
            <input type="hidden" name="idtransaksi" id="idtransaksi">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Konfirmasi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Selesai Modal-->

  <script>
        $(".doneModalid").click(function() {
            var idtransaksi = $(this).data('idtransaksi');
            $("#idtransaksi").val(idtransaksi);
        });
    </script>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Transaksi Ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form method="post" action="deleteTransaksi">
                        <input type="hidden" id="idtransaksi" name="id_transaksi">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".deleteModalid").click(function() {
            var idtransaksi = $(this).data('idtransaksi');
            $("#idtransaksi").val(idtransaksi);
        });
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