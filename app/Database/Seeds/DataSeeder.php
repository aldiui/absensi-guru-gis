<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => '1',
                'name' => 'Aldi Jaya Mulyana',
                'email' => 'aldikakabow28@gmail.com',
                'phone' => '087826753532',
                'alamat' => 'Kp Singabarong RT 01 RW 02 Desa Bojonggaok',
                'role' => 'Operator',
                'jabatan_id' => 3,
                'is_active' => 1,
                'password' => 'd52234ed5118a1e24e64cf22e6b667951933c5079ebe32ebd2503820e9b90898',
                'salt' => 'tM3Z98U0ujFtjjtaR9GP5g==',
                'image' => '1681782832_7fc77fc2df8784f44196.jpg',
                'created_at' => '2023-04-01 09:15:35',
                'updated_at' => '2023-07-03 12:05:02',
            ],
            [
                'id' => '2',
                'name' => 'Aldiui',
                'email' => 'aldijaya280902@gmail.com',
                'phone' => '087826753532',
                'alamat' => 'Kp Singabarong RT 01 RW 02 Desa Bojonggaok Kecamatan Jamanis',
                'role' => 'Guru',
                'jabatan_id' => 1,
                'is_active' => 1,
                'password' => '376d929d12dcd75a14d3b5c19dc090bb287299eff61df5d963112e11885a5a9d',
                'salt' => 'PhvalNsH6QetcownGsx+IQ==',
                'image' => '1681786176_dc4310e3764ffdb82c4c.jpeg',
                'created_at' => '2023-04-11 09:51:43',
                'updated_at' => '2023-04-20 21:21:17',
            ],
        ];
        $this->db->table('users')->insertBatch($users);

        $jabatan = [
            [
                'id' => '1',
                'akronim' => 'GTY',
                'name_jabatan' => 'Guru Tetap Yayasan',
                'created_at' => '2023-03-30 00:58:10',
                'updated_at' => '2023-04-17 09:13:36',
            ],
            [
                'id' => '2',
                'akronim' => 'GTTY',
                'name_jabatan' => 'Guru Tidak Tetap Yayasan',
                'created_at' => '2023-03-30 01:04:55',
                'updated_at' => '2023-03-30 01:11:01',
            ],
            [
                'id' => '3',
                'akronim' => 'OS',
                'name_jabatan' => 'Operator Sekolah',
                'created_at' => '2023-03-30 02:38:52',
                'updated_at' => '2023-04-09 20:06:34',
            ],
        ];
        $this->db->table('jabatan')->insertBatch($jabatan);

        $jadwal = [
            [
                'id' => '25',
                'user_id' => '2',
                'hari' => 'Sun',
                'jam_masuk' => '07:00:00',
                'jam_keluar' => '15:00:00',
                'jam_mengajar' => '9',
                'status' => 1,
                'status_backup' => 1,
                'created_at' => '2023-04-17 18:18:11',
                'updated_at' => '2023-07-11 15:02:35',
            ],
            [
                'id' => '26',
                'user_id' => '2',
                'hari' => 'Mon',
                'jam_masuk' => '07:00:00',
                'jam_keluar' => '15:00:00',
                'jam_mengajar' => '2',
                'status' => 1,
                'status_backup' => 1,
                'created_at' => '2023-04-17 18:18:11',
                'updated_at' => '2023-07-11 15:02:35',
            ],
            [
                'id' => '27',
                'user_id' => '2',
                'hari' => 'Tue',
                'jam_masuk' => '07:00:00',
                'jam_keluar' => '17:00:00',
                'jam_mengajar' => '2',
                'status' => 1,
                'status_backup' => 1,
                'created_at' => '2023-04-17 18:18:11',
                'updated_at' => '2023-07-11 15:02:35',
            ],
            [
                'id' => '28',
                'user_id' => '2',
                'hari' => 'Wed',
                'jam_masuk' => '07:00:00',
                'jam_keluar' => '15:00:00',
                'jam_mengajar' => '3',
                'status' => 1,
                'status_backup' => 1,
                'created_at' => '2023-04-17 18:18:11',
                'updated_at' => '2023-07-11 15:02:35',
            ],
            [
                'id' => '29',
                'user_id' => '2',
                'hari' => 'Thu',
                'jam_masuk' => '07:00:00',
                'jam_keluar' => '22:00:00',
                'jam_mengajar' => '5',
                'status' => 1,
                'status_backup' => 1,
                'created_at' => '2023-04-17 18:18:11',
                'updated_at' => '2023-07-11 15:02:35',
            ],
            [
                'id' => '30',
                'user_id' => '2',
                'hari' => 'Fri',
                'jam_masuk' => '00:00:00',
                'jam_keluar' => '00:00:00',
                'jam_mengajar' => '0',
                'status' => 0,
                'status_backup' => 0,
                'created_at' => '2023-04-17 18:18:11',
                'updated_at' => '2023-07-11 15:02:35',
            ],
            [
                'id' => '31',
                'user_id' => '2',
                'hari' => 'Sat',
                'jam_masuk' => '07:00:00',
                'jam_keluar' => '15:00:00',
                'jam_mengajar' => '9',
                'status' => 1,
                'status_backup' => 1,
                'created_at' => '2023-04-17 18:18:11',
                'updated_at' => '2023-07-11 15:02:35',
            ],
        ];
        $this->db->table('jadwal')->insertBatch($jadwal);

        $presents = [
            [
                'id' => '11',
                'user_id' => '2',
                'date' => '2023-04-03',
                'hour_in' => '11:39:07',
                'hour_out' => '11:39:39',
                'image_in' => '642a586bc879b.jpeg',
                'image_out' => '642a588b58e1c.jpeg',
                'location_in' => '-6.9173248, 107.610112',
                'location_out' => '-6.9173248, 107.610112',
                'created_at' => '2023-04-03 11:39:07',
                'updated_at' => '2023-04-03 11:39:39',
            ],
            [
                'id' => '12',
                'user_id' => '2',
                'date' => '2023-04-04',
                'hour_in' => '08:36:08',
                'hour_out' => '15:36:33',
                'image_in' => '642b46c81392a.jpeg',
                'image_out' => '642b46e1a5ab1.jpeg',
                'location_in' => '-6.9173248, 107.610112',
                'location_out' => '-6.9173248, 107.610112',
                'created_at' => '2023-04-04 04:36:08',
                'updated_at' => '2023-04-04 04:36:33',
            ],
            [
                'id' => '13',
                'user_id' => '2',
                'date' => '2023-04-08',
                'hour_in' => '22:15:03',
                'hour_out' => '22:15:29',
                'image_in' => '643033770aa8b.jpeg',
                'image_out' => '643033910647d.jpeg',
                'location_in' => '-6.9173248, 107.610112',
                'location_out' => '-6.9173248, 107.610112',
                'created_at' => '2023-04-07 22:15:03',
                'updated_at' => '2023-04-07 22:15:29',
            ],
            [
                'id' => '19',
                'user_id' => '2',
                'date' => '2023-04-17',
                'hour_in' => '07:00:00',
                'hour_out' => '00:00:00',
                'image_in' => '6433ded35c402.jpeg',
                'image_out' => '643033910647d.jpeg',
                'location_in' => '-6.9173248, 107.610112',
                'location_out' => '',
                'created_at' => '2023-04-10 17:02:59',
                'updated_at' => '2023-04-10 17:03:30',
            ],
            [
                'id' => '23',
                'user_id' => '2',
                'date' => '2023-04-18',
                'hour_in' => '15:08:03',
                'hour_out' => '15:08:36',
                'image_in' => '643033910647d.jpeg',
                'image_out' => '643e500444cb1.jpeg',
                'location_in' => '-7.328047, 108.226943',
                'location_out' => '-7.328047, 108.226943',
                'created_at' => '2023-04-18 15:08:03',
                'updated_at' => '2023-04-18 15:08:36',
            ],
        ];
        $this->db->table('presents')->insertBatch($presents);

        $unables = [
            [
                'id' => '6',
                'user_id' => '2',
                'date' => '2023-04-21',
                'status' => 'Sakit',
                'image' => '1682094100_3fe87119dba6483e58be.jpg',
                'keterangan' => 'kasakasjkasjd',
                'persetujuan' => 1,
                'admin_id' => '0',
                'created_at' => '2023-04-19 13:10:45',
                'updated_at' => '2023-04-25 10:03:45'
            ],
            [
                'id' => '7',
                'user_id' => '2',
                'date' => '2023-05-02',
                'status' => 'Izin',
                'image' => '1683012438_07bbf59555d627178723.png',
                'keterangan' => 'Lagi main main',
                'persetujuan' => 1,
                'admin_id' => '1',
                'created_at' => '2023-05-02 14:27:06',
                'updated_at' => '2023-05-10 18:50:14'
            ]
        ];
        $this->db->table('unables')->insertBatch($unables);

        $settings = [
            'id' => '1',
            'name_kantor' => "Pondok Pesantren Darul Muta'allimin",
            'name_aplikasi' => "E-Staff Daarul",
            'logo_kantor' => "logo.jpg",
            'address' => "Jln. Bantarsari, Desa Lewosari, Kec. Bungursari, Kota Tasikmalaya, Jawa Barat 46151",
            'long' => '106.8345',
            'lat' => '-6.2329',
            'radius' => '70',
            'sebelum_masuk' => '15',
            'sebelum_pulang' => '15',
            'setelah_pulang' => '15',
            'gaji' => '15000',
            'name_ttd' => 'Pak Unknown',
            'jabatan_ttd' => 'Kepala Pondok Pesantren',
            'image_ttd' => 'ttd.jpg',
            'path' => 'file:///C://Users/User/Desktop/portofolio/absensi-guru/public/assets/img/',
            'created_at' => '2023-04-01 00:00:00',
            'updated_at' => '2023-05-11 17:31:01'
        ];
        $this->db->table('settings')->insert($settings);

        $email = [
            'id' => '1',
            'from_email' => 'admin@digichainlabs.com',
            'from_name' => 'digichainlabs',
            'recipients' => '',
            'user_agent' => 'CodeIgniter',
            'protocol' => 'smtp',
            'mail_path' => '/usr/sbin/sendmail',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_user' => 'bismikaaldi@gmail.com',
            'smtp_pass' => 'ldldnypaaiqwoqiw',
            'smtp_port' => '465',
            'smtp_timeout' => '5',
            'smtp_keep_alive' => '0',
            'smtp_crypto' => 'ssl',
            'word_wrap' => '1',
            'wrap_chars' => '76',
            'mail_type' => 'html',
            'charset' => 'UTF-8',
            'validate' => '0',
            'priority' => '3',
            'crlf' => '',
            'newline' => '',
            'bcc_batch_mode' => '0',
            'bcc_batch_size' => '200',
            'dsn' => '0',
            'created_at' => '2023-06-23 23:22:51',
            'updated_at' => '2023-06-23 23:22:51'
        ];
        $this->db->table('email')->insert($email);
    }
}