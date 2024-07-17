<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Peminjaman dan Pengembalian Buku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item">Peminjaman</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a href="<?= base_url('addPinjam') ?>" data-bs-toggle="modal" data-bs-target="#addModal"class="btn btn-primary">
          <i class="bi bi-plus"></i> Tambah Peminjam
        </a>
      </div>
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
                <?php foreach($peminjaman as $pj) : ?>
                <tr class="text-center">
                  <td><?= $i++; ?></td>
                  <td><?= $pj['kode_buku'] ;?></td>
                  <td><?= $pj['pengarang'] ;?></td>
                  <td><?= $pj['judul_buku'] ;?></td>
                  <td><?= $pj['username'] ;?></td>
                  <td><?= $pj['tgl_pinjam'] ;?></td>
                  <td><?= $pj['tgl_kembali'] ;?></td>
                  <td>
                    <a href="#editModal" class="edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i></a>
                    <a href="#" class="delete" title="Hapus" data-toggle="tooltip"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="clearfix">
				      <div class="hint-text">Menampilkan 1 dari 1 entri</div>
				      <?= $pager->links('transaksi', 'Pagination');?>
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
                    <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                <form class="row g-3">
                    <div class="col-12">
                      <label for="inputKode" class="form-label">Kode Buku</label>
                      <input type="text" class="form-control" name="a_kode" required>
                    </div>
                    <div class="col-12">
                      <label for="inputPengarang" class="form-label">pengarang</label>
                      <input type="text" class="form-control" name="a_pengarang">
                    </div>
                    <div class="col-12">
                      <label for="inputJudul" class="form-label">Judul Buku</label>
                      <input type="text" class="form-control" name="a_judulbuku" required>
                    </div>
                    <div class="col-12">
                      <label for="inputNama" class="form-label">Nama Peminjam</label>
                      <input type="text" class="form-control" name="a_nama" required>
                    </div>
                    <div class="col-12">
                      <label for="inputTanggal" class="form-label">Tanggal Pinjam</label>
                      <input type="date" class="form-control" name="a_pinjam" required>
                    </div>
                    <div class="col-12">
                      <label for="inputKondisi" class="form-label">Tanggal Kembali</label>
                      <input type="date " class="form-control" name="a_kembali" required>
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

    <!-- Edit Modal-->
    <div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-dark bg-warning">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Admin</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="/admin/editMhs">
                            <div class="form-group">
                                <label>NIP*</label>
                                <input type="number" id="eadmnip" name="emhs_nim" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Nama*</label>
                                <input type="text" id="eadmnama" name="emhs_nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Jabatan*</label>
                                <input type="text" id="eadmjabatan" name="emhs_nama" class="form-control" required>
                            </div>

                            <br>
                            *Required
                            
                            <input type="number" id="eadmid" name="emhs_id" hidden>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


  </main><!-- End #main -->
<?=$this->endSection()?>