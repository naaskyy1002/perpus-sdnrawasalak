<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1><?= $title ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><?= $title ?></li>
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
                    <i class="ri-book-2-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$total_buku;?></h6> 
                    <a href=<?=base_url('admin/buku');?> class="card-link detail-link">Lihat Detail</a> 
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
                    <i class="ri-book-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$total_bkr;?></h6>
                    <a href=<?=base_url('admin/bukuRusak');?> class="card-link detail-link">Lihat Detail</a>
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
                    <i class="ri-folder-shared-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$total_pinjam;?></h6>
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
                    <i class="ri-folder-received-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$total_kembali;?></h6>
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
                  <div class="col-sm-12 col-md-6 ms-auto">
                    <form action="" method="post">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian" name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                      </div>
                    </form>
                  </div>
                </div>    
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">              
                  <thead>
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Kode Buku</th>
                      <th>Penulis</th>
                      <th>Judul Buku</th>
                      <th>Nama Peminjam</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Status</th>
                    </tr>
                  </thead>          
                  <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach($peminjaman as $pj) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $pj['kode_buku'] ?></td>
                      <td><?= $pj['pengarang'] ?></td>
                      <td><?= $pj['judul_buku'] ?></td>
                      <td><?= $pj['username'] ?></td>
                      <!-- strtotime -> untuk mengonversi string tanggal/waktu menjadi timestamp Unix -->
                      <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam'])) ?></td>
                      <td><?= empty($pj['tgl_kembali']) ? '-' : date('d-M-Y', strtotime($pj['tgl_kembali'])) ?></td>
                      <td>
                        <span class="badge <?= empty($pj['tgl_kembali']) ? 'bg-warning' : 'bg-success' ?>">
                          <?= empty($pj['tgl_kembali']) ? 'Dipinjam' : 'Selesai' ?>
                        </span>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?= $pager->links('transaksi', 'Pagination');?>
              </div>
            </div>
          </div><!-- End Peminjaman Buku -->

        </div>
      </div><!-- End Left side columns -->
    </div>
  </section>
</main><!-- End #main -->
<?=$this->endSection()?>