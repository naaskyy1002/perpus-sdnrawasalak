<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('home');?>>Beranda</a></li>
          <li class="breadcrumb-item">Data Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a href="<?=base_url('tambah_admin');?>" class="btn btn-primary">
    <i class="bi bi-plus"></i> Tambah Admin</a>
    </div>
    <div class="table-responsive">
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
                        <th>NIP <i class="fa fa-sort"></i></th>
                        <th>Nama</th>
                        <th>Jabatan <i class="fa fa-sort"></i></th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>12345</td>
                        <td>Eni Sukma</td>
                        <td>Petugas Perpustakaan</td>
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
    </section>

  </main><!-- End #main -->
<?=$this->endSection()?>