<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item">Data Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a href="#tambahSiswa" data-bs-toggle="modal" data-bs-target="#tambahSiswa"class="btn btn-primary">
    <i class="bi bi-plus"></i> Tambah Siswa</a>
    </div>

    <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="card-body">
                <div class="table-title">
                <div class="row">
                <div class="col-sm-8"></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="bi bi-search"></i> 
                            <input type="text" class="form-control" placeholder="Cari">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card-body"> -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">              
            </div>
              <table class="table table-bordered">
                <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td>1</td>
                    <td>123456</td>
                    <td>Ratna Sari</td>
                    <td>5</td>
                    <td>
                    <a href="#editModal" class="edit" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i></a>
                    <a href="#" class="delete" title="Hapus" data-toggle="tooltip"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center"> <!-- mau besar tambahin modal-xl -->
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Siswa</h5>
                <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="NIS" placeholder="Senin"/>
                        <label for="NIS">NIS</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="Nama" placeholder="Selasa"/>
                        <label for="Nama">Nama</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="Kelas" placeholder="Rabu"/>
                        <label for="Kelas">Kelas</label>
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
<div class="modal fade" id="editSiswa" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark bg-warning">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="/admin/editMhs">
                        <div class="form-group">
                            <label>NIS*</label>
                            <input type="number" id="eadmnip" name="emhs_nim" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Nama*</label>
                            <input type="text" id="eadmnama" name="emhs_nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Kelas*</label>
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
    
    
  </main><!-- End #main -->
<?=$this->endSection()?>