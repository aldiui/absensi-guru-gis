<?= $this->extend('template/layout_admin') ?>
<?= $this->section('content') ?>
<?php $rusak = validation_errors();?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title;?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <div class="font-weight-bold">Data <?= $title;?></div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('operator/izin/cari');?>" method="post">
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
            <div class="card">
                <div class="card-header">
                    <div class="font-weight-bold">Rekap Data Izin
                        <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>Persetujuan</th>
                                    <th width="15%">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($izin as $row):?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= tanggalindo($row['date']);?></td>
                                    <td><?= $row['name'];?></td>
                                    <td><?= $row['name_jabatan'];?> (<?= $row['akronim'];?>)</td>
                                    <td><?= $row['status'];?></td>
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
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-warning btn-sm mr-1" data-toggle="modal"
                                                data-target="#edit<?= $row["id"];?>">
                                                <i class="fas fa-info mr-1"></i>
                                                <span>
                                                    Cek
                                                </span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php foreach($izin as $row):?>
<div class="modal fade" tabindex="-1" role="dialog" id="edit<?= $row["id"];?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cek Data <?= $title;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url("operator/izin/update/").$row["id"];?>" autocomplete="off">
                <div class="modal-body">
                    <?= csrf_field();?>
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?= base_url('assets/img/izin/').$row['image'];?>" class="img-fluid mb-3" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="keterangan" class="form-label">Nama</label>
                                <p><?= $row['name'];?></p>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="form-label">Jabatan</label>
                                <p><?= $row['name_jabatan'];?> (<?= $row['akronim'];?>)</p>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <p><?= $row['keterangan'];?></p>
                            </div>
                            <div class="form-group">
                                <label for="persetujuan" class="form-label">Persetujuan</label>
                                <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                    <label
                                        class="btn btn-lg btn-outline-success w-50 <?= ($row["persetujuan"] == "Disetujui") ? "active" : ""; ?>">
                                        <input type="radio" name="persetujuan" value="Disetujui"
                                            <?= ($row["persetujuan"] == "Disetujui") ? "checked active" : ""; ?>>
                                        Disetujui
                                    </label>
                                    <label
                                        class="btn btn-lg btn-outline-danger w-50 <?= ($row["persetujuan"] == "Ditolak") ? "active" : ""; ?>">
                                        <input type="radio" name="persetujuan" value="Ditolak"
                                            <?= ($row["persetujuan"] == "Ditolak") ? "active" : ""; ?>>
                                        Ditolak
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?= !empty($rusak['persetujuan']) ? validation_show_error('persetujuan') : ''; ?>
                                </small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?= $this->endSection('content') ?>