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
                    <form action="" method="POST">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Hari</th>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" id="select-all" class="form-check-input">
                                                <label class="form-check-label" for="select-all">Pilih Semua</label>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
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
                                            <?php
                                            $checkData = $jadwal->where('hari', $row)->countAllResults();
                                            $checkLibur = $jadwal->where(['hari' => $row, 'status' => 0])->countAllResults();
                                            ?>
                                            <div class="form-check">
                                                <input type="checkbox" name="libur[]" id="libur<?= $no?>" value="0"
                                                    class="form-check-input"
                                                    <?= ($checkData === $checkLibur) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="libur<?= $no?>">Libur</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.getElementById('select-all').addEventListener('change', function(e) {
    var checkboxes = document.getElementsByName('libur[]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = e.target.checked;
    }
});
</script>

<?= $this->endSection('content') ?>