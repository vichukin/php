<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Users'; // Укажите имя таблицы в базе данных

    protected $primaryKey = 'id'; // Укажите первичный ключ (если отличается от 'id')

    protected $allowedFields = ['login', 'password', 'isAdmin']; 

    // Дополнительные настройки и методы модели
    public function GetUser($id =false)
    {
        $model = Model(UserModel::class);
        if($id===false)
        {
            return $this->findAll();
        }
        return $this->find($id);
    }
    public function GetUserByLogin($login)
    {
        $model = Model(UserModel::class);
        $ar = $this->findAll();
        foreach($ar as $elem)
        {
            if($elem["login"]==$login)
                return $elem; 
        }
        return null;
            
    }
}