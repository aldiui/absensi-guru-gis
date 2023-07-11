<?php

function selamat($data)
{
    if ($data >= 00 && $data <= 04) {
        echo "Selamat Malam,";
        return;
    } elseif ($data >= 04 && $data <= 10) {
        echo "Selamat Pagi,";
        return;
    } elseif ($data >= 10 && $data <= 15) {
        echo "Selamat Siang,";
        return;
    } elseif ($data >= 15 && $data <= 18) {
        echo "Selamat Sore,";
        return;
    } else {
        echo "Selamat Malam,";
        return;
    }
}

function hari($hari)
{
    if ($hari == "Sun") {
        return "Minggu, ";
    } elseif ($hari == "Mon") {
        return "Senin, ";
    } elseif ($hari == "Tue") {
        return "Selasa, ";
    } elseif ($hari == "Wed") {
        return "Rabu, ";
    } elseif ($hari == "Thu") {
        return "Kamis, ";
    } elseif ($hari == "Fri") {
        return "Jum'at, ";
    } elseif ($hari == "Sat") {
        return "Sabtu, ";
    } else {
        return "";
    }
}

function hari2($hari)
{
    if ($hari == "Sun") {
        return "Minggu";
    } elseif ($hari == "Mon") {
        return "Senin";
    } elseif ($hari == "Tue") {
        return "Selasa";
    } elseif ($hari == "Wed") {
        return "Rabu";
    } elseif ($hari == "Thu") {
        return "Kamis";
    } elseif ($hari == "Fri") {
        return "Jum'at";
    } elseif ($hari == "Sat") {
        return "Sabtu";
    } else {
        return "";
    }
}


function generateBase64Image($imagePath)
{
    $data = file_get_contents($imagePath);
    $type = pathinfo($imagePath, PATHINFO_EXTENSION);
    $base64Image = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64Image;
}


function tanggalIndo($string)
{
    $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober',
    'November', 'Desember'];

    $tanggal = explode("-", $string)[2];
    $bulan = explode("-", $string)[1];
    $tahun = explode("-", $string)[0];
    if ($tanggal != null) {
        $day = hari(date("D", strtotime($string)));
        return $day . $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
    } else {
        return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
    }
}

function tanggalIndo2($string)
{
    $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober',
    'November', 'Desember'];

    $tanggal = explode("-", $string)[2];
    $bulan = explode("-", $string)[1];
    $tahun = explode("-", $string)[0];
    if ($tanggal != null) {
        return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
    } else {
        return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
    }
}

function uri($segment)
{
    $uri = service('uri');
    return $uri->getSegment($segment);
}

function jam_terlambat($jam_masuk, $jam_absen)
{
    $jam_masuk_timestamp = strtotime($jam_masuk);
    $jam_absen_timestamp = strtotime($jam_absen);
    $selisih_waktu = $jam_absen_timestamp - $jam_masuk_timestamp;
    $selisih_detik = abs($selisih_waktu);
    $selisih_menit = floor($selisih_detik / 60);
    $selisih_detik = $selisih_detik % 60;
    $selisih_jam = floor($selisih_menit / 60);
    $selisih_menit = $selisih_menit % 60;

    if ($selisih_jam > 0 && $selisih_menit > 0) {
        return sprintf('%d jam %d menit', $selisih_jam, $selisih_menit);
    } elseif ($selisih_jam > 0 && $selisih_menit == 0) {
        return sprintf('%d jam', $selisih_jam);
    } elseif ($selisih_jam == 0 && $selisih_menit > 0) {
        return sprintf('%d menit', $selisih_menit);
    }
}