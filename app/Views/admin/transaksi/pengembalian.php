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
              <i class="bi bi-download"></i> Excel</button>
              <button class="btn btn-warning"><i class="bi bi-printer"></i> Print
            </button>
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">              
          </div>
            <table class="table table-bordered">
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
                  <td><?= date('d-M-Y', strtotime($pj['tgl_pinjam'])) ?></td>
                  <td><?= date('d-M-Y', strtotime($pj['tgl_kembali'])) ?></td>
                  <td>
                    <a href="#" class="selesai" title="Selesai" data-bs-toggle="modal" data-bs-target="#doneModal"><i class="bi bi-check-lg"></i></a>
                    <!-- <a href="#editModal" class="edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i></a> -->
                    <a href="#" class="delete" title="Hapus" data-toggle="tooltip"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
				      <?= $pager->links('transaksi', 'Pagination');?>
		      </div>
        </section>
      </div>
    </div>


  </main><!-- End #main -->
<?=$this->endSection()?>