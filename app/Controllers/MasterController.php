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

        $crud = new GroceryCrud();

        // $crud->displayAs('section', 'Section');
        $crud->displayAs('is_active', 'Status');
        $crud->setRelation('section_id', 'section', 'section_name', ['is_active' => 1, 'deleted_at' => NULL]);

        $crud->columns(['class_name','numeric_name', 'is_active']);
        $crud->fields(['class_name', 'numeric_name', 'section_id', 'is_active']);


        // $crud->unsetDelete();

        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('class');
        $crud->setSubject('Class');
        $output = $crud->render();
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
