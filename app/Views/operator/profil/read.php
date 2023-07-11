h<?= $this->extend('template/layout_admin') ?>
<?= $this->section('content') ?>
<?php $rusak = validation_errors();?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">Biodata</div>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="<?= base_url();?>assets/img/user/<?= $user['image'];?>"
                                        class="img-fluid mb-2" alt="" width="150px">
                                    <div class="font-weight-bold"><?= $user['name'];?></div>
                                    <small><?= $user['name_jabatan'];?> (<?= $user['akronim'];?>)</small>
                                    <div>
                                        <small><?= $user['email'];?> | <?= $user['phone'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold"><?= $title; ?></div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                    <?= csrf_field();?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="image" class="form-label">Foto</label>
                                                <input type="file" name="image" id="image" class="dropify">
                                                <small class="text-danger">
                                                    <?= !empty($rusak['image']) ? validation_show_error('image') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text"
                                                    class="form-control <?= !empty($rusak['name']) ? 'is-invalid' : ''; ?>"
                                                    name="name" id="name" value="<?= $user['name'];?>">
                                                <small class="invalid-feedback">
                                                    <?= !empty($user['name']) ? validation_show_error('name') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    value="<?= $user['email'];?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">No Handphone</label>
                                                <input type="text"
                                                    class="form-control <?= !empty($rusak['phone']) ? 'is-invalid' : ''; ?>"
                                                    name="phone" id="phone" value="<?= $user['phone'];?>">
                                                <small class="invalid-feedback">
                                                    <?= !empty($rusak['phone']) ? validation_show_error('phone') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea name="alamat"
                                                    class="form-control <?= !empty($rusak['alamat']) ? 'is-invalid' : ''; ?>"><?= $user['address'];?></textarea>
                                                <small class="invalid-feedback">
                                                    <?= !empty($rusak['alamat']) ? validation_show_error('alamat') : ''; ?>
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
                        <div class="card">
                            <div class="card-header">
                                <div class="font-weight-bold">Ubah Password</div>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('operator/profil/changepassword/');?>" method="post"
                                    autocomplete="off">
                                    <?= csrf_field();?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="old" class="form-label">Password Lama</label>
                                                <input type="password"
                                                    class="form-control <?= !empty($rusak['old']) ? 'is-invalid' : ''; ?>"
                                                    name="old" id="old">
                                                <small class="invalid-feedback">
                                                    <?= !empty($rusak['old']) ? validation_show_error('old') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password Baru</label>
                                                <input type="password"
                                                    class="form-control <?= !empty($rusak['password']) ? 'is-invalid' : ''; ?>"
                                                    name="password" id="password">
                                                <small class="invalid-feedback">
                                                    <?= !empty($rusak['password']) ? validation_show_error('password') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12">
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
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>