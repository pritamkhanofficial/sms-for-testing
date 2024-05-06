<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mastermodel;
use App\Libraries\GroceryCrud;

class MasterController extends BaseController
{
    public function class()
    {
        $session = session();
        $crud = new GroceryCrud();

        // $crud->displayAs('section', 'Section');
        $crud->displayAs('section_id', 'Section');
        $crud->displayAs('is_active', 'Status');
        $crud->setRelationNtoN('section_id', 'section_allocation', 'section', 'class_id', 'section_id','section_name',[
            'is_active' => 1,
            'deleted_at' => NULL,
        ]);
        /* $crud->callbackBeforeInsert(function ($stateParameters) use ($session) {
            $sections = [];
            if(isset($stateParameters->data['section_id'])){
                foreach($stateParameters->data['section_id'] as $sec){
                    $sections[] = $sec;
                }
            }
            $session->set(['sections'=>$sections]);
            
            unset($stateParameters->data['section_id']);
            return $stateParameters;
        }); */
        /* $crud->callbackBeforeUpdate(function ($stateParameters) use ($session) {
            $sections = [];
            if(isset($stateParameters->data['section_id'])){
                foreach($stateParameters->data['section_id'] as $sec){
                    $sections[] = $sec;
                }
            }
            $session->set(['sections'=>$sections]);
            
            unset($stateParameters->data['section_id']);
            return $stateParameters;
        }); */

        /* $crud->callbackColumn('section_id', function ($value, $row) {
            return $value;
        }); */

        $crud->columns(['class_name','numeric_name','section_id', 'is_active']);
        $crud->fields(['class_name', 'numeric_name', 'section_id', 'is_active']);
        
        /* $crud->callbackAfterInsert(function ($stateParameters) use ($session) {
            $sections = $session->get('sections');
            $model = new Mastermodel();
            $model->sectionAllocation($stateParameters->insertId, $sections);
            $session->remove('sections');
            return $stateParameters;
        }); */
        /* $crud->callbackAfterUpdate(function ($stateParameters) use ($session) {
            $sections = $session->get('sections');
            $model = new Mastermodel();
            $model->sectionAllocation($stateParameters->primaryKeyValue, $sections);
            $session->remove('sections');
            return $stateParameters;
        }); */
        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('class');
        $crud->setSubject('Class');
        $output = $crud->render();
        // getQuery();
        return view('common', (array)$output);
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
        return view('common', (array)$output);
    }

}
