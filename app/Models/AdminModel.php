<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'tb_admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = [
        'username',
        'name',
        'image',
        'password',
        'phone'
    ];

    public function getAdmin($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where('id_admin', $id)->first();
    }

    public function getCount()
    {
        return $this->countAll();
    }
}
