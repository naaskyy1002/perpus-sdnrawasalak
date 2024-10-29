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
          <div class="col-xxl-4 col-md-3 mb-3">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">TOTAL BUKU</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-book-2-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$total_buku;?></h6> 
                    <a href="<?=base_url('admin/buku');?>" class="card-link detail-link">Lihat Detail</a> 
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Total Buku Card -->
          
          <!-- Total Buku Rusak Card -->
          <div class="col-xxl-4 col-md-3 mb-3">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">TOTAL BUKU RUSAK</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-book-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$total_bkr;?></h6>
                    <a href="<?=base_url('admin/bukuRusak');?>" class="card-link detail-link">Lihat Detail</a>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Total Buku Rusak Card -->
          
          <!-- Total Peminjaman Card -->
          <div class="col-xxl-4 col-md-3 mb-3">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">TOTAL PEMINJAMAN</h5> 
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-folder-shared-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$total_pinjam;?></h6>
                    <a href="<?=base_url('admin/peminjaman');?>" class="card-link detail-link">Lihat Detail</a>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Total Peminjaman Card -->

          <!-- Total Pengembalian Card -->
          <div class="col-xxl-4 col-md-3 mb-3">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">TOTAL PENGEMBALIAN</h5> 
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-folder-received-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?=$total_kembali;?></h6>
                    <a href="<?=base_url('admin/pengembalian');?>" class="card-link detail-link">Lihat Detail</a>
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
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">              
                  <thead class="table-light">
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Kode Buku</th>
                      <th>Pengarang</th>
                      <th>Judul Buku</th>
                      <th>Nama Peminjam</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Harus Kembali</th>
                      <th>Status</th>
                    </tr>
                  </thead>          
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($peminjaman as $pj) : ?>
                    <tr>
                        <td class="text-center"><?= $i++ ?></td>
                        <td><?= $pj['kode_buku'] ?></td>
                        <td><?= $pj['pengarang'] ?></td>
                        <td><?= $pj['judul_buku'] ?></td>
                        <td><?= $pj['username'] ?></td>
                        <!-- Tampilkan tanggal peminjaman -->
                        <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam'])) ?></td>
                        <td>
                            <?php
                                if (empty($pj['tgl_kembali'])) {
                                    // Hitung 3 hari setelah tanggal peminjaman
                                    $tgl_pinjam = strtotime($pj['tgl_pinjam']);
                                    $tgl_kembali_auto = strtotime('+3 days', $tgl_pinjam);
                                    // Tampilkan tanggal 3 hari setelah peminjaman
                                    echo date('d-M-Y', $tgl_kembali_auto);
                                } else {
                                    // Jika sudah ada tanggal kembali, tampilkan tanggal kembali yang sebenarnya
                                    echo date('d-M-Y', strtotime($pj['tgl_kembali']));
                                }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                                // Logika penentuan status berdasarkan tanggal kembali
                                $tgl_pinjam = strtotime($pj['tgl_pinjam']);
                                $tgl_batas_kembali = strtotime('+3 days', $tgl_pinjam);
                                $tgl_sekarang = strtotime(date('Y-m-d'));

                                if (!empty($pj['tgl_kembali'])) {
                                    $status = 'Selesai';
                                    $badge_class = 'bg-success';
                                } else {
                                    if ($tgl_sekarang > $tgl_batas_kembali) {
                                        $status = 'Terlambat';
                                        $badge_class = 'bg-danger';
                                    } else {
                                        $status = 'Dipinjam';
                                        $badge_class = 'bg-warning';
                                    }
                                }
                            ?>
                            <span class="badge <?= $badge_class ?>">
                                <?= $status ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
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
