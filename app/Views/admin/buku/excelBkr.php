<?= $this->extend('admin/layout');?>
<?= $this->section('bodycontent');?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="/admin/data-mhs">Data Mahasiswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Import Data</li>
            </ol>
        </nav>
        
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <p>
                            Disini Anda bisa melakukan import data Mahasiswa dengan menggunakan format yang disediakan, 
                            klik <strong class="text-primary">Download Format</strong> untuk mengunduh formatnya. 
                        </p>
                        
                        <a href="/admin/data-mhs-import-format" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Download Format</span>
                        </a>
                        <div class="mb-4"></div>
                        <hr>
                        <p>
                            Setelah mengisi data pada file Excel, Anda bisa menguploadnya dibawah ini, 
                            kemudian klik <strong class="text-warning">Preview Data</strong> untuk mengecek ulang isi datanya. 
                            Ekstensi file Excel yang diizinkan adalah <strong class="text-danger">.xlsx</strong> !
                        </p>
                        <form method="post" enctype="multipart/form-data" action="/admin/data-mhs-import" >
                            <div class="form-group">
                                <div class="input-group custom-file-button">
                                    <label class="input-group-text" for="inputGroupFile">Pilih file Excel (.xlsx)</label>
                                    <input type="file" name="tmp_file" class="form-control" id="inputGroupFile" accept=".xlsx" onchange="ExcelFile(this);">
                                </div>
                            </div>

                            <div class="mb-4"></div>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" name="preview" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-magnifying-glass"></i>
                                        </span>
                                        <span class="text">Preview Data</span>
                                    </button>
                                </div>
                            </div>
                        </form>       
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 mb-4">

            <?php
            // Jika user telah mengklik tombol Preview
            if(isset($_POST['preview'])) {
                $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
                $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

                // Cek apakah terdapat file data.xlsx pada folder tmp
                if (is_file('berkas/tmp/' . $nama_file_baru)) // Jika file tersebut ada
                        unlink('berkas/tmp/' . $nama_file_baru); // Hapus file tersebut

                $ext = pathinfo($_FILES['tmp_file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
                $tmp_file = $_FILES['tmp_file']['tmp_name'];

                // Cek apakah file yang diupload adalah file Excel 2010+ (.xlsx)
                if($ext == "xlsx") {
                    // Upload file yang dipilih ke folder tmp
                    // dan rename file tersebut menjadi data{tglsekarang}.xlsx
                    // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
                    // Contoh nama file setelah di rename : data20210814192500.xlsx
                    move_uploaded_file($tmp_file, 'berkas/tmp/' . $nama_file_baru);

                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    $spreadsheet = $reader->load('berkas/tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
                    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    ?>
                    <!-- Buat sebuah tag form untuk proses import data ke database -->
                    <form method="post" action="/admin/data-mhs-import-process">

                        <!-- Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
                        ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload) -->
                        <input type="hidden" name="new_file" value="<?=$nama_file_baru;?>">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Preview Data</h5>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>NAMA</th>
                                                <th>TGL LAHIR</th>
                                                <th>JK</th>
                                                <th>ALAMAT</th>
                                                <th>EMAIL</th>
                                            </tr>
                                        </thead>
                                            <?php
                                            $no = 0;
                                            $numrow = 1;
                                            $kosong = 0;

                                            foreach($sheet as $row) // Lakukan perulangan dari data yang ada di excel
                                            { 
                                                // Ambil data pada excel sesuai Kolom
                                                $mhs_nim    = $row['A']; // Ambil data kolom A
                                                $mhs_nama   = $row['B']; // Ambil data kolom B
                                                $mhs_dob    = $row['C']; // Ambil data kolom C
                                                $mhs_jk     = $row['D']; // Ambil data kolom D
                                                $mhs_alamat = $row['E']; // Ambil data kolom E
                                                $mhs_email  = $row['F']; // Ambil data kolom F

                                                // Cek jika semua data tidak diisi
                                                // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                                                if($mhs_nim=='' && $mhs_nama=='' && $mhs_dob=='' && $mhs_jk=='' && $mhs_alamat=='' && $mhs_email=='') continue; 

                                                // Cek $numrow apakah lebih dari 1
                                                // Artinya karena baris pertama adalah nama-nama kolom
                                                // Jadi dilewat saja, tidak usah diimport
                                                if($numrow > 1) {
                                                    // Validasi apakah semua data telah diisi
                                                    // Jika kosong, beri warna merah
                                                    $mhs_nim_td     = (!empty($mhs_nim)) ? '' : ' style="background:#fadbd8;" '; 
                                                    $mhs_nama_td    = (!empty($mhs_nama)) ? '' : ' style="background:#fadbd8;" ';
                                                    $mhs_dob_td     = (!empty($mhs_dob)) ? '' : ' style="background:#fadbd8;" ';
                                                    $mhs_jk_td      = (!empty($mhs_jk)) ? '' : ' style="background:#fadbd8;" ';
                                                    $mhs_alamat_td  = (!empty($mhs_alamat)) ? '' : ' style="background:#fadbd8;" ';
                                                    $mhs_email_td   = (!empty($mhs_email)) ? '' : ' style="background:#fadbd8;" ';
                                                    
                                                    // Jika salah satu data ada yang kosong
                                                    if($mhs_nim=='' or $mhs_nama=='' or $mhs_dob=='' or $mhs_jk=='' or $mhs_alamat=='' or $mhs_email=='')
                                                    {
                                                        // Tambah 1 variabel $kosong
                                                        $kosong++; 
                                                    }
                                                    ?>

                                                    <tr>
                                                        <td> <?=$no;?> </td>
                                                        <td <?=$mhs_nim_td;?>>     <?=$mhs_nim;?>      </td>
                                                        <td <?=$mhs_nama_td;?>>    <?=$mhs_nama;?>     </td>
                                                        <td <?=$mhs_dob_td;?>>     <?=$mhs_dob;?>      </td>
                                                        <td <?=$mhs_jk_td;?>>      <?=$mhs_jk;?>       </td>
                                                        <td <?=$mhs_alamat_td;?>>  <?=$mhs_alamat;?>   </td>
                                                        <td <?=$mhs_email_td;?>>   <?=$mhs_email;?>    </td>
                                                    </tr>
                                                    <?php
                                                }
                                                $no++;
                                                $numrow++; // Tambah 1 setiap kali looping
                                            }
                                            ?>
                                    </table>
                                </div>

                                <!-- Cek apakah variabel kosong lebih dari 0
                                Jika lebih dari 0, berarti ada data yang masih kosong -->
                                <?php
                                if($kosong > 0) { ?>
                                <div class="mb-4"></div>
                                <!-- Buat sebuah div untuk alert validasi kosong -->
                                <div id="kosong" class="alert alert-danger">
                                    Ops! Ada <span id="jumlah_kosong"></span> baris data yang tidak lengkap!
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                        $("#jumlah_kosong").html('<?=$kosong;?>');
                                        $("#kosong").show(); // Munculkan alert validasi kosong
                                    });
                                </script>
                                <?php 
                                }
                                else { ?>
                                <div class="mb-4"></div>
                                <!-- Buat sebuah tombol untuk mengimport data ke database -->
                                <button type="submit" name="mhs_import" class="btn btn-success shadow-sm mr-2 btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="text">Import Data</span>
                                </button>
                                <?php 
                                } 
                                ?>
                            </div>
                        </div>
                    </form>
                <?php
                }
                else { ?>
                    <!-- Jika file yang diupload bukan File Excel 2007 (.xlsx) Munculkan pesan validasi -->
                    <div class="alert alert-danger">
                        Ops! Hanya file Excel 2010+ (.xlsx) yang diperbolehkan!
                    </div>
                <?php
                }
            }
            ?>
            </div>
        </div>

        <script type="text/javascript">
            var _validFileExtensions = [".xlsx"];    
            function ExcelFile(oInput) {
                if (oInput.type == "file") {
                    var sFileName = oInput.value;
                    if (sFileName.length > 0) {
                        var blnValid = false;
                        for (var j = 0; j < _validFileExtensions.length; j++) {
                            var sCurExtension = _validFileExtensions[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }
                        if (!blnValid) {
                            alert("Maaf, file " + sFileName + " tidak diperbolehkan! Ekstensi file yang diperbolehkan: " + _validFileExtensions.join(", "));
                            oInput.value = "";
                            return false;
                        }
                    }
                }
                return true;
            }
        </script>

    </div>
    <!-- /.container-fluid -->

<?= $this->endSection();?>