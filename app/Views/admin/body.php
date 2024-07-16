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
              <h5 class="card-title">TOTAL BUKU</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-book"></i>
                </div>
                <div class="ps-3">
                  <h6><?=$total_buku;?></h6> 
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
              <h5 class="card-title">TOTAL BUKU RUSAK</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-book"></i>
                </div>
                <div class="ps-3">
                  <h6><?=$total_bkr;?></h6>
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
              <h5 class="card-title">TOTAL PEMINJAMAN</h5> 
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>3</h6>
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
              <h5 class="card-title">TOTAL PENGEMBALIAN</h5> 
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>1</h6>
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
              <h2 class="card-title">Transaksi Buku</h2>
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
                    <div class="col-sm-6 mol-md-6 text-right">
                    <div class="col-sm-12">
                        <div class="search-box">
                            <i class="bi bi-search"></i> 
                            <input type="text" class="form-control" placeholder="Cari">
                        </div>
                    </div>
                </div> 
            </div>    
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">              
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Kode Buku</th>
                                    <th>Penulis</th>
                                    <th>Judul Buku</th>
                                    <th>Peminjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>          
                <tbody>
                  <tr>
                    <td><a>1</a></th>
                    <td><a href="#">A2</a></th>
                    <td>Henry Manampiring</td>
                    <td><a href="#" class="text-primary">Filosofi Teras</a></td>
                    <td>Raina Rahmawati</td>
                    <td><span class="badge bg-warning">Dipinjam</span></td>
                  </tr>
                  <tr>
                    <td><a>2</a></td>
                    <td><a href="#">A7</a></td>
                    <td>James Clear</td>
                    <td><a href="#" class="text-primary">Atomic Habits</a></td>
                    <td>Siti Nurazizah</td>
                    <td><span class="badge bg-success">Dikembalikan</span></td>
                  </tr>
                  <tr>
                    <td><a>3</a></td>
                    <td><a href="#">E8</a></td>
                    <td>Francine Jay</td>
                    <td><a href="#" class="text-primary">Seni Hidup Minimalis</a></td>
                    <td>Sarah Syakira</td>
                    <td><span class="badge bg-danger">Terlambat</span></td>
                  </tr> 
                </tbody>
              </table>
              <div class="clearfix">
				<div class="hint-text">Menampilkan 1 dari 1 entri</div>
				<ul class="pagination">
        <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
				</ul>
			</div>
		</div>
            </div>
          </div>
        </div><!-- End Peminjaman Buku -->

      </div>
    </div><!-- End Left side columns -->
  </div>
</section>
</main><!-- End #main -->
<?=$this->endSection()?>