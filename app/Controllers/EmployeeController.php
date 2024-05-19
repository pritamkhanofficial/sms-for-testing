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
        $model = new EmployeeModel();
        $result['Designation'] = $model->get_designation();
        $result['Department'] = $model->get_department();
        $result['Role'] = $model->get_role();
        // getPrint($result);
        return view('employee/add.php', $result);
    }

    public function employee_add()
    {
        if($this->request->getVar('submit')){
            $data = [
                'name' => $this->request->getVar('name'),
                'department' => $this->request->getVar('department_id'),
                'qualification' => $this->request->getVar('qualification'),
                'designation' => $this->request->getVar('designation_id'),
                'joining_date' => $this->request->getVar('joining_date'),
                'birthday' => $this->request->getVar('date_of_birth'),
                'sex' => $this->request->getVar('gender'),
                'religion' => $this->request->getVar('religion'),
                'blood_group' => $this->request->getVar('blood_group'),
                'present_address' => $this->request->getVar('present_address'),
                'permanent_address' => $this->request->getVar('permanent_address'),
                'mobileno' => $this->request->getVar('mobile'),
                'email' => $this->request->getVar('email'),
                'photo' => $this->request->getVar('profile_picture'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'cnf_password' => password_hash($this->request->getVar('cnf_password'),PASSWORD_DEFAULT),
            ];
            $result = $this->model->submitEmployee($data);
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
    }
}
