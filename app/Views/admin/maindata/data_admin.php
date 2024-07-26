<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $title ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item">Data Data Pengguna</li>
          <li class="breadcrumb-item"><?= $title ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
      <div class="col-lg-12">
        <div class="table-responsive">
          <div class="card-body">
            <div class="table-title">
              <a href="<?= base_url('addAdmin') ?>" data-bs-toggle="modal" data-bs-target="#addModal"class="btn btn-primary">
                <i class="ri-add-line"></i> Tambah Admin</a> 
              <div class="row mb-3">               
                <div class="col-sm-12 col-md-6 ms-auto">
                  <form action="" method="post" class="d-flex">
                    <div class="input-group">
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
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                <?php foreach($admin as $adm) : ?>
                <tr class="text-center">
                  <td><?= $i++; ?></td>
                  <td><?= $adm['nip'] ;?></td>
                  <td><?= $adm['nama_lengkap'] ;?></td>
                  <td><?= $adm['jabatan'] ;?></td>
                  <td>
                    <a href="#" class="viewModalid"  title="Detail" data-bs-toggle="modal" data-bs-target="#viewModal"
                      data-vfoto="<?= base_url('assets/img/admin/' . $adm['foto']);?>"
                      data-vnip="<?=$adm['nip'];?>"
                      data-vnamalengkap="<?=$adm['nama_lengkap'];?>"
                      data-vdob="<?=$adm['dob'];?>"
                      data-valamat="<?=$adm['alamat'];?>"
                      data-vtelepon="<?=$adm['telp'];?>"
                      data-vemail="<?=$adm['email'];?>"
                      data-vjabatan="<?=$adm['jabatan'];?>"
                      data-vusername="<?=$adm['username'];?>"
                      data-vpassword="<?=$adm['password'];?>">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="#" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal" class="editModalid"
                      data-eidadmin="<?=$adm['nip']?>"
                      data-efoto="<?= base_url('assets/img/admin/' . $adm['foto']);?>"
                      data-eoldfoto="<?=$adm['foto'] ;?>"
                      data-enip="<?=$adm['nip'];?>"
                      data-enamalengkap="<?=$adm['nama_lengkap'];?>"
                      data-edob="<?=$adm['dob'];?>"
                      data-ealamat="<?=$adm['alamat'];?>"
                      data-etelepon="<?=$adm['telp'];?>"
                      data-eemail="<?=$adm['email'];?>"
                      data-ejabatan="<?=$adm['jabatan'];?>"
                      data-eusername="<?=$adm['username'];?>"
                      data-epassword="<?=$adm['password'];?>">
                    <i class="bi bi-pencil"></i></a>
                    <a href="#" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                        data-nip="<?=$adm['nip'];?>">
                        <i class="bi bi-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
				      <?= $pager->links('admin', 'Pagination');?>
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
                <input type="number" name="a_nip" class="form-control" id="NIP" required/>
              </div>
              <div class="col-12">
                <label for="Nama">Nama</label>
                <input type="text" name="a_nama" class="form-control" id="Nama" required/>
              </div>
              <div class="col-12">
                <label for="dob">Tanggal Lahir</label>
                <input type="date" name="a_dob" class="form-control" id="dob" required/>
              </div>
              <div class="col-12">
                <label for="Alamat">Alamat</label>
                <input type="text" name="a_alamat" class="form-control" id="Alamat" required/>
              </div>
              <div class="col-12">
                <label for="Telepon">Handphone</label>
                <input type="number" name="a_telepon" class="form-control" id="Telepon" required/>
              </div>
              <div class="col-12">
                <label for="Email">Email</label>
                <input type="email" name="a_email" class="form-control" id="Email" required/>
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
                <label for="Dob">Tanggal Lahir</label>
                <input type="text" class="form-control" id="vdob" disabled/>
              </div>
              <div class="col-12">
                <label for="Alamat">Alamat</label>
                <input type="text" class="form-control" id="valamat" disabled/>
              </div>
              <div class="col-12">
                <label for="Telepon">Handphone</label>
                <input type="text" class="form-control" id="vtelepon" disabled/>
              </div>
              <div class="col-12">
                <label for="Email">Email</label>
                <input type="text" class="form-control" id="vemail" disabled/>
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

              var vdob = $(this).data('vdob');
              $("#vdob").val(vdob);
              
              var valamat = $(this).data('valamat');
              $("#valamat").val(valamat);
              
              var vtelepon = $(this).data('vtelepon');
              $("#vtelepon").val(vtelepon);

              var vemail = $(this).data('vemail');
              $("#vemail").val(vemail);

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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/editAdmin'); ?>">
                        <div class="col-12">
                            <label>NIP</label>
                            <input type="number" class="form-control" id="enip" name="e_nip" required/>
                        </div>
                        <div class="col-12">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="enamalengkap" name="e_namalengkap" required/>
                        </div>
                        <div class="col-12">
                            <label>Tanggal lahir</label>
                            <input type="date" class="form-control" id="edob" name="e_dob" required/>
                        </div>
                        <div class="col-12">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="ealamat" name="e_alamat" required/>
                        </div>
                        <div class="col-12">
                            <label>Handphone</label>
                            <input type="number" class="form-control" id="etelepon" name="e_telepon" required/>
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" id="eemail" name="e_email" required/>
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
                            <input type="text" class="form-control" id="epassword" name="e_password" required/>
                        </div>
                        <div class="form-group">
                            <label>Foto Bukti (.jpg / .png / .jpeg) <br><i>abaikan jika tidak ingin mengubah</i></label>
                            <div class="form-group">
                                <img id="efoto" src="" style="width: 200px;">
                            </div>
                            <input type="file" name="e_foto" accept=".jpg,.png,.jpeg" onchange="ImgFile(this);" class="form-control-file">
                            <input type="text" name="e_oldfoto" id="eoldfoto" class="form-control" hidden required>
                        </div>

                        <input type="hidden" id="eidadmin" name="e_idadmin">

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

            var edob = $(this).data('edob');
            $("#edob").val(edob);

            var ealamat = $(this).data('ealamat');
            $("#ealamat").val(ealamat);

            var etelepon = $(this).data('etelepon');
            $("#etelepon").val(etelepon);

            var eemail = $(this).data('eemail');
            $("#eemail").val(eemail);

            var ejabatan = $(this).data('ejabatan');
            $("#ejabatan").val(ejabatan);

            var eusername = $(this).data('eusername');
            $("#eusername").val(eusername);

            var epassword = $(this).data('epassword');
            $("#epassword").val(epassword);

            $('#editModal').modal('show');
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