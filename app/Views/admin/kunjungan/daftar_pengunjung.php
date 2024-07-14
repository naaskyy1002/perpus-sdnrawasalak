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
                        <form method="post" action="<?= base_url('admin/addPengunjung'); ?>">
                            <div class="row mb-3">
                                <label for="nisn" class="col-sm-2 col-form-label">NIS</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nisn" class="form-control" required>
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

<?=$this->endSection()?>
