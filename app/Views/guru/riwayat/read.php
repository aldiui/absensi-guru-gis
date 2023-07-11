<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>
<?php $rusak = validation_errors();?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold"><?= $title; ?></div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url("riwayat/cari");?>" autocomplete="off">
                                    <?= csrf_field();?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="bulan" class="form-label">Bulan</label>
                                                <select name="bulan" id="bulan"
                                                    class="form-control <?= !empty($rusak['bulan']) ? 'is-invalid' : ''; ?>">
                                                    <option value="">-- Pilih Bulan --</option>
                                                    <?php foreach($bulan as $row):?>
                                                    <?php if($row['no'] ==  old('bulan')):?>
                                                    <option value="<?= $row['no'];?>" selected>
                                                        <?= $row['nama'];?>
                                                    </option>
                                                    <?php else:?>
                                                    <option value="<?= $row['no'];?>">
                                                        <?= $row['nama'];?>
                                                    </option>
                                                    <?php endif;?>
                                                    <?php endforeach;?>
                                                </select>
                                                <small class="invalid-feedback">
                                                    <?= !empty($rusak['bulan']) ? validation_show_error('bulan') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="tahun" class="form-label">Tahun</label>
                                                <select name="tahun" id="tahun"
                                                    class="form-control <?= !empty($rusak['tahun']) ? 'is-invalid' : ''; ?>">
                                                    <option value="">-- Pilih Tahun --</option>
                                                    <?php foreach($tahun as $row):?>
                                                    <?php if($row ==  old('tahun')):?>
                                                    <option value="<?= $row;?>" selected>
                                                        <?= $row;?>
                                                    </option>
                                                    <?php else:?>
                                                    <option value="<?= $row;?>">
                                                        <?= $row;?>
                                                    </option>
                                                    <?php endif;?>
                                                    <?php endforeach;?>
                                                </select>
                                                <small class="invalid-feedback">
                                                    <?= !empty($rusak['tahun']) ? validation_show_error('tahun') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-search mr-2"></i>Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if($cariabsen != "belum"):?>
                        <?php if(!empty($cariabsen)):?>
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">Rekap Presensi Bulan
                                    <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <?php foreach($cariabsen as $row):?>
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
                        <?php elseif(empty($cariabsen)):?>
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">Rekap Absensi Bulan
                                    <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-center">Maaf Data Rekap Absensi
                                    <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?> Tidak Ditemukan</div>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php else:?>
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">Rekap Presensi Bulan
                                    <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <?php foreach($cariabsen2 as $row):?>
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
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>