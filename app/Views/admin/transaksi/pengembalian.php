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
          <div class="ex col-sm-12 col-md-6 text-right d-flex align-items-end">
            <a href="/admin/excelKembali" target="_blank" class="btn btn-info btn-spacing">
              <i class="ri-file-excel-2-line"></i> Excel</a>
            <a href="/admin/printKembali" target="_blank" class="btn btn-warning btn-spacing">
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
                  <th>Kode</th>
                  <th>Pengarang</th>
                  <th>Judul</th>
                  <th>Nama Peminjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
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
                    <a href="#" class="deleteModalid" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal"
                      data-idtransaksi="<?=$kb['id_transaksi'];?>">
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

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Transaksi Ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form method="post" action="deleteTransaksiKB">
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