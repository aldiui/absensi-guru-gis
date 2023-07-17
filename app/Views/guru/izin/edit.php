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
                                <div class="font-weight-bold">Edit Permohonan <?= $title; ?></div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                    <?= csrf_field();?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="date" class="form-label">Tanggal</label>
                                                <input type="date"
                                                    class="form-control <?= !empty($rusak['date']) ? 'is-invalid' : ''; ?>"
                                                    name="date" id="date" value="<?= old('date', $izin['date']);?>">
                                                <small class="invalid-feedback">
                                                    <?= !empty($rusak['date']) ? validation_show_error('date') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" id="status"
                                                    class="form-control <?= !empty($rusak['status']) ? 'is-invalid' : ''; ?>">
                                                    <option value="">-- Pilih status --</option>
                                                    <?php foreach($status as $row):?>
                                                    <?php if($row ==  old('status', $izin['status'])):?>
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
                                                    <?= !empty($rusak['status']) ? validation_show_error('status') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <textarea name="keterangan" id="keterangan"
                                                    class="form-control <?= !empty($rusak['keterangan']) ? 'is-invalid' : ''; ?>"><?= old('keterangan', $izin['keterangan']);?></textarea>
                                                <small class="invalid-feedback">
                                                    <?= !empty($rusak['keterangan']) ? validation_show_error('keterangan') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="image" class="form-label">Foto Bukti Izin dan Sakit
                                                        </label>
                                                        <input type="file" name="image" id="image" class="dropify"
                                                            data-default-file="<?= base_url();?>assets/img/izin/<?= $izin['image'];?>">
                                                        <small class="text-danger">
                                                            <?= !empty($rusak['image']) ? validation_show_error('image') : ''; ?>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary">Update</button>
                                        <a href="<?= base_url('izin');?>" class="btn btn-info">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>