<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    public function employeeAdd()
    {
        $model = new EmployeeModel();
        $result['Designation'] = $model->get_designation();
        $result['Department'] = $model->get_department();
        $result['Role'] = $model->get_role();
        // getPrint($result);
        return view('employee/add.php', $result);
    }

    public function employee()
    {
        getPrint('ok');
    }
}
