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
                    <div class="font-weight-bold">Data <?= $title; ?></div>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url("operator/monitoring/cari");?>" autocomplete="off">
                        <?= csrf_field();?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="bulan" class="form-label">Tanggal</label>
                                    <input type="date"
                                        class="form-control <?= !empty($rusak['tanggal']) ? 'is-invalid' : ''; ?>"
                                        name="tanggal" id="tanggal" value="<?= old('tanggal', $tanggal);?>">
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['tanggal']) ? validation_show_error('tanggal') : ''; ?>
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
                    <div class="font-weight-bold">Rekap Data <?= $title;?> <?= tanggalindo($tanggal);?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Jam Masuk</th>
                                    <th>Foto</th>
                                    <th>Jam Keluar</th>
                                    <th>Foto</th>
                                    <th>Keterangan</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($monitoring as $row):?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= $row['name'];?></td>
                                    <td><?= $row['name_jabatan'];?> (<?= $row['akronim'];?>)</td>
                                    <td>
                                        <div
                                            class="badge <?= empty($row['image_in']) ? 'badge-danger' : 'badge-success' ;?>">
                                            <small><?= empty($row['image_in']) ? 'Belum Absen' : $row['hour_in'] ;?></small>
                                        </div>
                                    </td>
                                    <td><img src="<?= base_url('assets/img/absensi/').$row['image_in'];?>" width="100px"
                                            alt=""></td>
                                    <td>
                                        <div
                                            class="badge <?= empty($row['image_out']) ? 'badge-danger' : 'badge-success' ;?>">
                                            <small><?= empty($row['image_out']) ? 'Belum Absen' : $row['hour_out'] ;?></small>
                                        </div>
                                    </td>
                                    <td><img src="<?= base_url('assets/img/absensi/').$row['image_out'];?>"
                                            width="100px" alt=""></td>
                                    <td>
                                        <div
                                            class="badge <?= empty($row['hour_in'] <= $row['jam_masuk']) ? 'badge-danger' : 'badge-success' ;?>">
                                            <small>
                                                <?= empty($row['hour_in'] <= $row['jam_masuk']) ? 'Terlambat '.jam_terlambat($row['jam_masuk'], $row['hour_in']) : 'Tepat Waktu' ;?></small>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit<?= $row["id"];?>">
                                                <i class="fas fa-map mr-1"></i>
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
<?php foreach($monitoring as $row):?>
<div class="modal fade" tabindex="-1" role="dialog" id="edit<?= $row["id"];?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lokasi Presensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="map<?= $row["id"];?>" style="height: 200px; width: 100%;"></div>
                <script>
                var map<?= $row["id"];?> = L.map('map<?= $row["id"];?>').setView([<?= $setting['lat'];?>,
                    <?= $setting['long'];?>
                ], 13);
                var titleMap<?= $row["id"];?> = "<?= $row['name'];?>";

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map<?= $row["id"];?>);

                L.marker([<?= $row["location_in"];?>]).addTo(map<?= $row["id"];?>)
                    .bindPopup(titleMap<?= $row["id"];?>).openPopup();

                var circle = L.circle([<?= $setting['lat'];?>, <?= $setting['long'];?>], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: <?= $setting['radius'];?>
                }).addTo(map);
                </script>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
<?= $this->endSection('content') ?>