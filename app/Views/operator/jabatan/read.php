<?= $this->extend('template/layout_admin') ?>
<?= $this->section('content') ?>
<?php $rusak = validation_errors();?>
</script>
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#add">
                            <i class="fas fa-plus mr-2"></i>Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Singkatan</th>
                                    <th>Nama Jabatan</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($jabatan as $row):?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= $row['akronim'];?></td>
                                    <td><?= $row['name_jabatan'];?></td>
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                <button class="btn btn-warning btn-sm mr-1" data-toggle="modal"
                                                    data-target="#edit<?= $row["id"];?>">
                                                    <i class="fas fa-edit mr-1"></i>
                                                    <span>
                                                        Edit
                                                    </span>
                                                </button>
                                            </div>
                                            <div>
                                                <button class="btn btn-danger btn-sm"
                                                    data-confirm="Hapus Data|Apakah anda yakin ingin menghapus data <?= $row['name_jabatan'];?> ini ?"
                                                    data-confirm-yes="window.location.href='<?= base_url("operator/jabatan/delete/").$row["id"];?>'">
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
    <div class="modal fade" tabindex="-1" role="dialog" id="add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="" autocomplete="off">
                    <?= csrf_field();?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="singkatan" class="form-label">Singkatan</label>
                            <input type="text"
                                class="form-control <?= !empty($rusak['singkatan']) ? 'is-invalid' : ''; ?>"
                                id="singkatan" name="singkatan" autofocus value="<?= old('singkatan'); ?>">
                            <small class="invalid-feedback">
                                <?= !empty($rusak['singkatan']) ? validation_show_error('singkatan') : ''; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="jabatan" class="form-label">Nama Jabatan</label>
                            <input type="text"
                                class="form-control  <?= !empty($rusak['jabatan']) ? 'is-invalid' : ''; ?>" id="jabatan"
                                name="jabatan" autofocus value="<?= old('jabatan'); ?>">
                            <small class="invalid-feedback">
                                <?= !empty($rusak['jabatan']) ? validation_show_error('jabatan') : ''; ?>
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php foreach($jabatan as $row):?>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit<?= $row["id"];?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url("operator/jabatan/update/").$row["id"];?>" autocomplete="off">
                    <div class="modal-body">
                        <?= csrf_field();?>
                        <div class="form-group">
                            <label for="singkatan1" class="form-label">Singkatan</label>
                            <input type="text"
                                class="form-control <?= !empty($rusak['singkatan1']) ? 'is-invalid' : ''; ?>"
                                id="singkatan1" name="singkatan1" autofocus
                                value="<?= old("singkatan1", $row['akronim']); ?>">
                            <small class="invalid-feedback">
                                <?= !empty($rusak['singkatan1']) ? validation_show_error('singkatan1') : ''; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="jabatan1" class="form-label">Nama Jabatan</label>
                            <input type="text"
                                class="form-control <?= !empty($rusak['jabatan1']) ? 'is-invalid' : ''; ?>"
                                id="jabatan1" name="jabatan1" autofocus
                                value="<?= old("jabatan1", $row['name_jabatan']); ?>">
                            <small class="invalid-feedback">
                                <?= !empty($rusak['jabatan1']) ? validation_show_error('jabatan1') : ''; ?>
                            </small>
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
</div>
<?= $this->endSection('content') ?>