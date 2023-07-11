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
                    <form action="<?= base_url('operator/rekap/cari');?>" method="post">
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
                    <div class="font-weight-bold">Rekap Absensi Dari
                        <?= tanggalindo(date($tahun1.'-'.$bulan1.'-'));?>
                    </div>
                    <div class="ml-auto">
                        <a class="btn btn-danger text-white" .
                            href="<?= base_url('operator/rekap/cetak/').$bulan1.'/'.$tahun1;?>">
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
                                    <th rowspan="2" width="5%">No</th>
                                    <th rowspan="2">Nama</th>
                                    <?php for ($i=1; $i <= $days; $i++): ?>
                                    <th width="8%" colspan="2" class="text-center"><?php echo $i; ?></th>
                                    <?php endfor; ?>
                                    <th rowspan="2" width="4%">H</th>
                                    <th rowspan="2" width="4%">S</th>
                                    <th rowspan="2" width="4%">I</th>
                                    <th rowspan="2" width="4%">T</th>
                                </tr>
                                <tr>
                                    <?php for ($i=1; $i <= $days; $i++): ?>
                                    <th width="4%" class="text-center">M</th>
                                    <th width="4%" class="text-center">P</th>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($guru as $row):?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= $row['name'];?></td>
                                    <?php for ($i=1; $i <= $days; $i++): ?>
                                    <?php
                                    $cek = $getabsensi->getAbsensiByDate(date($tahun1.'-'.$bulan1.'-'.$i), $row['id']);
                                    ?>
                                    <?php if($cek):?>
                                    <td width="4%" class="text-center">
                                        <div class="text-success"><i class="fa fa-check"></i></div>
                                    </td>
                                    <?php else:?>
                                    <td width="4%" class="text-center">
                                        <div class="text-danger"><i class="fa fa-times"></i></div>
                                    </td>
                                    <?php endif;?>
                                    <?php if($cek):?>
                                    <?php if($cek['image_out']):?>
                                    <td width="4%" class="text-center">
                                        <div class="text-success"><i class="fa fa-check"></i></div>
                                    </td>
                                    <?php else:?>
                                    <td width="4%" class="text-center">
                                        <div class="text-danger"><i class="fa fa-times"></i></div>
                                    </td>
                                    <?php endif;?>
                                    <?php else:?>
                                    <td width="4%" class="text-center">
                                        <div class="text-danger"><i class="fa fa-times"></i></div>
                                    </td>
                                    <?php endif;?>
                                    <?php endfor; ?>
                                    <td><?= $getabsensi2->getHadir($row['id'], $bulan1, $tahun1);?></td>
                                    <td><?= $getizin->getUnable($row['id'], 'Sakit',$bulan1, $tahun1);?></td>
                                    <td><?= $getizin->getUnable($row['id'], 'Izin',$bulan1, $tahun1);?></td>
                                    <td><?= $getabsensi->hitungKeterlambatan($row['id'], $bulan1, $tahun1);?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div>Keterangan :</div>
                    <ul>
                        <li>M = Absen Masuk</li>
                        <li>P = Absen Pulang</li>
                        <li><i class="fa fa-check text-success"></i> = Hadir</li>
                        <li><i class="fa fa-times text-danger"></i> = Tidak Hadir</li>
                        <li>H = Hadir</li>
                        <li>S = Sakit</li>
                        <li>I = Izin</li>
                        <li>T = Telat</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>