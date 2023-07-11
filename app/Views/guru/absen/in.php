<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>
<style>
#my_camera,
#my_camera video {
    display: inline-block;
    width: 100% !important;
    margin: auto;
    height: auto !important;
    border-radius: 20px;
}
</style>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column">
                                <div class="font-weight-bold"><?= $title; ?></div>
                                <div>
                                    <small><?= tanggalIndo(date("Y-m-d"));?> | <span id="jam"></span>
                                    </small>
                                </div>
                                <?php if($jadwal != null):
                                    $now = date('H:i:s');
                                    $jam_masuk = strtotime($jadwal['jam_masuk']);
                                    $jam_keluar = strtotime($jadwal['jam_keluar']);
                                    $time_absen =  date('H:i:s', strtotime('-'.$setting['sebelum_masuk'].'minutes', $jam_masuk));  
                                    $time_pulang =  date('H:i:s', $jam_keluar);  
                                ?>
                                <div class="text-center">
                                    <small>Waktu Absensi masuk anda dari jam <?= $time_absen;?> -
                                        <?= $jadwal['jam_masuk'];?>
                                    </small>
                                    <small class="d-block">
                                        Terlambat maximal sampai jam
                                        <?= $time_pulang;?>
                                    </small>
                                </div>
                                <div>
                                    <small>Lebih dari waktu yang ditentukan anda terlambat
                                    </small>
                                </div>
                                <?php else:?>
                                <div>
                                    <small>Maaf pada <?= tanggalIndo(date('Y-m-d'));?> anda tidak ada jadwal
                                    </small>
                                </div>
                                <?php endif;?>
                            </div>
                            <div class="card-body">
                                <?php if($jadwal != null):?>
                                <?php if($now >= $time_absen && $now <= $time_pulang):?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div id="my_camera">
                                        </div>
                                        <div class="my-2">
                                            <button type="button" class="btn btn-success btn-block" id="TakeCapture">
                                                <i class="fas fa-camera mr-2"></i><?= $title;?>
                                            </button>
                                            <input type="hidden" name="lokasi" id="lokasi" class="form-control mt-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="map" style="height: 500px; width: 100%;"></div>
                                    </div>
                                </div>
                                <?php endif;?>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url();?>assets/js/absen.js"></script>
<script>
<?php if($jadwal != null): ?>
<?php if($now >= $time_absen && $now <= $time_pulang):?>
Webcam.set({
    width: 420,
    height: 420,
    image_format: 'jpeg',
    jpeg_quality: 90,
});
Webcam.attach('#my_camera');

if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
} else {
    alert("Geolocation is not supported by this browser.");
}

function showPosition(position) {
    var x = document.getElementById("lokasi");
    x.value = position.coords.latitude + ", " + position.coords.longitude;

    var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([position.coords.latitude, position.coords.longitude]).addTo(map)
        .bindPopup('Anda di sini').openPopup();

    var kantor = "<?= $setting['name_kantor'];?>";
    L.marker([<?= $setting['lat'];?>, <?= $setting['long'];?>]).addTo(map)
        .bindPopup(kantor).openPopup();

    var circle = L.circle([<?= $setting['lat'];?>, <?= $setting['long'];?>], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: <?= $setting['radius'];?>
    }).addTo(map);
}

var successSound = new Audio('/assets/sound/masuk.mp3');
var errorSound = new Audio('/assets/sound/gagal.mp3');
var errorSound2 = new Audio('/assets/sound/errorlokasi.mp3');
var errorSound3 = new Audio('/assets/sound/errorlokasi2.mp3');


$('#TakeCapture').on('click', function(e) {
    Webcam.snap(function(data_uri) {
        image = data_uri;
        lokasi = $('#lokasi').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('absensi/masuk');?>',
            data: {
                image,
                lokasi,
            },
            success: function(response) {
                var status = response.split("|");
                if (status[0] == 'success') {
                    successSound.play();
                    $('#TakeCapture').prop('disabled', true);
                    swal({
                        title: "Berhasil",
                        text: status[1],
                        icon: "success"
                    }).then(() => {
                        window.location.href = "/home";
                    });
                } else if (status[0] == 'error1') {
                    errorSound2.play();
                    swal({
                        title: "Gagal",
                        text: status[1],
                        icon: "error"
                    })
                } else if (status[0] == 'error2') {
                    errorSound3.play();
                    swal({
                        title: "Gagal",
                        text: status[1],
                        icon: "error"
                    })
                }
            },
            error: function(xhr, status, error) {
                errorSound.play();
                console.error(xhr.responseText);
                swal("Gagal", "Maaf Gagal Absensi, Hubungi Operator", "error");
            }
        });
    });
});
<?php endif;?>
<?php endif;?>
</script>
<?= $this->endSection('content') ?>