<?=$this->extend('layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Peminjaman dan Pengembalian Buku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=('home');?>>Beranda</a></li>
          <li class="breadcrumb-item">Peminjaman</li>
        </ol>
      </nav>
      
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a href="<?=base_url('edit_jadwal');?>" class="btn btn-primary">
    <i class="bi bi-plus"></i> Tambah Pinjam</a>
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
                <!-- Tambahkan opsi bulan lainnya -->
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
                <!-- Tambahkan opsi tahun lainnya -->
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
                        <th>Kode</th>
                        <th>Penulis<i class="fa fa-sort"></i></th>
                        <th>Judul</th>
                        <th>Nama Peminjam<i class="fa fa-sort"></i></th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>A2</td>
                        <td>Hanry Manampiring</td>
                        <td>Filosofi Teras</td>
                        <td>Raina Rahmawati F</td>
                        <td>6 Juli 2024</td>
                        <td>9 Juli 2024</td>
                        <td>
                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="bi bi-pencil"></i></a>
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

</div>
            </div>
          </div>
        </div>
      </div>

  </main><!-- End #main -->
<?=$this->endSection()?>