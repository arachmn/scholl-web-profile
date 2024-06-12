<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'tb_teacher';
    protected $primaryKey = 'id_teacher';
    protected $allowedFields = [
        'nrp',
        'name',
        'phone',
        'image',
        'job',
        'status'
    ];

    public function getTeacher($status = false)
    {
        if ($status == false) {
            return $this->findAll();
        }
        return $this->where('status', $status)->findAll();
    }

    public function getTeacherId($id)
    {
        return $this->where('id_teacher', $id)->first();
    }

    public function getCount()
    {
        return $this->countAll();
    }
}
