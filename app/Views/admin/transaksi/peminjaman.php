<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Peminjaman</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url('admin');?>">Beranda</a></li>
        <li class="breadcrumb-item">Data Buku</li>
        <li class="breadcrumb-item active">Data Peminjaman</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="row mb-3">
        <div class="ex col-sm-12 col-md-6 text-right d-flex align-items-end">
          <a href="<?= base_url('addTransaksi') ?>" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary">
            <i class="ri-add-line"></i> Tambah</a>
          <a href="/admin/excelPinjam" target="_blank" class="btn btn-info btn-spacing">
            <i class="ri-file-excel-2-line"></i> Excel</a>
          <a href="/admin/printPinjam" target="_blank" class="btn btn-warning btn-spacing">
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
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; ?>
                <?php foreach($peminjaman as $pj) : ?>
                  <tr class="text-center">
                    <td><?= $i++; ?></td>
                    <td><?= $pj['kode_buku']; ?></td>
                    <td><?= $pj['pengarang']; ?></td>
                    <td><?= $pj['judul_buku']; ?></td>
                    <td><?= $pj['username']; ?></td>
                    <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam'])) ?></td>
                    <td>
                      <a href="#" class="doneModalid" title="Selesai" data-bs-toggle="modal" data-bs-target="#doneModal"
                        data-idtransaksi="<?= $pj['id_transaksi']; ?>">
                        <i class="bi bi-check-lg" style="color: green;"></i>
                      </a>
                      <a href="#" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                        data-idtransaksi="<?=$pj['id_transaksi'];?>" data-kodebuku="<?=$pj['kode_buku'];?>">
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
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
      <div class="modal-content w-75">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Tambah Peminjaman Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3">
          <form class="row g-3" method="post" enctype="multipart/form-data" action="addTransaksi">
            <div class="col-12">
              <label for="inputKode" class="form-label">Kode Buku</label>
              <input type="text" class="form-control" name="a_kode" required>
            </div>
            <div class="col-12">
              <label for="inputNama" class="form-label">NISN</label>
              <input type="number" class="form-control" name="a_nisn" required>
            </div>
            <div class="col-12">
              <label for="inputTanggal" class="form-label">Tanggal Pinjam</label>
              <input type="date" class="form-control" name="a_pinjam" required>
              <span class="text-danger">
                *durasi peminjaman maksimal 3 hari
              </span>
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
  <!-- Tambah Modal -->

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
            <input type="hidden" name="id_transaksi" id="id_transaksi">
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
        $("#id_transaksi").val(idtransaksi);
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const doneLinks = document.querySelectorAll('.doneModalid');
        doneLinks.forEach(link => {
            link.addEventListener('click', function() {
                const idTransaksi = this.getAttribute('data-idtransaksi');
                document.getElementById('idtransaksi').value = idTransaksi;
            });
        });
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
            <input type="hidden" id="kode_buku" name="kode_buku">
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

        var kodebuku = $(this).data('kodebuku');
        $("#kode_buku").val(kodebuku);
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

<?=$this->endSection();?>
