<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    public function getNews($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                ->where(['slug' => $slug])
                ->first();
    }

    public function getTest()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('test');
        return $builder->get()->getResult();
    }
}