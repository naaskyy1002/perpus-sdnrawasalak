<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Pengunjung</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item">Daftar Pengunjung</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
            
              <h5 class="card-title">Tambah Pengunjung</h5>
              <div class="col-sm-6 mol-md-6 text-right">
                <input type="date" class="form-control">
              </div>
                <!-- General Form Elements -->
                <form>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="button-kirim">Kirim</button>
                    </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pengunjung</h5>
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
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td>1</td>
                    <td>1233455678</td>
                    <td>Siti Nurazizah</td>
                    <td>Kelas 4</td>
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
              </div><!-- End Table with stripped rows -->
            </div>
            </div>
          </div>
        </div>
</section>
</main><!-- End #main -->

<?=$this->endSection()?>