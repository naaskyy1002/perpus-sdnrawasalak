<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Jadwal Kunjungan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item">Jadwal Kunjungan</li>
        </ol>
      </nav>
      
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <a class="btn btn-primary ms-auto" href="#editModal" data-bs-toggle="modal" data-bs-target="#editModal"> <!--data-target harus sama sama id modal, bedanya tambah #-->
    <i class="bi bi-pencil"></i>   Edit</a>
    </div>
    <div class="card-body">
        <!-- <div class="table-responsive"> -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">              
            </div>
              <table class="table table-bordered">
                <thead>
                  <tr class="text-center">
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                    <th>Sabtu</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td>Kelas 1</td>
                    <td>Kelas 2</td>
                    <td>Kelas 3</td>
                    <td>Kelas 4</td>
                    <td>Kelas 5</td>
                    <td>Kelas 6</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center"> <!-- mau besar tambahin modal-xl -->
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edit Jadwal Kunjungan</h5>
                <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="monday" placeholder="Senin"/>
                        <label for="monday">Senin</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="tuesday" placeholder="Selasa"/>
                        <label for="tuesday">Selasa</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="wednesday" placeholder="Rabu"/>
                        <label for="wednesday">Rabu</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="thursday" placeholder="Kamis"/>
                        <label for="thursday">Kamis</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="friday" placeholder="Jumat"/>
                        <label for="friday">Jumat</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="saturday" placeholder="Sabtu"/>
                        <label for="saturday">Sabtu</label>
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
<!-- Modal -->

  </main><!-- End #main -->
<?=$this->endSection()?>

<!-- Tambahkan ini di bagian bawah halaman untuk memastikan Bootstrap JavaScript dimuat -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>