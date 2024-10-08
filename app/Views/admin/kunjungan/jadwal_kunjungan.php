<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1><?= $title ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><?= $title ?></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <?php foreach($jadwal as $jk) : ?>
  <div class="card shadow mb-4"> 
    <div class="card-body">
    <a class="btn-jk btn editModalid" href="#" data-bs-toggle="modal" data-bs-target="#editModal"
        data-eidjk="<?= $jk['id_jk']; ?>"
        data-senin="<?= $jk['senin']; ?>"
        data-selasa="<?= $jk['selasa']; ?>"
        data-rabu="<?= $jk['rabu']; ?>"
        data-kamis="<?= $jk['kamis']; ?>"
        data-jumat="<?= $jk['jumat']; ?>"
        data-sabtu="<?= $jk['sabtu']; ?>">
        <i class="bi bi-pencil"></i> Edit
      </a>
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
      <table class="jk table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th>Senin</th>
            <th>Selasa</th>
            <th>Rabu</th>
            <th>Kamis</th>
            <th>Jumat</th>
            <th>Sabtu</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>Kelas <?= $jk['senin']; ?></td>
            <td>Kelas <?= $jk['selasa']; ?></td>
            <td>Kelas <?= $jk['rabu']; ?></td>
            <td>Kelas <?= $jk['kamis']; ?></td>
            <td>Kelas <?= $jk['jumat']; ?></td>
            <td>Kelas <?= $jk['sabtu']; ?></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
      <div class="modal-content text-dark bg-edit">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Edit Jadwal Kunjungan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form method="post" enctype="multipart/form-data" action="editJadwal">
            <input type="hidden" id="e_idjk" name="e_idjk">

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="senin" name="e_senin" placeholder="Senin"/>
              <label for="senin">Senin</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="selasa" name="e_selasa" placeholder="Selasa"/>
              <label for="selasa">Selasa</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="rabu" name="e_rabu" placeholder="Rabu"/>
              <label for="rabu">Rabu</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="kamis" name="e_kamis" placeholder="Kamis"/>
              <label for="kamis">Kamis</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="jumat" name="e_jumat" placeholder="Jumat"/>
              <label for="jumat">Jumat</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="sabtu" name="e_sabtu" placeholder="Sabtu"/>
              <label for="sabtu">Sabtu</label>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-sukses">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <script type="text/javascript">
    $(".editModalid").click(function() {
      var eidjk = $(this).data('eidjk');
      $("#e_idjk").val(eidjk);

      $("#senin").val($(this).data('senin'));
      $("#selasa").val($(this).data('selasa'));
      $("#rabu").val($(this).data('rabu'));
      $("#kamis").val($(this).data('kamis'));
      $("#jumat").val($(this).data('jumat'));
      $("#sabtu").val($(this).data('sabtu'));
    });
  </script>

  <script>
    //fungsi agar alert hilang setelah 5 detik
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

<!-- memastikan Bootstrap JavaScript dimuat -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
