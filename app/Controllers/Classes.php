<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClassesModel;
use CodeIgniter\HTTP\ResponseInterface;

class Classes extends BaseController
{
    public function index()
    {
        return view('class/add.php');
    }

    public function storeData()
    {
        $class_name = $this->request->getVar('class');
        $numeric_name = $this->request->getVar('numeric');
        $session = session();

        $rules = [
            'class' => [
                'label' => 'Class Name',
                'rules' => 'required'
            ],
            'numeric' => [
                'label' => 'Numeric Name',
                'rules' => 'numeric|required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['class'])) {
                $session->setFlashdata('name_error', $errors['class']);
            }
            if (isset($errors['numeric'])) {
                $session->setFlashdata('numeric_error', $errors['numeric']);
            }
            return redirect()->to('add_class');
        }

        $userdata = $this->request->user;
        $userid = $userdata['id'];
        $classesModel = new ClassesModel();

        $data = [
            'class_name' => $class_name,
            'numeric_name' => $numeric_name,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userid
        ];

        $result = $classesModel->store($data);
        if($result){
            $session->setFlashdata('success', 'Class Added Successfully!!');
            return redirect()->to('class/view');
        }else{
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('class/add');
        }

    }

    public function viewData(){
        $classesModel = new ClassesModel();
        $data['classes'] = $classesModel->getData();
        // print_r($data['classes']); die;
        return view('class/view', $data);
    }

    public function editData($id){
        $classesModel = new ClassesModel();

        $data['classdata'] = $classesModel->getDatabyId($id);
        // print_r($data['classdata']); die;
        return view('class/edit', $data);
    }

    public function updateData($id){
        $classesModel = new ClassesModel();

        $class_name = $this->request->getVar('class');
        $numeric_name = $this->request->getVar('numeric');
        $session = session();

        $rules = [
            'class' => [
                'label' => 'Class Name',
                'rules' => 'required'
            ],
            'numeric' => [
                'label' => 'Numeric Name',
                'rules' => 'numeric|required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['class'])) {
                $session->setFlashdata('name_error', $errors['class']);
            }
            if (isset($errors['numeric'])) {
                $session->setFlashdata('numeric_error', $errors['numeric']);
            }
            return redirect()->to('class/edit/' . $id);
        }

        $userdata = $this->request->user;
        $userid = $userdata['id'];

        $data = [
            'class_name' => $class_name,
            'numeric_name' => $numeric_name,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $userid
        ];

        $result = $classesModel->updateData($data, $id);
        if($result){
            $session->setFlashdata('success', 'Class Updated Successfully!!');
            return redirect()->to('class/view');
        }else{
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('class/edit/' . $id);
        }

    }

    public function deleteData($id){
        $classesModel = new ClassesModel;
        $result = $classesModel->delete($id);
        $session = session();

        if($result){
            $session->setFlashdata('success', 'Class Deleted Successfully!!');
            return redirect()->to('class/view');
        }else{
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('class/edit/' . $id);
        }

    }
}
