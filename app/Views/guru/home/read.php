<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column justify-content-start align-items-start">
                                <div class="font-weight-bold"><?= selamat(date("H"));?> <?= $user['name'];?></div>
                                <div>
                                    <small><?= $user['name_jabatan'];?> (<?= $user['akronim'];?>)</small>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-3">
                                    <div class="text-center">
                                        <a href="<?= base_url('profil');?>" class="text-decoration-none">
                                            <div class="mb-2">
                                                <i class="fas fa-user mr-1"></i>
                                            </div>
                                            <div>
                                                Profil
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('izin');?>" class="text-decoration-none">
                                            <div class="mb-2">
                                                <i class="fas fa-calendar mr-1"></i>
                                            </div>
                                            <div>
                                                Izin
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('riwayat');?>" class="text-decoration-none">
                                            <div class="mb-2">
                                                <i class="fas fa-file-alt mr-1"></i>
                                            </div>
                                            <div>
                                                Riwayat
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('absensi');?>" class="text-decoration-none">
                                            <div class="mb-2">
                                                <i class="fas fa-map mr-1"></i>
                                            </div>
                                            <div>
                                                Absen
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-md-6 mb-1 text-center">
                                        <?php if(empty($absensi['image_in'])):?>
                                        <div>
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <?php else:?>
                                        <img src="/assets/img/absensi/<?= $absensi['image_in'];?>" class="img-fluid"
                                            alt="">
                                        <?php endif;?>
                                    </div>
                                    <div class="col-12 col-md-6 text-center">
                                        <div>
                                            <div>Masuk</div>
                                            <small><?= empty($absensi['image_in']) ? 'Belum Absen' : $absensi['hour_in'] ;?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-md-6 mb-1 text-center">
                                        <?php if(empty($absensi['image_out'])):?>
                                        <div>
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <?php else:?>
                                        <img src="/assets/img/absensi/<?= $absensi['image_out'];?>" class="img-fluid"
                                            alt="">
                                        <?php endif;?>
                                    </div>
                                    <div class="col-12 col-md-6 text-center">
                                        <div>
                                            <div>Pulang</div>
                                            <small><?= empty($absensi['image_out']) ? 'Belum Absen' : $absensi['hour_out'] ;?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="font-weight-bold h6">Rekap Absensi Bulan <?= tanggalindo(date('Y-m-'));?></div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="mb-2">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <div>
                                    <small class="badge badge-success">Hadir : <?= $hadir;?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="mb-2">
                                    <i class="fas fa-info text-primary"></i>
                                </div>
                                <div>
                                    <small class="badge badge-primary">Izin : <?= $izin;?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="mb-2">
                                    <i class="fas fa-tired text-danger"></i>
                                </div>
                                <div>
                                    <small class="badge badge-danger">Sakit : <?= $sakit;?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="mb-2">
                                    <i class="fas fa-clock text-warning"></i>
                                </div>
                                <div>
                                    <small class="badge badge-warning">Telat : <?= $terlambat;?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">
                                    Data Absensi Bulan Ini
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <?php foreach($absensi_bulan as $row):?>
                                        <tr>
                                            <td>
                                                <span class="badge badge-info ml-2">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </td>
                                            <td>
                                                <?= tanggalindo($row['date']);?>
                                            </td>
                                            <td>
                                                <div class="badge badge-success">
                                                    <small>Masuk
                                                        :
                                                        <?= empty($row['image_in']) ? 'Belum Absen' : $row['hour_in'] ;?></small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge badge-danger">
                                                    <small>Pulang :
                                                        <?= empty($row['image_out']) ? 'Belum Absen' : $row['hour_out'] ;?></small>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<?= $this->endSection('content') ?>