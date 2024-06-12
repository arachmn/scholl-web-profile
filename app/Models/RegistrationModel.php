<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $table = 'tb_registration';
    protected $primaryKey = 'id_registration';
    protected $allowedFields = [
        'fullName', 'name', 'gender', 'placeDateOfBirth', 'religion', 'civics', 'childNumber',
        'siblings', 'halfSiblings', 'adoptedSiblings', 'language', 'weight', 'height', 'bloodLine',
        'disease', 'address', 'phoneNumber', 'place', 'fatherName', 'motherName', 'fatherEdu',
        'motherEdu', 'fatherJob', 'motherJob', 'guardName', 'guardEdu', 'guardConnect', 'guardjob',
        'fcKK', 'fcAK', 'fcKTP', 'dateRegist', 'class', 'year', 'ouputFile', 'registCode', 'registStatus'
    ];

    public function getRegistration($status = false)
    {
        if ($status == false) {
            return $this->findAll();
        }
        return $this->where('status', $status)->findAll();
    }

    public function getRegistrationId($id)
    {
        return $this->where('id_registration', $id)->first();
    }

    public function getRegistWithCode($code)
    {
        return $this->where('registCode', $code)->first();
    }

    public function getCount()
    {
        return $this->countAll();
    }
}
