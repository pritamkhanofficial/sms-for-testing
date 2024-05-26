<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    protected $model = NULL;
    public function __construct()
    {
        $this->model = new EmployeeModel();
    }
    public function employeeAdd()
    {
        $result['Designation'] = $this->model->getDesignation();
        $result['Department'] = $this->model->getDepartment();
        $result['Role'] = $this->model->getRole();
        
        if($this->request->getVar('submit')){
            $result = $this->model->employeeAdd($this->request->getVar(),$this->request->getFile('profile_picture'));
            if($result){
                return $this->response->setJSON([
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => 'Employee added successfully...'
                ]);
            }else{
                return $this->response->setJSON([
                    'type' => 'error',
                    'title' => 'Error',
                    'message' => '!Oops something went wrong. Please try again.'
                ]);
            }
        }
        // getPrint($result);
        return view('employee/add.php', $result);
    }

    public function employeeList()
    {
        $result['list'] = $this->model->getEmployeeList();
        return view('employee/list', $result);
    }
}
