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
            $crud->requiredFields(['section_id']);
            $crud->unsetPrint();
            $crud->unsetDelete();
            $crud->unsetExport();
            $crud->setTable('class');
            $crud->setSubject('Class');
            $output = $crud->render();
            $this->db->transComplete();
            return (array)$output;
        } catch (DatabaseException $e) {
            throw $e;
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

    public function subjectAllocationAdd($postData){
        try {
            $this->db->transException(true)->transStart();
            $arraySubject = array(
                'class_id' => $postData['class_id'],
                'section_id' => $postData['section_id'],
            );
            // get class teacher details
            // $get_teacher = $this->subject_model->get('teacher_allocation', $arraySubject, true);
            $subjects = $postData['subject_id'];
            foreach ($subjects as $subject) {
                $arraySubject['subject_id'] = $subject;
                $count = $this->db->table("subject_allocation")->where($arraySubject)->get()->getNumRows();
                if ($count == 0) {
                    $this->db->table('subject_allocation')->insert($arraySubject);
                }
            }
            return $this->db->transComplete();
        } catch (DatabaseException $th) {
            throw $th;
        }
    }
    public function subjectAllocationList(){
        $query = $this->db->table('subject_allocation sa');
                 $query->select('
                 c.class_name,
                 sa.class_id,
                 sa.section_id,
                 s.section_name,
                 GROUP_CONCAT(CONCAT("- ",`sub`.`label`) SEPARATOR "<br>") AS subjects
                 ');
                 $query->join('class c','c.id=sa.class_id','left');
                 $query->join('section s','s.id=sa.section_id','left');
                 $query->join('subject sub','sub.id=sa.subject_id','left');
                 $query->where([
                    'c.deleted_at'=>NULL,
                    's.deleted_at'=>NULL,
                    'sub.deleted_at'=>NULL,
                    'c.is_active'=>1,
                    's.is_active'=>1,
                    'sub.is_active'=>1
                 ]);
                 $query->groupBy('sa.class_id,sa.section_id');
        return  $query->get()->getResult();
        // getQuery();
    }

    public function allocatedSubjectList(){
        $query = $this->db->table('subject')->where(['deleted_at' => NULL, 'is_active' => 1 ])->get()->getResult();
        return $query;
    }
}
