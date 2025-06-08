<?php namespace App\Models;

use CodeIgniter\Model;

class SearchModel extends Model
{
    protected $table = 'crawler';
    protected $primaryKey = 'idcrawler';
    protected $allowedFields = ['url', 'content', 'lastupdate'];

    public function search($keyword)
    {
        return $this->like('content', $keyword)->findAll();
    }
}
