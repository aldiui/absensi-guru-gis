<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column">
                                <div class="font-weight-bold"><?= $title; ?></div>
                                <div>
                                    <small><?= tanggalIndo(date("Y-m-d"));?> | <span id="jam"></span>
                                    </small>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="btn btn-outline-success rounded-circle mb-3 disabled hover">
                                            <i class=" fas fa-check my-2" style="font-size: 70px"></i>
                                        </div>
                                        <div class="mb-1">Terima Kasih, Sudah Absensi Masuk dan Pulang.</div>
                                        <div class="mb-3">Jangan Lupa Istirahat dan Tetap Semangat.</div>
                                        <div>
                                            <div class="badge badge-success">Masuk : <?= $absensi['hour_in'];?></div>
                                            <div class="badge badge-danger">Pulang : <?= $absensi['hour_out'];?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url();?>assets/js/absen.js"></script>
<?= $this->endSection('content') ?>