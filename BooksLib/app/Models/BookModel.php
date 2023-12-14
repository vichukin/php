<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Models\AuthorModel;

class BookModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["title","price","yearOfPublish","authorid"];

    // Dates
    protected $useTimestamps = false;
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
    public function GetBook($id =false)
    {
        $model = Model(AuthorModel::class);
        if($id===false)
        {
            $arr = $this->findAll();
            for($i = 0;$i<count($arr);$i++)
            {
                $author = $model->GetAuthor($arr[$i]["authorid"]);
                $arr[$i]["author"] =$author;
            }
            return $arr;
        }
        return $this->find($id);
    }
}
