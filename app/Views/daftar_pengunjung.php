<?=$this->extend('layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Pengunjung</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=('home');?>>Beranda</a></li>
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
                <div class="table-responsive">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label> Show
                                    <select name ="dataTable_length" aria-controls="dataTable" class="custom-select-sm from-control from-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    entries
                                </label>
                            </div>
                        </div>                 
                    <div class="col-sm-6 mol-md-6 text-right">
                    <div class="search-bar">
                        <form class="search-form d-flex align-items-center" method="POST" action="#">
                            <input type="text" name="query" placeholder="Search" title="Enter search keyword" class="form-control">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div> 
            </div>
            <div class="table-responsive">
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
              </div><!-- End Table with stripped rows -->
            </div>
            </div>
          </div>
        </div>
</section>
</main><!-- End #main -->

<?=$this->endSection()?>