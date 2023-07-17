<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rekap Absensi
        <?= tanggalindo(date($tahun.'-'.$bulan.'-'));?>
    </title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" />

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
    @page {
        size: legal landscape;
    }

    * {
        line-height: 1.5;
        font-size: 12px;
    }

    hr {
        padding-top: 1.5;
        padding-bottom: 1.5;
        border-top: 2px solid black;
    }

    .fs-16 {
        font-size: 16px;
    }

    .fw-bold {
        font-weight: bold;
    }

    .uppercase {
        text-transform: uppercase;
    }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 landscape">
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">
        <!-- Write HTML just like a web page -->
        <article>
            <table align="center" width="100%">
                <tr>
                    <td width="100px">
                        <div>
                            <img src="<?= generateBase64Image($setting['path'].$setting['logo_kantor']);?>" width="70px"
                                alt="">
                        </div>
                    </td>
                    <td>
                        <center>
                            <div class="fs-16 fw-bold uppercase"><?= $setting['name_kantor'];?></div>
                            <i><?= $setting['address'];?></i>
                        </center>
                    </td>
            </table>
            <hr>
            <br>
            <center>
                <u class="fw-bold uppercase">Laporan Rekap Absensi
                    <?= tanggalindo(date($tahun.'-'.$bulan.'-'));?></u>
            </center>
            <br>
            <table width="100%" border="1" cellpadding="1.5" cellspacing="0">
                <thead align="center">
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <?php for ($i=1; $i <= $days; $i++): ?>
                        <th width="8%" colspan="2"><?php echo $i; ?></th>
                        <?php endfor; ?>
                        <th rowspan="2">H</th>
                        <th rowspan="2">S</th>
                        <th rowspan="2">I</th>
                        <th rowspan="2">T</th>
                    </tr>
                    <tr>
                        <?php for ($i=1; $i <= $days; $i++): ?>
                        <th>M</th>
                        <th>P</th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    <?php foreach ($guru as $row):?>
                    <tr>
                        <td align="center"><?= $no++;?></td>
                        <td><?= $row['name'];?></td>
                        <?php for ($i=1; $i <= $days; $i++): ?>
                        <?php
                        $cek = $getabsensi->getAbsensiByDate(date($tahun.'-'.$bulan.'-'.$i), $row['id']);
                            ?>
                        <?php if($cek):?>
                        <td align="center" style="color: green;">
                            V
                        </td>
                        <?php else:?>
                        <td align="center" style="color: red;">
                            X
                        </td>
                        <?php endif;?>
                        <?php if($cek):?>
                        <?php if($cek['image_out']):?>
                        <td align="center" style="color: green;">
                            V
                        </td>
                        <?php else:?>
                        <td align="center" style="color: red;">
                            X
                        </td>
                        <?php endif;?>
                        <?php else:?>
                        <td align="center" style="color: red;">
                            X
                        </td>
                        <?php endif;?>
                        <?php endfor; ?>
                        <td align="center"><?= $getabsensi2->getHadir($row['id'], $bulan, $tahun);?></td>
                        <td align="center"><?= $getizin->getUnable($row['id'], 'Sakit',$bulan, $tahun);?></td>
                        <td align="center"><?= $getizin->getUnable($row['id'], 'Izin',$bulan, $tahun);?></td>
                        <td align="center"><?= $getabsensi->hitungKeterlambatan($row['id'], $bulan, $tahun);?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td></td>
                    <td width="200px" align="center">
                        <div>Tasikmalaya, <?= tanggalindo2(date('Y-m-d'));?></div>
                        <div><?= $setting['jabatan_ttd'];?>,</div>
                        <br>
                        <img src="<?= generateBase64Image($setting['path'].$setting['image_ttd']);?>" width="200px"
                            alt="">
                        <br>
                        <div><?= $setting['name_ttd'];?></div>
                    </td>
                </tr>
            </table>
            <div>Keterangan :</div>
            <ul>
                <li>M = Absen Masuk</li>
                <li>P = Absen Pulang</li>
                <li><span style="color: green;">V</span> = Hadir</li>
                <li><span style="color: red;">X</span> = Tidak Hadir</li>
                <li>H = Hadir</li>
                <li>S = Sakit</li>
                <li>I = Izin</li>
                <li>T = Telat</li>
            </ul>
        </article>
    </section>
</body>

</html>