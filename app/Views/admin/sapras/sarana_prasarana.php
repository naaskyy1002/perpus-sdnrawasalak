<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin');?>">Beranda</a></li>
                <li class="breadcrumb-item"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card shadow mb-4"> 
        <div class="card-body">
            <div class="row mb-3">
                <div class="ex col-sm-12 col-md-6 text-right d-flex align-items-end"> <!--justify-content-end-->
                    <a class="btn btn-tambah" href="<?= base_url('addSapras') ?>" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="ri-add-line"></i> Tambah</a>
                    <a href="/admin/excelSapras" target="_blank" class="btn btn-infos btn-spacing">
                        <i class="ri-file-excel-2-line"></i> Excel</a>
                    <a href="/admin/printSapras" target="_blank" class="btn btn-jk btn-spacing">
                        <i class="ri-printer-line"></i> Print</a>
                </div>
            </div>
                <section class="section">    
                    <div class="col-lg-12">
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">              
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Kondisi Barang</th>
                                        <th>Asal Barang</th>
                                        <th>Penyimpanan Barang</th>
                                        <th>Jumlah Barang</th>
                                        <th>Nama Peminjam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ; ?>
                                    <?php foreach($sapras as $sp) : ?>
                                        <tr class="text-center">
                                            <td><?= $i++; ?></td>
                                            <td><?= $sp['kode_barang'] ;?></td>
                                            <td><?= $sp['nama_barang'] ;?></td>
                                            <td><?= date('d-M-Y', strtotime($sp['tanggal_masuk'])) ?></td>
                                            <td><?= $sp['kondisi_barang'] ;?></td>
                                            <td><?= $sp['asal_barang'] ;?></td>
                                            <td><?= $sp['penyimpanan_barang'] ;?></td>
                                            <td><?= $sp['jumlah_barang'] ;?></td>
                                            <td><?= $sp['nama_peminjam'] ;?></td>
                                            <td>
                                                <a href="#" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal" class="editModalid" 
                                                    data-eid="<?=$sp['id']?>"    
                                                    data-ekodebarang="<?=$sp['kode_barang'];?>"
                                                    data-enamabarang="<?=$sp['nama_barang'];?>"
                                                    data-etanggalmasuk="<?=$sp['tanggal_masuk']; ?>"
                                                    data-ekondisibarang="<?=$sp['kondisi_barang'];?>"
                                                    data-easalbarang="<?= $sp['asal_barang'] ;?>"
                                                    data-epenyimpananbarang="<?= $sp['penyimpanan_barang'] ;?>"
                                                    data-ejumlahbarang="<?= $sp['jumlah_barang'] ;?>"
                                                    data-enamapeminjam="<?=$sp['nama_peminjam'];?>">    
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="#" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModalid" 
                                                    data-id="<?=$sp['id'];?>">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
		            </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Tambah Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog d-flex justify-content-center">
            <div class="modal-content text-dark bg-tambah">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Sarana Prasarana</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <form class="row g-3" method="post" enctype="multipart/form-data" action="addSapras">
                        <div class="col-12">
                            <label for="inputKode">Kode Barang</label>
                            <input type="text" name="a_kodebarang" class="form-control"required>
                        </div>
                        <div class="col-12">
                            <label for="inputBarang" class="form-label">Nama Barang</label>
                            <input type="text" name="a_namabarang" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputTanggal" class="form-label">Tanggal Masuk</label>
                            <input type="date" name="a_tanggalmasuk" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputKondisi" class="form-label">Kondisi Barang</label>
                            <input type="text" name="a_kondisibarang" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputAsal" class="form-label">Asal Barang</label>
                            <input type="text" name="a_asalbarang" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputSimpan" class="form-label">Penyimpanan Barang</label>
                            <input type="text" name="a_penyimpananbarang" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputJumlah" class="form-label">Jumlah Barang</label>
                            <input type="number" name="a_jumlahbarang" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="inputPeminjam" class="form-label">Nama Peminjam</label>
                            <input type="text" name="a_namapeminjam" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog d-flex justify-content-center">
                <div class="modal-content text-dark bg-edit">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Sarana Prasarana</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="editSapras">
                        <div class="col-12">
                            <label>Kode Barang</label>
                            <input type="text" id="ekodebarang" name="e_kodebarang" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" id="enamabarang" name="e_namabarang" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="date" id="etanggalmasuk" name="e_tanggalmasuk" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Kondisi Barang</label>
                            <input type="text" id="ekondisibarang" name="e_kondisibarang" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Asal Barang</label>
                            <input type="text" id="easalbarang" name="e_asalbarang" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Penyimpanan Barang</label>
                            <input type="text" id="epenyimpananbarang" name="e_penyimpananbarang" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input type="number" id="ejumlahbarang" name="e_jumlahbarang" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Nama Peminjam</label>
                            <input type="text" id="enamapeminjam" name="e_namapeminjam" class="form-control">
                        </div>
                        
                        <input type="number" id="eid" name="e_id" hidden>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sukses">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
            $(".editModalid").click(function() {
                var eid = $(this).data('eid');
                $("#eid").val(eid);

                var ekodebarang = $(this).data('ekodebarang');
                $("#ekodebarang").val(ekodebarang);

                var enamabarang = $(this).data('enamabarang');
                $("#enamabarang").val(enamabarang);

                var etanggalmasuk = $(this).data('etanggalmasuk');
                $("#etanggalmasuk").val(etanggalmasuk);

                var ekondisibarang = $(this).data('ekondisibarang');
                $("#ekondisibarang").val(ekondisibarang);

                var easalbarang = $(this).data('easalbarang');
                $("#easalbarang").val(easalbarang);

                var epenyimpananbarang = $(this).data('epenyimpananbarang');
                $("#epenyimpananbarang").val(epenyimpananbarang);

                var ejumlahbarang = $(this).data('ejumlahbarang');
                $("#ejumlahbarang").val(ejumlahbarang);

                var enamapeminjam = $(this).data('enamapeminjam');
                $("#enamapeminjam").val(enamapeminjam);

                $('#editModal').modal('show');
            });
    </script>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Sarana Prasarana Ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Tutup</button>
                    <form method="post" action="<?= base_url('admin/deleteSapras') ?>">
                        <input type="hidden" id="id" name="id">
                        <button type="submit" class="btn btn-hapus">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".deleteModalid").click(function() {
            var id = $(this).data('id');
            $("#id").val(id);
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