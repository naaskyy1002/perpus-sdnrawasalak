<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Beranda</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Beranda</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Total Buku Card -->
        <div class="col-xxl-4 col-md-3">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Total Buku</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-book"></i>
                </div>
                <div class="ps-3">
                  <h6>950 Buku</h6> 
                  <a href=<?=base_url('admin/buku_layak');?> class="card-link detail-link">Lihat Detail</a> 
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Buku Card -->

        <!-- Total Buku Rusak Card -->
        <div class="col-xxl-4 col-md-3">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Total Buku Rusak</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-book"></i>
                </div>
                <div class="ps-3">
                  <h6>5 Buku</h6>
                  <a href=<?=base_url('admin/buku_rusak');?> class="card-link detail-link">Lihat Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Buku Rusak Card -->

        <!-- Total Peminjaman Card -->
        <div class="col-xxl-4 col-md-3">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Total Peminjaman</h5> 
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>3 Buku</h6>
                  <a href=<?=base_url('admin/peminjaman');?> class="card-link detail-link">Lihat Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Peminjaman Card -->

        <!-- Total Pengembalian Card -->
        <div class="col-xxl-4 col-md-3">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Total Pengembalian</h5> 
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>1 Buku</h6>
                  <a href=<?=base_url('admin/pengembalian');?> class="card-link detail-link">Lihat Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Pengembalian Card -->

        <!-- Peminjaman Buku -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Peminjaman Buku</h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Peminjam</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><a>1</a></th>
                    <th scope="row"><a href="#">A2</a></th>
                    <td>Henry Manampiring</td>
                    <td><a href="#" class="text-primary">Filosofi Teras</a></td>
                    <td>Raina Rahmawati</td>
                    <td><span class="badge bg-warning">Dipinjam</span></td>
                  </tr>
                  <tr>
                    <th scope="row"><a>2</a></th>
                    <th scope="row"><a href="#">A7</a></th>
                    <td>James Clear</td>
                    <td><a href="#" class="text-primary">Atomic Habits</a></td>
                    <td>Siti Nurazizah</td>
                    <td><span class="badge bg-success">Dikembalikan</span></td>
                  </tr>
                  <tr>
                    <th scope="row"><a>3</a></th>
                    <th scope="row"><a href="#">E8</a></th>
                    <td>Francine Jay</td>
                    <td><a href="#" class="text-primary">Seni Hidup Minimalis</a></td>
                    <td>Sarah Syakira</td>
                    <td><span class="badge bg-danger">Terlambat</span></td>
                  </tr> 
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- End Peminjaman Buku -->

      </div>
    </div><!-- End Left side columns -->
  </div>
</section>
</main><!-- End #main -->
<?=$this->endSection()?>