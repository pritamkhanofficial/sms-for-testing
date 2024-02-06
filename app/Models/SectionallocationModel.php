<?php

namespace App\Models;

use CodeIgniter\Model;

class SectionallocationModel extends Model
{
    protected $table = 'section_allocation';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id', 'class_id', 'section_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at'];

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

    public function getClass()
    {
        return $this->db->table('class')->get()->getResult();
    }


    public function getSection()
    {
        return $this->db->table('section')->get()->getResult();
    }

    public function getData()
    {
        return $this->db->table('section_allocation')
            ->join('class', 'class.id = section_allocation.class_id')
            ->join('section', 'section.id = section_allocation.section_id')->get()->getResult();
    }

    public function getDatabyId($id)
    {
       return $this->where('class_id' , $id)->findAll();
    }

    public function deleteAddedData($id, $section_val){
        return $this->where('class_id', $id)->where('section_id' , $section_val)->delete();
    }

    public function deleteData($id){
        return $this->where('class_id', $id)->delete();
    }
}
