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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Pengunjung</h5>
                        <form method="post" action="addVisitors">
                            <div class="row mb-3">
                                <label for="nisn" class="col-sm-2 col-form-label">NIS</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nisn" id="nisn" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kelas" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="button-kirim">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Pengunjung</h5>
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
            </div>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#nisn').on('change', function() {
        var nisn = $(this).val();
        $.ajax({
            url: '<?= base_url('admin/visitor/getSiswaByNISN') ?>/' + nisn,
            type: 'GET',
            success: function(data) {
                if (data) {
                    var siswa = JSON.parse(data);
                    $('input[name="nama"]').val(siswa.nama);
                    $('input[name="kelas"]').val(siswa.kelas);
                } else {
                    $('input[name="nama"]').val('');
                    $('input[name="kelas"]').val('');
                    alert('Data siswa tidak ditemukan.');
                }
            },
            error: function() {
                alert('Error fetching data.');
            }
        });
    });
});
</script>

<?=$this->endSection()?>
