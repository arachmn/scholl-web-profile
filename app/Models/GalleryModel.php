<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'tb_gallery';
    protected $primaryKey = 'id_gallery';
    protected $allowedFields = [
        'id_admin',
        'image',
        'date',
        'title',
        'status'
    ];

    public function getGallery($status = false)
    {
        if ($status == false) {
            return $this->findAll();
        }
        return $this->where('status', $status)->findAll();
    }

    public function getGalleryId($id)
    {
        return $this->where('id_gallery', $id)->first();
    }

    public function getCount()
    {
        return $this->countAll();
    }
}
