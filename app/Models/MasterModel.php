<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;
class MasterModel extends Model
{
    protected $table            = 'masters';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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


    public function sectionAllocation($classInsertId, $sections){
        try {
            $this->db->transException(true)->transStart();
                foreach($sections AS $section){
                    $count = $this->db->table('section_allocation')->getWhere(['class_id' => $classInsertId,'section_id'=>$section])->getNumRows();
                    if($count == 0){
                        $this->db->table('section_allocation')->insert([
                            'class_id'=>$classInsertId,
                            'section_id'=>$section,
                            'created_at'=>gDT(),
                            'created_by'=>getBUD()->id,
                        ]);
                    }else{
                        $this->db->table('section_allocation')->delete([
                            'class_id'=>$classInsertId,
                            'section_id'=>$section
                        ]);
                    }
                }
            return $this->db->transComplete();
        } catch (DatabaseException $e) {
            // Automatically rolled back already.
        }
    }
}
