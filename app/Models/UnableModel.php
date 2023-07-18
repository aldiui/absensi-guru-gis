<?php

namespace App\Models;

use CodeIgniter\Model;

class UnableModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'unables';
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


    public function getUnableBulan($bulan = null, $tahun = null)
    {
        if (!$bulan) {
            $bulan = date('m');
        }
        if (!$tahun) {
            $tahun = date('Y');
        }
        return $this->where('MONTH(date)', $bulan)->where('YEAR(date)', $tahun)->where('user_id', session()->get('id'))->orderBy('date', 'ASC')->findAll();
    }


    public function getUnable($id, $status, $bulan, $tahun)
    {
        return $this->where('user_id', $id)
        ->where('MONTH(date)', $bulan)
        ->where('YEAR(date)', $tahun)
        ->where('status', $status)
        ->where('persetujuan', 1)
        ->countAllResults();
    }

    public function check($id)
    {
        return $this->where('user_id', $id)
        ->where('date', date('Y-m-d'))
        ->where('persetujuan', 1)
        ->first();
    }
}
