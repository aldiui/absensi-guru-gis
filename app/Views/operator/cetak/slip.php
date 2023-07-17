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
        size: A4;
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
            <?php foreach ($penggajian as $row):?>
            <table align="center" width="100%" heigh="50vh">
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
                <u class="fw-bold uppercase">Slip Gaji <?= $row['name'];?>
                    <?= tanggalindo(date($tahun.'-'.$bulan.'-'));?></u>
            </center>
            <table>
                <tr>
                    <td width="150px">Nama</td>
                    <td>:</td>
                    <td><?= $row['name'];?></td>
                </tr>
                <tr>
                    <td width="150px">Jabatan</td>
                    <td>:</td>
                    <td><?= $row['name_jabatan'];?></td>
                </tr>
                <tr>
                    <td width="150px">Gaji Pokok</td>
                    <td>:</td>
                    <td><?= rupiah($row['gaji_pokok']);?></td>
                </tr>
                <tr>
                    <td width="150px">Tunjangan</td>
                    <td>:</td>
                    <td><?= rupiah($row['tunjangan']);?></td>
                </tr>
                <tr>
                    <td width="150px">Lain - lain</td>
                    <td>:</td>
                    <td><?= rupiah($row['lain_lain']);?></td>
                </tr>
                <tr>
                    <td width="150px">Total</td>
                    <td>:</td>
                    <td><?= rupiah($row['total']);?></td>
                </tr>
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
            <br>
            <?php endforeach;?>
        </article>
    </section>
</body>

</html>