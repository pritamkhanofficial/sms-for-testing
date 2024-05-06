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
}
