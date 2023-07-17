<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'presents';
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

    public function getAbsensi()
    {
        return $this->where('user_id', session()->get('id'))->where('date', date('Y-m-d'))->first();
    }

    public function getAbsensiBulan($bulan = null, $tahun = null)
    {
        if (!$bulan) {
            $bulan = date('m');
        }
        if (!$tahun) {
            $tahun = date('Y');
        }
        return $this->where('MONTH(date)', $bulan)->where('YEAR(date)', $tahun)->where('user_id', session()->get('id'))->orderBy('date', 'ASC')->findAll();
    }


    public function getHadir($id, $bulan, $tahun)
    {
        $count = $this->where('user_id', $id)
            ->where('MONTH(date)', $bulan)
            ->where('YEAR(date)', $tahun)
            ->where('image_out !=', '')
            ->countAllResults();

        return $count ? $count : 0;
    }

    public function getJam($id, $bulan, $tahun)
    {
        $query = $this->where('user_id', $id)
            ->where('MONTH(date)', $bulan)
            ->where('YEAR(date)', $tahun)
            ->where('image_out !=', '');

        $totalJam = 0;
        $results = $query->findAll();

        foreach ($results as $result) {
            $date = date_create($result['date']);
            $day = date_format($date, 'D');

            $jadwal = $this->db->table('jadwal')
                ->where('hari', $day)
                ->where('user_id', $id)
                ->get()
                ->getRowArray();

            if ($jadwal) {
                $totalJam += $jadwal['jam_mengajar'];
            }
        }

        return $totalJam ?? 0;
    }



}