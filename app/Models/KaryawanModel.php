<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    //Join
    public function getUserWithJabatan()
    {
        return $this->select('users.*, jabatan.name_jabatan, jabatan.akronim')
            ->join('jabatan', 'jabatan.id = users.jabatan_id')
            ->get()
            ->getResultArray();
    }

    public function getUserWithGuru()
    {
        return $this->select('users.*, jabatan.name_jabatan, jabatan.akronim')
            ->join('jabatan', 'jabatan.id = users.jabatan_id')
            ->where('role', 'Guru')
            ->where('users.is_active', 1)
            ->get()
            ->getResultArray();
    }

    public function getUserAndJabatan($id)
    {
        return $this->select('users.*, jabatan.name_jabatan, jabatan.akronim')
            ->join('jabatan', 'jabatan.id = users.jabatan_id')
            ->where('users.id', $id)
            ->get()
            ->getRowArray();
    }

    public function getAbsensi($bulan, $tahun, $id)
    {
        return $this->select('users.*, jabatan.name_jabatan, jabatan.akronim, presents.*, jadwal.*')
        ->join('jabatan', 'jabatan.id = users.jabatan_id')
        ->join('presents', 'presents.user_id = users.id')
        ->join('jadwal', 'jadwal.user_id = users.id')
        ->where('users.id', $id)
        ->where('DATE_FORMAT(presents.date, "%a")', 'jadwal.hari', false)
        ->where('MONTH(presents.date)', $bulan)
        ->where('YEAR(presents.date)', $tahun)
        ->get()
        ->getResultArray();
    }

    public function getAbsensiByDate($date, $id)
    {
        return $this->select('users.*, presents.*, jadwal.*')
        ->join('presents', 'presents.user_id = users.id')
        ->join('jadwal', 'jadwal.user_id = users.id')
        ->where('users.id', $id)
        ->where('presents.date', $date)
        ->get()
        ->getRowArray();
    }

    public function getUserWithGuruAndAbsensi($tanggal)
    {
        $hari = date('D', strtotime($tanggal));
        return $this->select('users.*, jabatan.name_jabatan, jabatan.akronim, presents.*, jadwal.*')
            ->join('jabatan', 'jabatan.id = users.jabatan_id')
            ->join('presents', 'presents.user_id = users.id')
            ->join('jadwal', 'jadwal.user_id = users.id')
            ->where('role', 'Guru')
            ->where('presents.date', $tanggal)
            ->where('jadwal.hari', $hari)
            ->where('jadwal.status', 1)
            ->get()
            ->getResultArray();
    }


    public function hitungKeterlambatan($id, $bulan, $tahun)
    {
        $days = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $keterlambatan = [];

        for ($day = 1; $day <= $days; $day++) {
            $date = "$tahun-$bulan-$day";
            $dayOfWeek = date('D', strtotime($date));
            $jadwal = $this->db->table('jadwal')->select('jam_masuk')->where('user_id', $id)->where('hari', $dayOfWeek)->get()->getRowArray();
            if (!empty($jadwal)) {
                $keterlambatanCount = $this->db->table('presents')
                    ->where('user_id', $id)
                    ->where('date', $date)
                    ->where('hour_in >', $jadwal['jam_masuk'])
                    ->countAllResults();
                $keterlambatan[$day] = $keterlambatanCount;
            } else {
                $keterlambatan[$day] = 0;
            }
        }
        $totalKeterlambatan = array_sum($keterlambatan);
        return $totalKeterlambatan;
    }


    public function getUserJadwal($id)
    {
        $hari = date('D');
        return $this->select('users.*, jadwal.*')
            ->join('jadwal', 'jadwal.user_id = users.id')
            ->where('jadwal.hari', $hari)
            ->where('users.id', $id)
            ->where('jadwal.status', 1)
            ->get()
            ->getRowArray();
    }
    
    public function getUserCheck($id)
    {
        return $this->select('users.*, unables.*')
            ->join('unables', 'unable.user_id = users.id')
            ->where('unables.date', date('Y-m-d'))
            ->where('users_id', $id)
            ->where('jadwal.status', 1)
            ->get()
            ->getRowArray();
    }

    public function checkEmailKaryawan($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getIzin($bulan, $tahun)
    {
        return $this->select('unables.*, users.name, jabatan.name_jabatan, jabatan.akronim')
        ->join('unables', 'unables.user_id = users.id')
        ->join('jabatan', 'jabatan.id = users.jabatan_id')
        ->where('MONTH(unables.date)', $bulan)
        ->where('YEAR(unables.date)', $tahun)
        ->get()
        ->getResultArray();
    }
    
    public function getPenggajian($bulan, $tahun)
    {
        return $this->select('penggajian.*, users.name, jabatan.name_jabatan, jabatan.akronim')
        ->join('penggajian', 'penggajian.user_id = users.id')
        ->join('jabatan', 'jabatan.id = users.jabatan_id')
        ->where('penggajian.bulan', $bulan)
        ->where('penggajian.tahun', $tahun)
        ->get()
        ->getResultArray();
    }
}