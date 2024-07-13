<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Buku Rusak</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin');?>">Beranda</a></li>
          <li class="breadcrumb-item">Data Buku Rusak</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a class="btn btn-primary" href="#tambahModal" data-bs-toggle="modal" data-bs-target="#tambahModal">
    <i class="bi bi-plus"></i> Tambah Buku</a>
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
              <button class="btn btn-warning">
                <i class="bi bi-printer"></i> Print</button>
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
                      <th>Kode</th>
                      <th>Sampul</th>
                      <th>Judul</th>
                      <th>Pengarang</th>
                      <th>Tanggal Pendataan</th>
                      <th>Keterangan</th>
                      <th>Foto Kerusakan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($bkrusak as $bkr) : ?>
                    <tr class="text-center">
                      <td><?= $i++; ?></td>
                      <td><?= $bkr['kode_buku'] ;?></td>
                      <td><img src="<?= base_url('assets/img/' . $bkr['sampul']) ?>" alt="sampulBuku" width="50"></td>
                      <td><?= $bkr['judul_buku'] ;?></td>
                      <td><?= $bkr['pengarang'] ;?></td>
                      <td><?= $bkr['tanggal_pendataan'] ;?></td>
                      <td><?= $bkr['keterangan'] ;?></td>
                      <td><img src="<?= base_url('assets/img/' . $bkr['foto_bukti']) ?>" alt="sampulBuku" width="50"></td>
                      <td>
                        <a href="#editModal" class="edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i></a>
                        <a href="#" class="delete" title="Hapus" data-bs-toggle="tooltip"><i class="bi bi-trash"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
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
        </div>
      </section>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Tambah Buku Rusak</h5>
                <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
            <form class="row g-3">
                <div class="col-12">
                  <label for="inputKode" class="form-label">Kode Buku</label>
                  <input type="text" class="form-control" id="inputKode">
                </div>
                <div class="col-12">
                  <label for="inputPenulis" class="form-label">Penulis</label>
                  <input type="text" class="form-control" id="inputPenulis">
                </div>
                <div class="col-12">
                  <label for="inputJudul" class="form-label">Judul Buku</label>
                  <input type="text" class="form-control" id="inputJudul">
                </div>
                <div class="col-12">
                  <label for="inputTahun" class="form-label">Tahun Terbit</label>
                  <input type="text" class="form-control" id="inputTahun">
                </div>
                <div class="col-12">
                  <label for="inputTanggal" class="form-label">Tanggal Pendataan</label>
                  <input type="text" class="form-control" id="inputTanggal">
                </div>
                <div class="col-12">
                  <label for="inputKondisi" class="form-label">Kondisi Buku</label>
                  <input type="text" class="form-control" id="inputKondisi">
                </div>
                <div class="col-12">
                  <label>Foto Kerusakan</label>
                  <input type="file" name="amhs_photo" accept=".jpg,.png" onchange="ImgFile(this);" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                  <button type="button" class="btn btn-primary">Simpan</button>
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
                            <input type="text" id="eadmjabatan" name="emhs_jabatan" class="form-control" required>
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

  </main><!-- End #main -->
<?=$this->endSection()?>

