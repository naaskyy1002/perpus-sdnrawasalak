<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin');?>">Beranda</a></li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="<?= base_url("assets/img/admin/" . ($profil['foto'] ?? 'profile-img.jpg')) ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $profil['nama_lengkap']; ?></h2>
                        <h3><?= $profil['jabatan']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail Profil</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">NIP</div>
                                    <div class="col-lg-8 col-md-8"><?= $profil['nip']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Nama Lengkap</div>
                                    <div class="col-lg-8 col-md-8"><?= $profil['nama_lengkap']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Jabatan</div>
                                    <div class="col-lg-8 col-md-8"><?= $profil['jabatan']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Tanggal Lahir</div>
                                    <div class="col-lg-8 col-md-8"><?= date('d-M-Y', strtotime($profil['dob'])); ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Alamat</div>
                                    <div class="col-lg-8 col-md-8"><?= $profil['alamat']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Nomor Telepon</div>
                                    <div class="col-lg-8 col-md-8"><?= $profil['telp']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Email</div>
                                    <div class="col-lg-8 col-md-8"><?= $profil['email']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?=$this->endSection()?>
