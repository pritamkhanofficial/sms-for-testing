<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id', 'username', 'full_name', 'email', 'password', 'mobile', 'profile_pic', 'generet_token', 'generet_on','is_online', 'is_block' , 'is_active', 'created_at' , 'updated_at', 'created_by', 'updated_by' , 'deleted_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getData($username, $password)
    {
        return $this->where(['username' => $username, 'password' => $password])->first();
    }

    public function getUsers($userid)
    {
        return $this->where(['id' => $userid])->first();
    }

    public function updateData($id, $data)
    {
        $this->where(['id' => $id])->update($data);
    
    }

    public function getImage($id){
        return $this->select('profile_pic')->where(['id' => $id])->get()->getRow();
    }


}
