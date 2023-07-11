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
                                <div class="font-weight-bold">Data <?= $title;?></div>
                                <div class="ml-auto">
                                    <a class="btn btn-primary" href="<?= base_url("izin/create");?>">
                                        <i class="fas fa-plus mr-2"></i>Tambah
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url("izin/cari");?>" autocomplete="off">
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
                        <?php if($cariizin != "belum"):?>
                        <?php if(!empty($cariizin)):?>
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">Rekap Data Izin atau Sakit Bulan
                                    <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <?php foreach($cariizin as $row):?>
                                        <tr>
                                            <td>
                                                <?php if($row["status"] == "Sakit"):?>
                                                <span class="badge badge-danger ml-2">
                                                    <i class="fa fa-tired"></i>
                                                </span>
                                                <?php elseif($row["status"] == "Izin"):?>
                                                <span class="badge badge-primary ml-2">
                                                    <i class="fas fa-info"></i>
                                                </span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?= tanggalindo($row['date']);?>
                                            </td>
                                            <td>
                                                <?= $row["status"];?>
                                            </td>
                                            <td>
                                                <?php if($row["persetujuan"] == "Disetujui"):?>
                                                <span class="badge badge-success">
                                                    Disetujui
                                                </span>
                                                <?php elseif($row["persetujuan"] == "Ditolak"):?>
                                                <span class="badge badge-danger">
                                                    Ditolak
                                                </span>
                                                <?php elseif($row["persetujuan"] == "Pending"):?>
                                                <span class="badge badge-warning">
                                                    Pending
                                                </span>
                                                <?php endif;?>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php elseif(empty($cariizin)):?>
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">Rekap Data Izin atau Sakit Bulan
                                    <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-center">Maaf Rekap Data Izin atau Sakit Bulan
                                    <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?> Tidak Ditemukan</div>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php else:?>
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">Rekap Data Izin atau Sakit Bulan
                                    <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <?php foreach($cariizin2 as $row):?>
                                        <tr>
                                            <td>
                                                <?php if($row["status"] == "Sakit"):?>
                                                <span class="badge badge-danger ml-2">
                                                    <i class="fa fa-tired"></i>
                                                </span>
                                                <?php elseif($row["status"] == "Izin"):?>
                                                <span class="badge badge-primary ml-2">
                                                    <i class="fas fa-info"></i>
                                                </span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?= tanggalindo($row['date']);?>
                                            </td>
                                            <td>
                                                <?= $row["status"];?>
                                            </td>
                                            <td>
                                                <?php if($row["persetujuan"] == "Disetujui"):?>
                                                <span class="badge badge-success">
                                                    Disetujui
                                                </span>
                                                <?php elseif($row["persetujuan"] == "Ditolak"):?>
                                                <span class="badge badge-danger">
                                                    Ditolak
                                                </span>
                                                <?php elseif($row["persetujuan"] == "Pending"):?>
                                                <span class="badge badge-warning">
                                                    Pending
                                                </span>
                                                <a class="badge badge-warning btn-sm mr-1"
                                                    href="<?= base_url('izin/edit/').$row['id'];?>">
                                                    <i class="fas fa-edit mr-1"></i>
                                                    <span>
                                                        Edit
                                                    </span>
                                                </a>
                                                <?php endif;?>
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