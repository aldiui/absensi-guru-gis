<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi
        <?= $user_guru['name'].' '.tanggalindo(date($tahun.'-'.$bulan.'-'));?></title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" />

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
    @page {
        size: A4 landscape;
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
                            <img src="<?= generateBase64Image($setting['path'].$setting['logo_kantor']);?>"
                                width="100px" alt="">
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
                <u class="fw-bold uppercase">Laporan Absensi
                    <?= $user_guru['name'].' '.tanggalindo(date($tahun.'-'.$bulan.'-'));?></u>
            </center>
            <br>
            <table>
                <tr>
                    <td rowspan="4">
                        <div>
                            <img src="<?= generateBase64Image($setting['path'].'user/'.$user_guru['image']);?>"
                                width="100px" alt="">
                        </div>
                    </td>
                    <td width="150px">Nama</td>
                    <td>:</td>
                    <td><?= $user_guru['name'];?></td>
                </tr>
                <tr>
                    <td width="150px">Jabatan</td>
                    <td>:</td>
                    <td><?= $user_guru['name_jabatan'];?> (<?= $user_guru['akronim'];?>)</td>
                </tr>
                <tr>
                    <td width="150px">No Handphone</td>
                    <td>:</td>
                    <td><?= $user_guru['phone'];?></td>
                </tr>
                <tr>
                    <td width="150px">Email</td>
                    <td>:</td>
                    <td><?= $user_guru['email'];?></td>
                </tr>
            </table>
            <br>
            <table width="100%" border="1" cellpadding="1.5" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Foto</th>
                        <th>Jam Keluar</th>
                        <th>Foto</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody align="center" valign="top">
                    <?php $no = 1;?>
                    <?php foreach ($absensi as $row):?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= tanggalindo($row['date']);?></td>
                        <td>
                            <div>
                                <small><?= empty($row['image_in']) ? 'Belum Absen' : $row['hour_in'] ;?></small>
                            </div>
                        </td>
                        <td>
                            <?php if(!empty($row['image_in'])):?>
                            <img src="<?= generateBase64Image($setting['path'].'absensi/'.$row['image_in']);?>"
                                width="100px" alt="">
                            <?php else:?>
                            Belum Absen
                            <?php endif;?>
                        </td>
                        <td>
                            <div>
                                <small><?= empty($row['image_out']) ? 'Belum Absen' : $row['hour_out'] ;?></small>
                            </div>
                        </td>
                        <td>
                            <?php if(!empty($row['image_out'])):?>
                            <img src="<?= generateBase64Image($setting['path'].'absensi/'.$row['image_out']);?>"
                                width="100px" alt="">
                            <?php else:?>
                            Belum Absen
                            <?php endif;?>
                        </td>
                        <td>
                            <div
                                class="badge <?= empty($row['hour_in'] <= $row['jam_masuk']) ? 'badge-danger' : 'badge-success' ;?>">
                                <small>
                                    <?= empty($row['hour_in'] <= $row['jam_masuk']) ? 'Terlambat '.jam_terlambat($row['jam_masuk'], $row['hour_in']) : 'Tepat Waktu' ;?></small>
                            </div>
                        </td>
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
        </article>
    </section>
</body>

</html>