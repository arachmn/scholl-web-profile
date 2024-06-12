<?php

namespace App\Models;

use CodeIgniter\Model;

class FacilityModel extends Model
{
    protected $table = 'tb_facility';
    protected $primaryKey = 'id_facility';
    protected $allowedFields = [
        'id_admin',
        'status',
        'title',
        'image',
        'description',
        'cuality'
    ];

    public function getFacility($status = false)
    {
        if ($status == false) {
            return $this->findAll();
        }
        return $this->where('status', $status)->findAll();
    }

    public function getFacilityId($id)
    {
        return $this->where('id_facility', $id)->first();
    }

    public function getCount()
    {
        return $this->countAll();
    }
}
