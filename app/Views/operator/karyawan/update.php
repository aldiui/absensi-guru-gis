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
                    <div class="font-weight-bold"><?= $title;?></div>
                </div>
                <div class="card-body">
                    <form action="" method="post" autocomplete="off">
                        <?= csrf_field();?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text"
                                        class="form-control <?= !empty($rusak['name']) ? 'is-invalid' : ''; ?>"
                                        name="name" id="name" value="<?= old('name', $karyawan['name']);?>">
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['name']) ? validation_show_error('name') : ''; ?>
                                    </small>
                                </div>
                            </div>
                            <div class=" col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email"
                                        class="form-control <?= !empty($rusak['email']) ? 'is-invalid' : ''; ?>"
                                        name="email" id="email" value="<?= old('email', $karyawan['email']);?>">
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['email']) ? validation_show_error('email') : ''; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">No Handphone</label>
                                    <input type="text"
                                        class="form-control <?= !empty($rusak['phone']) ? 'is-invalid' : ''; ?>"
                                        name="phone" id="phone" value="<?= old('phone', $karyawan['phone']);?>">
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['phone']) ? validation_show_error('phone') : ''; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select name="jabatan" id="jabatan"
                                        class="form-control <?= !empty($rusak['jabatan']) ? 'is-invalid' : ''; ?>">
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php foreach($jabatan as $row):?>
                                        <?php if($row['id'] ==  old('jabatan', $karyawan['jabatan_id'])):?>
                                        <option value="<?= $row['id'];?>" selected><?= $row['akronim'];?> -
                                            <?= $row['name_jabatan'];?>
                                        </option>
                                        <?php else:?>
                                        <option value="<?= $row['id'];?>"><?= $row['akronim'];?> -
                                            <?= $row['name_jabatan'];?>
                                        </option>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['jabatan']) ? validation_show_error('jabatan') : ''; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role"
                                        class="form-control <?= !empty($rusak['role']) ? 'is-invalid' : ''; ?>">
                                        <option value="">-- Pilih Role --</option>
                                        <?php foreach($role as $row):?>
                                        <?php if($row ==  old('role',$karyawan['role'])):?>
                                        <option value="<?= $row;?>" selected><?= $row;?>
                                        </option>
                                        <?php else:?>
                                        <option value="<?= $row;?>"><?= $row;?>
                                        </option>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['role']) ? validation_show_error('role') : ''; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                        <label
                                            class="btn btn-lg btn-outline-success w-50 <?= (old('status', $karyawan['is_active']) == 1) ? "active" : ""; ?>">
                                            <input type="radio" name="status" value="1"
                                                <?= (old('status', $karyawan['is_active']) == 1) ? "checked active" : ""; ?>>
                                            Aktif
                                        </label>
                                        <label
                                            class="btn btn-lg btn-outline-danger w-50 <?= (old('status', $karyawan['is_active']) == 0) ? "active" : ""; ?>">
                                            <input type="radio" name="status" value="0"
                                                <?= (old('status', $karyawan['is_active']) == 0) ? "active" : ""; ?>>
                                            Tidak Aktif
                                        </label>
                                    </div>
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['status']) ? validation_show_error('status') : ''; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat"
                                        class="form-control <?= !empty($rusak['alamat']) ? 'is-invalid' : ''; ?>"><?= old('alamat',$karyawan['alamat']);?></textarea>
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['alamat']) ? validation_show_error('alamat') : ''; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <a href="<?= base_url('operator/karyawan');?>" class="btn btn-info">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="font-weight-bold">Ubah Password</div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('operator/karyawan/changepassword/').$karyawan['id'];?>" method="post"
                        autocomplete="off">
                        <?= csrf_field();?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control <?= !empty($rusak['password']) ? 'is-invalid' : ''; ?>"
                                        name="password" id="password">
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['password']) ? validation_show_error('password') : ''; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="confirm" class="form-label">Konfirmasi Password</label>
                                    <input type="password"
                                        class="form-control <?= !empty($rusak['confirm']) ? 'is-invalid' : ''; ?>"
                                        name="confirm" id="confirm">
                                    <small class="invalid-feedback">
                                        <?= !empty($rusak['confirm']) ? validation_show_error('confirm') : ''; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>