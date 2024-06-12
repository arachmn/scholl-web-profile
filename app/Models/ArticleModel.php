<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'tb_article';
    protected $primaryKey = 'id_article';
    protected $allowedFields = [
        'id_admin',
        'title',
        'content',
        'date',
        'status',
        'imgArticle',
    ];

    public function getArticle($status = false)
    {
        if ($status == false) {
            $this->join('tb_admin', 'tb_article.id_admin = tb_admin.id_admin');
            return $this->findAll();
        }
        return $this->where('status', $status)->findAll();
    }

    public function getArticleId($id)
    {
        return $this->where('id_article', $id)->first();
    }

    public function getCount()
    {
        return $this->countAll();
    }

    public function getArticleLimit($start, $limit, $status)
    {
        return $this->where('status', $status)
            ->orderBy('date', 'DESC')
            ->findAll($limit, $start);
    }
}
