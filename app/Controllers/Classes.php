<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClassesModel;
use App\Models\SectionAllocationModel;
use CodeIgniter\HTTP\ResponseInterface;

class Classes extends BaseController
{
    public function index()
    {
        $sectionAllocationModel = new SectionAllocationModel();
        $data['sections'] = $sectionAllocationModel->getSection();
        return view('class/add.php', $data);
    }

    public function storeData()
    {
        $class_name = $this->request->getVar('class');
        $numeric_name = $this->request->getVar('numeric');
        $sections = $this->request->getVar('sections');
        $session = session();

        $rules = [
            'sections' => [
                'label' => 'Section',
                'rules' => 'required'
            ],
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
            if (isset($errors['sections'])) {
                $session->setFlashdata('section_error', $errors['sections']);
            }
            if (isset($errors['class'])) {
                $session->setFlashdata('name_error', $errors['class']);
            }
            if (isset($errors['numeric'])) {
                $session->setFlashdata('numeric_error', $errors['numeric']);
            }
            return redirect()->to('class/add');
        }

        $userdata = $this->request->user;
        $userid = $userdata['id'];

        $classesModel = new ClassesModel();
        $result = $classesModel->addData($class_name, $numeric_name, $sections, $userid);

        if ($result) {
            $session->setFlashdata('success', 'Class Added Successfully!!');
            return redirect()->to('class/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('class/add');
        }

    }

    public function viewData()
    {
        $classesModel = new ClassesModel();
        $sectionallocations = $classesModel->getData();

        $allocationData = [];
        foreach ($sectionallocations as $allocation) {
            $class_id = $allocation->class_id;
            $class_name = $allocation->class_name;
            $numeric_name = $allocation->numeric_name;

            if (!isset($allocationData[$class_id])) {
                $allocationData[$class_id] = [
                    'class_name' => $class_name,
                    'numeric_name' => $numeric_name,
                    'sections' => [],
                ];
            }

            $allocationData[$class_id]['sections'][] = $allocation->section_name;
        }

        $data['allocationData'] = $allocationData;


        // echo '<pre>';
        // print_r($data['classes']); die;
        return view('class/view', $data);
    }

    public function editData($id)
    {
        $classesModel = new ClassesModel();

        $sectionAllocationModel = new SectionAllocationModel();
        $data['sections'] = $sectionAllocationModel->getSection();

        $data['classdata'] = $classesModel->getDatabyId($id);
        $data['class_name'] = $data['classdata'][0]->class_name;
        $data['class_id'] = $data['classdata'][0]->class_id;
        $data['numeric_name'] = $data['classdata'][0]->numeric_name;

        $data['sections_id'] = array_column($data['classdata'], 'section_id');

        // echo '<pre>';
        // print_r($data['classdata']); die;
        return view('class/edit', $data);
    }

    public function updateData($id)
    {
        $classesModel = new ClassesModel();

        $class_name = $this->request->getVar('class');
        $numeric_name = $this->request->getVar('numeric');
        $sections = $this->request->getVar('sections');
        $session = session();

        $rules = [
            'class' => [
                'label' => 'Class Name',
                'rules' => 'required'
            ],
            'numeric' => [
                'label' => 'Numeric Name',
                'rules' => 'numeric|required'
            ],
            'sections' => [
                'label' => 'Section',
                'rules' => 'required'
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['class'])) {
                $session->setFlashdata('name_error', $errors['class']);
            }
            if (isset($errors['numeric'])) {
                $session->setFlashdata('numeric_error', $errors['numeric']);
            }
            if (isset($errors['sections'])) {
                $session->setFlashdata('section_error', $errors['sections']);
            }
            return redirect()->to('class/edit/' . $id);
        }

        $userdata = $this->request->user;
        $userid = $userdata['id'];

        $result = $classesModel->updateData($id, $class_name, $numeric_name, $sections, $userid);


        if ($result) {
            $session->setFlashdata('success', 'Class Updated Successfully!!');
            return redirect()->to('class/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('class/edit/' . $id);
        }

    }

    public function deleteData($id)
    {
        $session = session();

        $classesModel = new ClassesModel;

        $result = $classesModel->deleteData($id);

        if ($result) {
            $session->setFlashdata('success', 'Class Deleted Successfully!!');
            return redirect()->to('class/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('class/edit/' . $id);
        }

    }
}
