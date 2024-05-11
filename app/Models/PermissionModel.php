<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;
use App\Libraries\GroceryCrud;

class PermissionModel extends Model
{
    public function role()
    {
        $crud = new GroceryCrud();
        
        $crud->displayAs('name', 'Name');
        $crud->displayAs('display_name', 'Display Name');
        $crud->displayAs('is_active', 'Status');
        

        $crud->columns(['name', 'display_name', 'is_active']);
        $crud->fields(['name', 'display_name', 'is_active']);


        // $crud->unsetDelete();

        $crud->unsetPrint();
        $crud->unsetExport();


        $crud->setTable('roles');
        $crud->setSubject('Roles');
        $output = $crud->render();
        return (array)$output;
    }   
}
