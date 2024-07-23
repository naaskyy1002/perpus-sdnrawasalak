<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item">Data Data Pengguna</li>
          <li class="breadcrumb-item">Data Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
      <div class="col-lg-12">
        <div class="table-responsive">
          <div class="card-body">
            <div class="table-title">
              <a href="<?= base_url('addSiswa') ?>" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary">
                <i class="ri-add-line"></i> Tambah Siswa</a>
              <div class="row mb-3">
                <div class="col-sm-12 col-md-6 ms-auto">
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
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach($siswa as $sw) : ?>
                <tr class="text-center">
                  <td><?= $i++; ?></td>
                  <td><?= $sw['nisn'] ;?></td>
                  <td><?= $sw['username'] ;?></td>
                  <td><?= $sw['kelas'] ;?></td>
                  <td>
                    <a href="#" class="viewModalid"  title="View" data-bs-toggle="modal" data-bs-target="#viewModal"
                      data-vfoto="<?= base_url('assets/img/siswa/' . $sw['foto']);?>"
                      data-vnisn="<?=$sw['nisn'];?>"
                      data-vusername="<?=$sw['username'];?>"
                      data-vpassword="<?=$sw['password'];?>"
                      data-vjk="<?=$sw['jenis_kelamin'];?>"
                      data-vkelas="<?=$sw['kelas'];?>">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="#" class="editModalid" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal"
                      data-eidsiswa="<?=$sw['nisn'];?>"
                      data-efoto="<?= base_url('assets/img/siswa/' . $sw['foto']);?>"
                      data-enisn="<?=$sw['nisn'];?>"
                      data-eusername="<?=$sw['username'];?>"
                      data-epassword="<?=$sw['password'];?>"
                      data-ejk="<?=$sw['jenis_kelamin'];?>"
                      data-ekelas="<?=$sw['kelas'];?>">
                    <i class="bi bi-pencil"></i></a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                        data-nisn="<?=$sw['nisn'];?>">
                        <i class="bi bi-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
				      <?= $pager->links('siswa', 'Pagination');?>
		      </div>
        </div>
      </div>
    </div>

    <!-- Tambah Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog d-flex justify-content-center"> <!-- mau besar tambahin modal-xl -->
        <div class="modal-content w-75">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Siswa</h5>
            <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-3">
            <form class="row g-3" method="post" enctype="multipart/form-data" action="addSiswa">
              <div class="col-12">
                <label for="Foto">Pas Foto (.jpg / .png / .jpeg)</label>
                <input type="file" name="a_foto" accept=".jpg,.png,.jpeg" onchange="ImgFile(this);" class="form-control-file" required>
                <img id="previewImage" src="#" alt="Preview Image" style="display:none; width: 200px; margin-top: 10px;">
              </div>
              <div class="col-12">
                <label for="inputNISN">NISN</label>
                <input type="number" name="a_nisn" class="form-control" required/>
              </div>
              <div class="col-12">
                <label for="inputUsername">Username</label>
                <input type="text" name="a_username" class="form-control" required/>
              </div>
              <div class="col-12">
                <label for="inputPassword">Password</label>
                <input type="password" name="a_password" class="form-control" required/>
              </div>
              <div class="col-12">
                <label for="inputJenisKelamin">Jenis Kelamin</label>
                <select name="a_jk" class="form-control" required>
                  <option value="" disabled selected>Pilih Jenis Kelamin</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="col-12">
                <label for="inputKelas">Kelas</label>
                <select name="a_kelas" class="form-control" required>
                  <option value="" disabled selected>Pilih Kelas</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
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
      <div class="modal-dialog d-flex justify-content-center"> <!-- mau besar tambahin modal-xl -->
        <div class="modal-content text-light bg-success">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Detail Data Siswa</h5>
            <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <form method="#" enctype="multipart/form-data" action="#">
              <div class="form-group" style="text-align:center;">
                <img id="vfoto" src="" style="width: 200px;">
              </div>
              <div class="col-12">
                <label for="inputNISN">NISN</label>
                <input type="text" class="form-control" id="vnisn" disabled/>
              </div>
              <div class="col-12">
                <label for="inputUsername">Nama</label>
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
              <div class="col-12">
                <label for="inputJenisKelamin">Jenis Kelamin</label>
                <input type="text" class="form-control" id="vjk" disabled/>
              </div>
              <div class="col-12">
                <label for="inputkelas">kelas</label>
                <input type="text" class="form-control" id="vkelas" disabled/>
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

              var vnisn = $(this).data('vnisn');
              $("#vnisn").val(vnisn);

              var vusername = $(this).data('vusername');
              $("#vusername").val(vusername);

              var vpassword = $(this).data('vpassword');
              $("#vpassword").val(vpassword);

              var vjk = $(this).data('vjk');
              $("#vjk").val(vjk);

              var vkelas = $(this).data('vkelas');
              $("#vkelas").val(vkelas);

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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content text-dark bg-warning">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data Siswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" method="post" enctype="multipart/form-data" action="editSiswa">
              <div class="col-12">
                <label>NISN</label>
                <input type="number" class="form-control" id="enisn" name="e_nisn" required />
              </div>
              <div class="col-12">
                <label>Nama</label>
                <input type="text" class="form-control" id="eusername" name="e_username" required />
              </div>
              <div class="col-12">
                <label>Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="epassword" name="e_password" required />
                  <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                  </span>
                </div>
              </div>
              <div class="col-12">
                    <label>Jenis Kelamin</label>
                    <select name="e_jk" class="form-control" required>
                      <option value="" disabled selected>Pilih Jenis Kelamin</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
              <div class="col-12">
                <label>Kelas</label>
                <select name="e_kelas" class="form-control" required>
                  <option value="" disabled selected>Pilih Kelas</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
              <div class="form-group">
                <label>Foto Bukti (.jpg / .png / .jpeg) <br><i>abaikan jika tidak ingin mengubah</i></label>
                <div class="form-group">
                  <img id="efoto" src="" style="width: 200px;">
                </div>
                <input type="file" name="e_foto" accept=".jpg,.png,.jpeg" onchange="ImgFile(this);" class="form-control-file">
                <input type="text" name="e_oldfoto" class="form-control" id="eoldsampul" hidden required>
              </div>
              <input type="number" id="eidsiswa" name="e_idsiswa" hidden>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(".editModalid").click(function() {
        var eidsiswa = $(this).data('eidsiswa');
        $("#eidsiswa").val(eidsiswa);

        var efoto = $(this).data('efoto');
        $("#efoto").attr("src", efoto);

        var eoldfoto = $(this).data('eoldfoto');
        $("#eoldfoto").val(eoldfoto);

        var enisn = $(this).data('enisn');
        $("#enisn").val(enisn);

        var eusername = $(this).data('eusername');
        $("#eusername").val(eusername);

        var epassword = $(this).data('epassword');
        $("#epassword").val(epassword);

        var ejk = $(this).data('ejk');
        $("#ejk").val(ejk);

        var ekelas = $(this).data('ekelas');
        $("#ekelas").val(ekelas);

        $('#editModal').modal('show');
      });

      // Toggle password visibility
      $('#togglePassword').on('click', function() {
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
            Apakah Anda Yakin Ingin Menghapus Data Siswa Ini?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <form method="post" action="deleteSiswa">
              <input type="hidden" id="nisn" name="nisn">
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>

      <script>
          $(".deleteModalid").click(function() {
              var nisn = $(this).data('nisn');
              $("#nisn").val(nisn);
          });
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