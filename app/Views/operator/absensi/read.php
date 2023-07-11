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
                    <form action="<?= base_url('operator/absensi/cari');?>" method="post">
                        <?= csrf_field();?>
                        <div class="row">
                            <div class="col-lg-4">
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
                            <div class="col-lg-4">
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="guru" class="form-label">Guru</label>
                                    <select name="guru" id="guru"
                                        class="form-control <?= !empty($rusak['guru']) ? 'is-invalid' : ''; ?>">
                                        <option value="">-- Pilih Guru --</option>
                                        <?php foreach($guru as $row):?>
                                        <?php if($row['id'] ==  old('guru')):?>
                                        <option value="<?= $row['id'];?>" selected>
                                            <?= $row['name'];?>
                                        </option>
                                        <?php else:?>
                                        <option value="<?= $row['id'];?>">
                                            <?= $row['name'];?>
                                        </option>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['guru']) ? validation_show_error('guru') : ''; ?>
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
            <?php if($absensi != 'Belum'):?>
            <?php if(!empty($absensi)):?>
            <div class="card">
                <div class="card-header">
                    <div class="font-weight-bold">Absensi Dari <?= $user_guru['name'];?>
                        <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                    </div>
                    <div class="ml-auto">
                        <a class="btn btn-danger text-white" .
                            href="<?= base_url('operator/absensi/cetak/').$bulan1.'/'.$tahun1.'/'.$user_guru['id'];?>">
                            <i class="fas fa-file-pdf mr-2"></i>PDF
                        </a>
                        <!-- <a class="btn btn-success text-white">
                            <i class="fas fa-file-excel mr-2"></i>Excel
                        </a> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Foto</th>
                                    <th>Jam Keluar</th>
                                    <th>Foto</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($absensi as $row):?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= tanggalindo($row['date']);?></td>
                                    <td>
                                        <div
                                            class="badge <?= empty($row['image_in']) ? 'badge-danger' : 'badge-success' ;?>">
                                            <small><?= empty($row['image_in']) ? 'Belum Absen' : $row['hour_in'] ;?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if(!empty($row['image_in'])):?>
                                        <img src="<?= base_url('assets/img/absensi/').$row['image_in'];?>" width="100px"
                                            alt="">
                                        <?php else:?>
                                        <div class="badge badge-danger">
                                            <small>Belum Absen</small>
                                        </div>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <div
                                            class="badge <?= empty($row['image_out']) ? 'badge-danger' : 'badge-success' ;?>">
                                            <small><?= empty($row['image_out']) ? 'Belum Absen' : $row['hour_out'] ;?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if(!empty($row['image_out'])):?>
                                        <img src="<?= base_url('assets/img/absensi/').$row['image_out'];?>"
                                            width="100px" alt="">
                                        <?php else:?>
                                        <div class="badge badge-danger">
                                            <small>Belum Absen</small>
                                        </div>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <div
                                            class="badge <?= empty($row['hour_in'] <= $row['jam_masuk']) ? 'badge-danger' : 'badge-success' ;?>">
                                            <small>
                                                <?= empty($row['hour_in'] <= $row['jam_masuk']) ? 'Terlambat '.jam_terlambat($row['jam_masuk'], $row['hour_in']) : 'Tepat Waktu' ;?></small>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php elseif(empty($absensi)):?>
            <div class="card">
                <div class="card-header">
                    <div class="font-weight-bold">Absensi Dari <?= $user_guru['name'];?>
                        <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">Maaf Data Absensi <?= $user_guru['name'];?>
                        <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?> Tidak Ditemukan</div>
                </div>
            </div>
            <?php endif;?>
            <?php endif;?>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>