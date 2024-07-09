<?=$this->extend('layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Buku Layak</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=('home');?>>Beranda</a></li>
          <li class="breadcrumb-item">Data Buku Layak</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a class="btn btn-primary" href=#tambahModal data-bs-toggle="modal" data-bs-target="#tambahModal">
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
          <div class="table-responsive">
          <section class="section">    
      <div class="row">
        <div class="col-lg-12">

        <div class="container-xl">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                <div class="col-sm-8"></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="bi bi-search"></i> 
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Sampul <i class="fa fa-sort"></i></th>
                        <th>Kode</th>
                        <th>Penulis <i class="fa fa-sort"></i></th>
                        <th>Judul</th>
                        <th>Tahun Terbit <i class="fa fa-sort"></i></th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Pinjam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>FOTO</td>
                        <td>A2</td>
                        <td>Hanry Manampiring</td>
                        <td>Filosofi Teras</td>
                        <td>2018</td>
                        <td>6</td>
                        <td>Filsafat</td>
                        <td>2</td>
                        <td>
                            <a href="#editModal" class="edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>    
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
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
                <h5 class="modal-title" id="exampleModalLabel2">Tambah Buku Layak</h5>
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
                  <label for="inputFoto" class="form-label">Foto</label>
                  <input type="text" class="form-control" id="inputFoto">
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edit Buku Layak</h5>
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
                  <label for="inputFoto" class="form-label">Foto</label>
                  <input type="text" class="form-control" id="inputFoto">
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
<!-- Edit Modal -->

  </main><!-- End #main -->
<?=$this->endSection()?>