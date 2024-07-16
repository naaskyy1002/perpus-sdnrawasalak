<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item">Data Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a href="<?= base_url('addAdmin') ?>" data-bs-toggle="modal" data-bs-target="#addModal"class="btn btn-primary">
          <i class="bi bi-plus"></i> Tambah Admin
        </a>
      </div>
      <div class="col-lg-12">
        <div class="table-responsive">
          <div class="card-body">
            <div class="table-title">
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
            </div>
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success" id="success-message">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger" id="error-message">
                    <?= session()->getFlashdata('errors') ?>
                </div>
            <?php endif; ?>
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>No.</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($admin as $adm) : ?>
                <tr class="text-center">
                  <td><?= $i++; ?></td>
                  <td><?= $adm['nip'] ;?></td>
                  <td><?= $adm['nama_lengkap'] ;?></td>
                  <td><?= $adm['jabatan'] ;?></td>
                  <td>
                    <a href="#" class="viewModalid"  title="View" data-bs-toggle="modal" data-bs-target="#viewModal"
                      data-vfoto="<?= base_url('assets/img/admin/' . $adm['foto']);?>"
                      data-vnip="<?=$adm['nip'];?>"
                      data-vnamalengkap="<?=$adm['nama_lengkap'];?>"
                      data-vjabatan="<?=$adm['jabatan'];?>"
                      data-vusername="<?=$adm['username'];?>"
                      data-vpassword="<?=$adm['password'];?>">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="#" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal" class="editModalid"
                      data-eidadmin="<?=$adm['nip']?>"
                      data-efoto="<?= base_url('assets/img/admin/' . $adm['foto']);?>"
                      data-enip="<?=$adm['nip'];?>"
                      data-enamalengkap="<?=$adm['nama_lengkap'];?>"
                      data-ejabatan="<?=$adm['jabatan'];?>"
                      data-eusername="<?=$adm['username'];?>"
                      data-epassword="<?=$adm['password'];?>">
                    <i class="bi bi-pencil"></i></a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                        data-nip="<?=$adm['nip'];?>">
                        <i class="bi bi-trash"></i>
                    </a>
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

  <!-- Tambah Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center"> <!-- mau besar tambahin modal-xl -->
      <div class="modal-content w-75">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Admin</h5>
          <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form class="row g-3" method="post" enctype="multipart/form-data" action="addAdmin">
            <div class="mb-4">
              <label for="Foto">Pas Foto (.jpg / .png / .jpeg)</label>
              <input type="file" name="a_foto" accept=".jpg,.png,.jpeg" onchange="ImgFile(this);" class="form-control-file" required>
              <img id="previewImage" src="#" alt="Preview Image" style="display:none; width: 200px; margin-top: 10px;">
            </div>
            <div class="col-12">
              <label for="NIP">NIP</label>
              <input type="text" name="a_nip" class="form-control" id="NIP" required/>
            </div>
            <div class="col-12">
              <label for="Nama">Nama</label>
              <input type="text" name="a_nama" class="form-control" id="Nama" required/>
            </div>
            <div class="col-12">
              <label for="Jabatan">Jabatan</label>
              <input type="text" name="a_jabatan" class="form-control" id="Jabatan" required/>
            </div>
            <div class="col-12">
              <label for="Username">Username</label>
              <input type="text" name="a_username" class="form-control" id="Username" required/>
            </div>
            <div class="col-12">
              <label for="Password">Password</label>
              <input type="password" name="a_password" class="form-control" id="Password" required/>
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

  <script>
    function ImgFile(input) {
      const file = input.files[0];
      const reader = new FileReader();
      reader.onload = function(e) {
        const previewImage = document.getElementById('previewImage');
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  </script>

  <!-- View Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
      <div class="modal-content text-light bg-success">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Detail Data Admin</h5>
          <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form class="row g-3" method="#" enctype="multipart/form-data" action="#">
            <div class="form-group" style="text-align:center;">
              <img id="vfoto" src="" style="width: 200px;">
            </div>
            <div class="col-12">
              <label for="NIP">NIP</label>
              <input type="text" class="form-control" id="vnip" disabled/>
            </div>
            <div class="col-12">
              <label for="Nama">Nama</label>
              <input type="text" class="form-control" id="vnamalengkap" disabled/>
            </div>
            <div class="col-12">
              <label for="Jabatan">Jabatan</label>
              <input type="text" class="form-control" id="vjabatan" disabled/>
            </div>
            <div class="col-12">
              <label for="Username">Username</label>
              <input type="text" class="form-control" id="vusername" disabled/>
            </div>
            <div class="col-12">
              <label for="Password">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="vpassword" disabled/>
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                  <i class="bi bi-eye" id="eyeIcon"></i>
                </span>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
        $(".viewModalid").click(function() {
            var vfoto = $(this).data('vfoto');
            $("#vfoto").attr("src", vfoto);

            var vnip = $(this).data('vnip');
            $("#vnip").val(vnip);

            var vnamalengkap = $(this).data('vnamalengkap');
            $("#vnamalengkap").val(vnamalengkap);

            var vjabatan = $(this).data('vjabatan');
            $("#vjabatan").val(vjabatan);

            var vusername = $(this).data('vusername');
            $("#vusername").val(vusername);

            var vpassword = $(this).data('vpassword');
            $("#vpassword").val(vpassword);

            $('#viewModal').modal('show');
        });

        // Toggle password visibility
        $('#togglePassword').on('click', function () {
            const passwordInput = $('#vpassword');
            const eyeIcon = $('#eyeIcon');
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                eyeIcon.removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                eyeIcon.removeClass('bi-eye-slash').addClass('bi-eye');
            }
        });
  </script>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
      <div class="modal-content text-dark bg-warning">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Data Admin</h5>
          <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form method="post" enctype="multipart/form-data" action="editAdmin">
            <div class="col-12">
              <label>NIP</label>
              <input type="number" class="form-control" id="enip" name="e_nip" required/>
            </div>
            <div class="col-12">
              <label>Nama</label>
              <input type="text" class="form-control" id="enamalengkap" name="e_namalengkap" required/>
            </div>
            <div class="col-12">
              <label>Jabatan</label>
              <input type="text" class="form-control" id="ejabatan" name="e_jabatan" required/>
            </div>
            <div class="col-12">
              <label>Username</label>
              <input type="text" class="form-control" id="eusername" name="e_username" required/>
            </div>
            <div class="col-12">
              <label>Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="epassword" name="e_password" required/>
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                  <i class="bi bi-eye" id="eyeIcon"></i>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label>Foto Bukti (.jpg / .png / .jpeg) <br><i>abaikan jika tidak ingin mengubah</i></label>
              <div class="form-group">
                <img id="efoto" src="" style="width: 200px;">
              </div>
              <input type="file" name="e_foto" accept=".jpg,.png,.jpeg" onchange="ImgFile(this);" class="form-control-file">
              <input type="text" name="e_oldfoto" class="form-control" id="eoldfoto" hidden required>
            </div>

            <input type="number" id="eidadmin" name="e_idadmin" hidden>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
        $(".editModalid").click(function() {
            var eidadmin = $(this).data('eidadmin');
            $("#eidadmin").val(eidadmin);

            var efoto = $(this).data('efoto');
            $("#efoto").attr("src", efoto);

            var eoldfoto = $(this).data('eoldfoto');
            $("#eoldfoto").val(eoldfoto);

            var enip = $(this).data('enip');
            $("#enip").val(enip);

            var enamalengkap = $(this).data('enamalengkap');
            $("#enamalengkap").val(enamalengkap);

            var ejabatan = $(this).data('ejabatan');
            $("#ejabatan").val(ejabatan);

            var eusername = $(this).data('eusername');
            $("#eusername").val(eusername);

            var epassword = $(this).data('epassword');
            $("#epassword").val(epassword);

            $('#editModal').modal('show');
        });

        // Toggle password visibility
        $('#togglePassword').on('click', function () {
            const passwordInput = $('#epassword');
            const eyeIcon = $('#eyeIcon');
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                eyeIcon.removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                eyeIcon.removeClass('bi-eye-slash').addClass('bi-eye');
            }
        });
  </script>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-dark">
        <div class="modal-body">
          Apakah Anda Yakin Ingin Menghapus Data Admin Ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <form method="post" action="deleteAdmin">
            <input type="hidden" id="nip" name="nip">
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>

    <script>
        $(".deleteModalid").click(function() {
            var nip = $(this).data('nip');
            $("#nip").val(nip);
        });
    </script>
    
    <script>
            function ImgFile(input) {
                const file = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
    </script>

    <script>
        // Function to hide element after 5 seconds
        function hideAfterDelay(elementId) {
            const element = document.getElementById(elementId);
            if (element) {
                setTimeout(() => {
                    element.style.display = 'none';
                }, 5000);
            }
        }

        // Hide success message after 5 seconds
        hideAfterDelay('success-message');

        // Hide error message after 5 seconds
        hideAfterDelay('error-message');
    </script>

    
  </main><!-- End #main -->
<?=$this->endSection()?>