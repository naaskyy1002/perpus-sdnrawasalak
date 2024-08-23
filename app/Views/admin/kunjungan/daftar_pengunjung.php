<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Daftar Pengunjung</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                <li class="breadcrumb-item">Daftar Pengunjung</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Pengunjung</h5>
                        <form method="post" action="<?= base_url('admin/visitor/addVisitor'); ?>">
                            <div class="form-group">
                                <label>Masukan Nama</label>
                                <select name="search_nama" id="search_nama" class="form-control" style="width: 100%;" required>
                                  <option value=""></option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" id="s_nis" name="s_nis" value="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <input type="text" id="s_nama" name="s_nama" value="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <input type="text" id="s_kelas" name="s_kelas" value="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="submit" class="button-kirim">Hadir</button>
                                </div>
                            </div>
                        </form>

                        <script>
                        $(document).ready(function() {
                            $('#search_nama').select2({
                                placeholder: 'Ketikkan Nama',
                                ajax: {
                                    url: "<?= base_url('admin/visitor/getSiswaByNISN') ?>",
                                    type: "GET",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function (params) {
                                        return {
                                            searchTerm: params.term
                                        };
                                    },
                                    processResults: function (response) {
                                        console.log(response)
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }
                            }).on('change', function() {
                                var data = $(this).select2('data')[0];
                                $('#s_nis').val(data.id);
                                $('#s_nama').val(data.snama);
                                $('#s_kelas').val(data.skelas);
                            });
                        });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card shadow mb-4"> 
        <div class="card-body">
            <div class="row mb-3"></div>
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
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($visitors as $vs): ?>
                                <tr class="text-center">
                                    <td><?= $i++; ?></td>
                                    <td><?= $vs['nisn'] ?></td>
                                    <td><?= $vs['nama'] ?></td>
                                    <td><?= $vs['kelas'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
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
</main>


<?=$this->endSection()?>
