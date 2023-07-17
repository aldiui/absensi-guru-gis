<?= $this->extend('template/layout_auth') ?>
<?= $this->section('content') ?>
<?php $rusak = validation_errors();?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="login-brand mb-3">
                <img src="<?= base_url();?>assets/img/<?= $setting['logo_kantor'];?>" alt="logo" width="100"
                    class="shadow-light rounded-4">
            </div>
            <div class="text-center mb-4 font-weight-bold h6"><?= $setting['name_kantor'];?></div>
            <div class="card card-info">
                <div class="card-header">
                    <div class="mx-auto font-weight-bold h6">
                        <?= $title;?>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('verify/').$email;?>" method="post" autocomplete="off">
                        <?= csrf_field();?>
                        <div class="form-group">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password"
                                class="form-control <?= !empty($rusak['password']) ? 'is-invalid' : ''; ?>"
                                name="password" id="password">
                            <small class="invalid-feedback">
                                <?= !empty($rusak['password']) ? validation_show_error('password') : ''; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                class="form-control <?= !empty($rusak['confirm']) ? 'is-invalid' : ''; ?>"
                                name="confirm" id="confirm">
                            <small class="invalid-feedback">
                                <?= !empty($rusak['confirm']) ? validation_show_error('confirm') : ''; ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; <?= date('Y');?> <?= $setting['name_aplikasi'];?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>