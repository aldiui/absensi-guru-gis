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
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($jadwal as $row):?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><img src="<?= base_url();?>assets/img/user/<?= $row['image'];?>" width="120px">
                                    </td>
                                    <td><?= $row['name'];?></td>
                                    <td><?= $row['name_jabatan'];?> (<?= $row['akronim'];?>)</td>
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                <a class="btn btn-info btn-sm mr-1"
                                                    href="<?= base_url("operator/jadwal/create/").$row["id"];?>">
                                                    <i class="fas fa-calendar mr-1"></i>
                                                    <span>
                                                        Jadwal
                                                    </span>
                                                </a>
                                            </div>
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
<?= $this->endSection('content') ?>