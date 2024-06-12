<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'tb_profile';
    protected $primaryKey = 'id_profile';
    protected $allowedFields = [
        'name',
        'panel',
        'email',
        'phone',
        'address',
        'logo',
        'banner1',
        'banner2',
        'banner3',
        'textBanner1',
        'textBanner2',
        'textBanner3',
        'subTextBanner1',
        'subTextBanner2',
        'subTextBanner3',
        'visi',
        'misi',
        'about',
        'youtubeLink',
        'facebookLink',
        'instagramLink',
        'ppdb',
        'year'
    ];

    public function getProfile($id)
    {
        return $this->where('id_profile', $id)
            ->get()
            ->getRow();
    }

    public function getCount()
    {
        return $this->countAll();
    }
}
