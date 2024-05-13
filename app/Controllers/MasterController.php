<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mastermodel;
use App\Libraries\GroceryCrud;

class MasterController extends BaseController
{
    public function classMaster()
    {
        $model = new MasterModel();
        $result = $model->classMaster();
        return view('common', $result);
    }

    public function section()
    {
        $model = new MasterModel();
        $result = $model->section();
        return view('common', $result);
    }

    public function subject()
    {
        $model = new MasterModel();
        $result = $model->subject();
        return view('common', $result);
    }

    public function department()
    {
        $model = new MasterModel();
        $result = $model->department();
        return view('common', $result);
    }

    public function designation()
    {
        $model = new MasterModel();
        $result = $model->designation();
        return view('common', $result);
    }
    public function subjectAllocationList()
    {
        $model = new MasterModel();
        $subjectList = $model->subjectAllocationList();
        return view('subject/subject_allocation_list', [
            'subjectList'=>$subjectList
        ]);
    }
    public function subjectAllocationAdd()
    {
        $model = new MasterModel();
        $class = $model->classList();
        $subject = $model->subjectList();
        if($this->request->getVar('submit') == 'submit'){
            $result = $model->subjectAllocationAdd($this->request->getVar());
            if($result){
                // return redirect('back-panel/master/class');
            }else{
                return redirect('back-panel/master/subject-allocation');
            }
        }
        return view('subject/subject_allocation_add', [
            'class'=>$class,
            'subject'=>$subject,
        ]);
    }

    /*
    Just For Demo 
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
        $crud->callbackBeforeInsert(function ($stateParameters) use ($session) {
            $sections = [];
            if(isset($stateParameters->data['section_id'])){
                foreach($stateParameters->data['section_id'] as $sec){
                    $sections[] = $sec;
                }
            }
            $session->set(['sections'=>$sections]);
            
            unset($stateParameters->data['section_id']);
            return $stateParameters;
        });
        $crud->callbackBeforeUpdate(function ($stateParameters) use ($session) {
            $sections = [];
            if(isset($stateParameters->data['section_id'])){
                foreach($stateParameters->data['section_id'] as $sec){
                    $sections[] = $sec;
                }
            }
            $session->set(['sections'=>$sections]);
            
            unset($stateParameters->data['section_id']);
            return $stateParameters;
        });

        $crud->callbackColumn('section_id', function ($value, $row) {
            return $value;
        });

        $crud->columns(['class_name','numeric_name','section_id', 'is_active']);
        $crud->fields(['class_name', 'numeric_name', 'section_id', 'is_active']);
        
        $crud->callbackAfterInsert(function ($stateParameters) use ($session) {
            $sections = $session->get('sections');
            $model = new Mastermodel();
            $model->sectionAllocation($stateParameters->insertId, $sections);
            $session->remove('sections');
            return $stateParameters;
        });
        $crud->callbackAfterUpdate(function ($stateParameters) use ($session) {
            $sections = $session->get('sections');
            $model = new Mastermodel();
            $model->sectionAllocation($stateParameters->primaryKeyValue, $sections);
            $session->remove('sections');
            return $stateParameters;
        });
        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('class');
        $crud->setSubject('Class');
        $output = $crud->render();
        // getQuery();
        return view('common', (array)$output);
    } */

}
