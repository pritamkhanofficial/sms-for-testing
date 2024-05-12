<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;
use App\Libraries\GroceryCrud;
class MasterModel extends Model
{
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
    public function section()
    {
        $crud = new GroceryCrud();
        
        $crud->displayAs('is_active', 'Status');
        

        $crud->columns(['section_name', 'is_active']);
        $crud->fields(['section_name', 'is_active']);


        // $crud->unsetDelete();

        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('section');
        $crud->setSubject('Section');
        $output = $crud->render();
        return (array)$output;
    }
    public function classMaster()
    {
        try {
            $this->db->transException(true)->transStart();
            $crud = new GroceryCrud();
            $crud->displayAs('section_id', 'Sections');
            $crud->displayAs('is_active', 'Status');
            $crud->setRelationNtoN('section_id', 'section_allocation', 'section', 'class_id', 'section_id','section_name',[
                'is_active' => 1,
                'deleted_at' => NULL,
            ]);
            $crud->columns(['class_name','numeric_name','section_id', 'is_active']);
            $crud->fields(['class_name', 'numeric_name', 'section_id', 'is_active']);
            $crud->unsetPrint();
            $crud->unsetDelete();
            $crud->unsetExport();
            $crud->setTable('class');
            $crud->setSubject('Class');
            $output = $crud->render();
            $this->db->transComplete();
            return (array)$output;
        } catch (DatabaseException $e) {
            throw $th;
        }
    }

    public function subject()
    {
        $crud = new GroceryCrud();
        
        $crud->displayAs('label', 'Subject name');
        

        $crud->columns(['label', 'subject_type']);
        $crud->fields(['label', 'subject_type']);


        // $crud->unsetDelete();

        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('subject');
        $crud->setSubject('Subject');
        $output = $crud->render();
        return (array)$output;
    }

    public function department()
    {
        $crud = new GroceryCrud();
        
        $crud->displayAs('label', 'Department');
        $crud->displayAs('is_active', 'Status');
        

        $crud->columns(['label', 'is_active']);
        $crud->fields(['label', 'is_active']);


        // $crud->unsetDelete();

        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('department');
        $crud->setSubject('Department');
        $output = $crud->render();
        return (array)$output;
    }

    public function designation()
    {
        $crud = new GroceryCrud();
        
        $crud->displayAs('label', 'Designation');
        $crud->displayAs('is_active', 'Status');
        

        $crud->columns(['label', 'is_active']);
        $crud->fields(['label', 'is_active']);


        // $crud->unsetDelete();

        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('designation');
        $crud->setSubject('Designation');
        $output = $crud->render();
        return (array)$output;
    }

    public function classList(){
        $query = $this->db->table('class');
                 $query->where(['is_active'=>1,'deleted_at'=>NULL]);
        return $query->get()->getResult();
    }
    public function subjectList(){
        $query = $this->db->table('subject');
                 $query->where(['is_active'=>1,'deleted_at'=>NULL]);
        return $query->get()->getResult();
    }
    public function getSectionByClass($id){
        $query = $this->db->table('section_allocation sa');
                 $query->select('s.id, s.section_name');
                 $query->where(['class_id'=>$id,'s.deleted_at'=>NULL]);
                 $query->join('section s','s.id=sa.section_id','left');
        return $query->get()->getResult();
    }
}
