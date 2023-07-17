<?= $this->extend('template/layout_admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title;?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <div class="font-weight-bold">Data <?= $title;?></div>
                    <div class="ml-auto">
                        <a class="btn btn-primary" href="<?= base_url("operator/karyawan/create");?>">
                            <i class="fas fa-plus mr-2"></i>Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($karyawan as $row):?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><img src="<?= base_url();?>assets/img/user/<?= $row['image'];?>" width="120px">
                                    </td>
                                    <td><?= $row['name'];?></td>
                                    <td><?= $row['name_jabatan'];?> (<?= $row['akronim'];?>)</td>
                                    <td><?= $row['role'];?></td>
                                    <td>
                                        <?php if($row['is_active'] == 1):?>
                                        <div class="badge bg-success text-white">Aktif</div>
                                        <?php else:?>
                                        <div class="badge bg-danger text-white">Tidak Aktif</div>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                <a class="btn btn-warning btn-sm mr-1"
                                                    href="<?= base_url("operator/karyawan/edit/").$row["id"];?>">
                                                    <i class="fas fa-edit mr-1"></i>
                                                    <span>
                                                        Edit
                                                    </span>
                                                </a>
                                            </div>
                                            <div>
                                                <button class="btn btn-danger btn-sm"
                                                    data-confirm="Hapus Data|Apakah anda yakin ingin menghapus data <?= $row['name'];?> ini ?"
                                                    data-confirm-yes="window.location.href='<?= base_url("operator/karyawan/delete/").$row["id"];?>'">
                                                    <i class="fas fa-trash mr-1"></i>Hapus
                                                </button>
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