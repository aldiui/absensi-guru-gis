<?= $this->extend('template/layout_admin') ?>
<?= $this->section('content') ?>
<?php $rusak = validation_errors();?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title;?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-map-pin"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jabatan</h4>
                            </div>
                            <div class="card-body">
                                <?= $jabatan;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Guru Tetap</h4>
                            </div>
                            <div class="card-body">
                                <?= $gty;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Guru Tidak Tetap</h4>
                            </div>
                            <div class="card-body">
                                <?= $gtty;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Operator</h4>
                            </div>
                            <div class="card-body">
                                <?= $operator;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Penggajian <?= date('Y');?></h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
var ctx = document.getElementById("myChart2").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ],
        datasets: [{
            label: 'Data Penggajian',
            data: [
                <?php for ($i = 1; $i <= 12; $i++) {
                    echo $penggajian->getSum($i, date('Y')). ",";
                } ?>
            ],
            borderWidth: 2,
            backgroundColor: '#63ed7a',
            borderColor: '#63ed7a',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
        }]
    },
});
</script>
<?= $this->endSection('content') ?>