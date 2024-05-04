<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\GroceryCrud;

class PermissionController extends BaseController
{
    public function permissionHeader()
    {

        $crud = new GroceryCrud();

        $crud->displayAs('name', 'Module');
        // $crud->displayAs('is_active', 'Status');

        $crud->columns(['name']);
        $crud->fields(['name']);


        // $crud->unsetDelete();

        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('permission_headers');
        $crud->setSubject('Permission Headers');
        $output = $crud->render();
        return view('common', (array)$output);
    }
    public function permissionDetail()
    {

        $crud = new GroceryCrud();

        $crud->displayAs('permission_header_id', 'Module');
        $crud->displayAs('name', 'Permission');
        // $crud->displayAs('is_active', 'Status');

        $crud->columns(['permission_header_id','name']);
        $crud->fields(['permission_header_id','name']);
        $crud->setRelation('permission_header_id', 'permission_headers', 'name');

        // $crud->unsetDelete();

        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('permission_details');
        $crud->setSubject('Permission Detail');
        $output = $crud->render();
        return view('common', (array)$output);
    }
}
