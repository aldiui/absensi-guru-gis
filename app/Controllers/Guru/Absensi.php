<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;

class Absensi extends BaseController
{
    public function index()
    {
        $cekAbsensi = $this->AbsensiModel->getAbsensi();
        $data['setting'] = $this->PengaturanModel->find(1);
        if ($cekAbsensi == null) {
            $data['title'] = 'Absensi Masuk';
            $data['user'] = $this->KaryawanModel->find(session()->get('id'));
            $data['jadwal'] = $this->KaryawanModel->getUserJadwal(session()->get('id'));
            $data['izin'] = $this->UnableModel->check(session()->get('id'));
            return view('guru/absen/in', $data);
        } else {
            if ($cekAbsensi['image_out'] == null && $cekAbsensi['location_out'] == null) {
                $data['title'] = 'Absensi Pulang';
                $data['user'] = $this->KaryawanModel->find(session()->get('id'));
                $data['jadwal'] = $this->KaryawanModel->getUserJadwal(session()->get('id'));
                return view('guru/absen/out', $data);
            } else {
                $data['title'] = 'Sudah Absensi';
                $data['absensi'] = $this->AbsensiModel->getAbsensi();
                $data['user'] = $this->KaryawanModel->find(session()->get('id'));
                return view('guru/absen/complete', $data);
            }
        }
    }

    public function masuk()
    {
        $image_data = $this->request->getPost('image');
        $image_path = 'assets/img/absensi/';
        $image_parts = explode(";base64,", $image_data);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file_name = uniqid() . '.'.$image_type;
        $file_path = $image_path . $file_name;

        $lokasi = $this->request->getPost('lokasi');
        if (empty($lokasi)) {
            echo 'error1|Lokasi tidak terdeteksi pastikan perangkat anda lokasinya aktif';
        } else {
            $setting = $this->PengaturanModel->find(1);
            $lokasi_user = explode(",", $lokasi);
            $lat_user = $lokasi_user[0];
            $long_user = $lokasi_user[1];
            $lat_setting = $setting['lat'];
            $long_setting = $setting['long'];
            $jarak = $this->distance($lat_user, $long_user, $lat_setting, $long_setting);
            $radius = round($jarak);

            if ($radius > $setting['radius']) {
                $selisih = $radius - $setting['radius'];
                if ($selisih < 1000) {
                    echo 'error2|Maaf anda tidak bisa absen karena berada '.$selisih.' meter diluar jangkauan ';
                } else {
                    $selisih2 = round($selisih/1000, 2);
                    echo 'error2|Maaf anda tidak bisa absen karena berada '.$selisih2.' km diluar jangkauan ';
                }
            } else {
                if (file_put_contents($file_path, $image_base64)) {
                    $this->AbsensiModel->insert([
                        'user_id' => session()->get('id'),
                        'date' => date('Y-m-d'),
                        'hour_in' => date('H:i:s'),
                        'image_in' => $file_name,
                        'location_in' => $lokasi,
                    ]);
                    echo 'success|Terima Kasih, Selamat Bekerja';
                }
            }
        }
    }

    public function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return $meters;
    }

    public function pulang()
    {
        $cekAbsensi = $this->AbsensiModel->getAbsensi();
        $image_data = $this->request->getPost('image');
        $image_path = 'assets/img/absensi/';
        $image_parts = explode(";base64,", $image_data);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file_name = uniqid() . '.'.$image_type;
        $file_path = $image_path . $file_name;

        $lokasi = $this->request->getPost('lokasi');
        if (empty($lokasi)) {
            $selisih = $radius - $setting['radius'];
            if ($selisih < 1000) {
                echo 'error2|Maaf anda tidak bisa absen karena berada '.$selisih.' meter diluar jangkauan ';
            } else {
                $selisih2 = round($selisih/1000, 2);
                echo 'error2|Maaf anda tidak bisa absen karena berada '.$selisih2.' km diluar jangkauan ';
            }
        } else {
            $setting = $this->PengaturanModel->find(1);
            $lokasi_user = explode(",", $lokasi);
            $lat_user = $lokasi_user[0];
            $long_user = $lokasi_user[1];
            $lat_setting = $setting['lat'];
            $long_setting = $setting['long'];
            $jarak = $this->distance($lat_user, $long_user, $lat_setting, $long_setting);
            $radius = round($jarak);

            if ($radius > $setting['radius']) {
                $selisih = $radius - $setting['radius'];
                echo 'error2|Maaf anda tidak bisa absen karena berada '.$selisih.' meter diluar jangkauan ';
            } else {
                if (file_put_contents($file_path, $image_base64)) {
                    $this->AbsensiModel->update($cekAbsensi['id'], [
                        'hour_out' => date('H:i:s'),
                        'image_out' => $file_name,
                        'location_out' => $lokasi,
                    ]);
                    echo 'success|Terima Kasih, Hati - Hati Dijalan';
                }
            }
        }
    }
}
