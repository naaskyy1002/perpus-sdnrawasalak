<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Daftar Pengunjung</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                <li class="breadcrumb-item">Daftar Pengunjung</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Pengunjung</h5>
                        <form method="post" action="addVisitors">
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="button-kirim">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Kecocokan</h5>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                                <?php foreach ($visitors as $vs): ?>
                                    <tr class="text-center">
                                        <td><?= $i++; ?></td>
                                        <td><?= $vs['nisn'] ?></td>
                                        <td><?= $vs['nama'] ?></td>
                                        <td><?= $vs['kelas'] ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="<?= base_url('addBkr') ?>" data-bs-toggle="modal" data-bs-target="#addModal">
                                            <i class="ri-check-line"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card shadow mb-4"> 
      <!-- <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a class="btn btn-primary" href="<?= base_url('addBkr') ?>" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="bi bi-plus"></i> Tambah Buku</a>
      </div> -->
      <div class="card-body">
        <div class="row mb-3">
          <!-- <div class="col-sm-6 col-md-3">
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
          </div> -->
          <!-- <div class="col-sm-12 col-md-6 text-right d-flex align-items-end">
            <button class="btn btn-info mr-2">
              <i class="bi bi-download"></i> Excel</button>
            <button class="btn btn-warning">
              <i class="bi bi-printer"></i> Print</button>
          </div> -->
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
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
                <?php foreach ($visitors as $vs): ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><?= $vs['nisn'] ?></td>
                        <td><?= $vs['nama'] ?></td>
                        <td><?= $vs['kelas'] ?></td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            
          </div>
        </section>
      </div>
      </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#nisn').on('change', function() {
        var nisn = $(this).val();
        $.ajax({
            url: '<?= base_url('admin/visitor/getSiswaByNISN') ?>/' + nisn,
            type: 'GET',
            success: function(data) {
                if (data) {
                    var siswa = JSON.parse(data);
                    $('input[name="nama"]').val(siswa.nama);
                    $('input[name="kelas"]').val(siswa.kelas);
                } else {
                    $('input[name="nama"]').val('');
                    $('input[name="kelas"]').val('');
                    alert('Data siswa tidak ditemukan.');
                }
            },
            error: function() {
                alert('Error fetching data.');
            }
        });
    });
});
</script>

<?=$this->endSection()?>
