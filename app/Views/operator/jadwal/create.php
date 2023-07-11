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
                    <div class="font-weight-bold">Data <?= $title;?> <?=  $jadwal['name'];?></div>
                </div>
                <div class="card-body">
                    <?php if($create == "Submit"):?>
                    <form action="<?= base_url('operator/jadwal/save');?>" method="POST">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Hari</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Jam Mengajar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <input type="hidden" name="user_id" value="<?= $jadwal['id'];?>">
                                <tbody>
                                    <?php $no = 1;?>
                                    <?php foreach ($hari as $row):?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td>
                                            <?= hari2($row);?>
                                            <input type="hidden" name="hari[]" id="hari" class="form-control"
                                                value="<?= $row;?>">
                                        </td>
                                        <td>
                                            <input type="time" name="jam_masuk[]" id="jam_masuk" class="form-control">
                                        </td>
                                        <td>
                                            <input type="time" name="jam_keluar[]" id="jam_keluar" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="jam_mengajar[]" id="jam_mengajar"
                                                class="form-control">
                                        </td>
                                        <td>
                                            <select name="status[]" id="status" class="form-control">
                                                <?php foreach ($status as $s):?>
                                                <option value="<?= $s;?>"><?= $s;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php elseif($create == "Update"):?>
                    <form action="<?= base_url('operator/jadwal/update');?>" method="POST">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Hari</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Jam Mengajar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <input type="hidden" name="user_id" value="<?= $jadwal['id'];?>">
                                <tbody>
                                    <?php $no = 1;?>
                                    <?php foreach ($hari as $row):?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td>
                                            <?= hari2($row['hari']);?>
                                            <input type="hidden" name="hari[]" id="hari" class="form-control"
                                                value="<?= $row['hari'];?>">
                                        </td>
                                        <td>
                                            <input type="time" name="jam_masuk[]" id="jam_masuk"
                                                value="<?= $row['jam_masuk'];?>" class="form-control">
                                        </td>
                                        <td>
                                            <input type="time" name="jam_keluar[]" id="jam_keluar"
                                                value="<?= $row['jam_keluar'];?>" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="jam_mengajar[]" id="jam_mengajar"
                                                value="<?= $row['jam_mengajar'];?>" class="form-control">
                                        </td>
                                        <td>
                                            <select name="status[]" id="status" class="form-control">
                                                <?php foreach ($status as $s):?>
                                                <?php if($s == $row['status']):?>
                                                <option value="<?= $s;?>" selected><?= $s;?></option>
                                                <?php else:?>
                                                <option value="<?= $s;?>"><?= $s;?></option>
                                                <?php endif;?>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>