<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;

class ClassesModel extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id', 'class_name', 'numeric_name', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at'];

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

    // public function store($data)
    // {
    //     return $this->insert($data);
    // }

    public function addData($class_name, $numeric_name, $sections, $userid)
    {
        try {

            $this->db->transException(true)->transStart();

            $data = [
                'class_name' => $class_name,
                'numeric_name' => $numeric_name,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $userid
            ];

            $this->insert($data);
            $insertId = $this->getInsertID();

            foreach ($sections as $section) {
                $input = [
                    'class_id' => $insertId,
                    'section_id' => $section,
                ];

                $query = $this->db->table('section_allocation')->getWhere($input);
                $resultCount = $query->getNumRows();

                $input['created_at'] = date('Y-m-d');
                $input['created_by'] = $userid;
                // echo $resultCount; die;
                if ($resultCount == 0) {
                    $this->db->table('section_allocation')->insert($input);
                }

            }

            $this->db->transComplete();
            return true;
        } catch (DatabaseException $e) {
            throw $e;
        }

    }

    public function getData()
    {
        // return $this->findAll();
        return $this->db->table('class')
            ->join('section_allocation', 'class.id = section_allocation.class_id')
            ->join('section', 'section.id = section_allocation.section_id')->get()->getResult();
    }

    public function getDatabyId($id)
    {
        // return $this->find($id);
        return $this->db->table('class')
            ->join('section_allocation', 'class.id = section_allocation.class_id')
            ->join('section', 'section.id = section_allocation.section_id')->where('class.id', $id)->get()->getResult();
    }


    public function updateData($id, $class_name, $numeric_name, $sections, $userid)
    {

        try {
            $this->db->transException(true)->transStart();

            // Update class data
            $data = [
                'class_name' => $class_name,
                'numeric_name' => $numeric_name,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $userid
            ];
            $this->update($id, $data);

            // Handle section allocation
            $store_sections = $this->db->table('section_allocation')
                ->getWhere(['class_id' => $id])
                ->getResult();

            $section_values = [];
            foreach ($store_sections as $store_section) {
                $section_values[] = $store_section->section_id;
            }

            foreach ($sections as $section) {
                if (!in_array($section, $section_values)) {
                    $input = [
                        'class_id' => $id,
                        'section_id' => $section,
                        'created_at' => date('Y-m-d'),
                        'created_by' => $userid
                    ];

                    $this->db->table('section_allocation')->insert($input);
                }
            }

            foreach ($section_values as $section_val) {
                if (!in_array($section_val, $sections)) {
                    $this->db->table('section_allocation')
                        ->where('class_id', $id)
                        ->where('section_id', $section_val)
                        ->delete();
                }
            }

            $this->db->transComplete();

            return true;
        } catch (DatabaseException $e) {
            throw $e;
        }
    }

    public function deleteData($id)
    {
        try {

            $this->db->transException(true)->transStart();
            $result = $this->delete($id);
            if ($result) {
                $this->db->table('section_allocation')
                    ->where('class_id', $id)
                    ->delete();
            }
            $this->db->transComplete();
            return true;
        } catch (DatabaseException $e) {
            throw $e;
        }
    }

}
