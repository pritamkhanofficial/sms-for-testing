<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\SectionallocationModel;

class SectionAllocation extends BaseController
{
    public function index()
    {
        $sectionallocationModel = new SectionallocationModel();
        $data['classes'] = $sectionallocationModel->getClass();
        $data['sections'] = $sectionallocationModel->getSection();
        return view('sectionallocation/add.php', $data);
    }

    public function storeData()
    {
        $session = session();
        $sectionallocationModel = new SectionallocationModel();

        $class = $this->request->getVar('class');
        $sections = $this->request->getVar('sections');

        $rules = [
            'sections' => [
                'label' => 'Section',
                'rules' => 'required'
            ],
            'class' => [
                'label' => 'Class',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['sections'])) {
                $session->setFlashdata('section_error', $errors['sections']);
            }
            if (isset($errors['class'])) {
                $session->setFlashdata('class_error', $errors['class']);
            }
            return redirect()->to('sectionallocation/add');
        }

        $userdata = $this->request->user;
        $userid = $userdata['id'];
        $sectionallocationModel = new SectionallocationModel();

        foreach ($sections as $section) {
            $data = [
                'class_id' => $class,
                'section_id' => $section,
                'created_at' => date('Y-m-d'),
                'created_by' => $userid
            ];

            $result = $sectionallocationModel->insert($data);
        }

        if ($result) {
            $session->setFlashdata('success', 'Section Allocation Added Successfully!!');
            return redirect()->to('sectionallocation/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('sectionallocation/add');
        }

    }

    public function viewData()
    {
        $sectionallocationModel = new SectionallocationModel();

        $sectionallocations = $sectionallocationModel->getData();

        $allocationData = [];
        foreach ($sectionallocations as $allocation) {
            $class_id = $allocation->class_id;
            $class_name = $allocation->class_name;

            if (!isset($allocationData[$class_id])) {
                $allocationData[$class_id] = [
                    'class_name' => $class_name,
                    'sections' => [],
                ];
            }

            $allocationData[$class_id]['sections'][] = $allocation->section_name;
        }

        $data['allocationData'] = $allocationData;
        // echo '<pre>';
        // print_r( $data['allocationData']);
        // die;

        return view('sectionallocation/view', $data);
    }

    public function editData($id)
    {
        $sectionallocationModel = new SectionallocationModel();

        $data['classes'] = $sectionallocationModel->getClass();
        $data['sections'] = $sectionallocationModel->getSection();

        $data['allocations'] = $sectionallocationModel->getDatabyId($id);

        $data['class_id'] = $data['allocations'][0]['class_id'];

        $data['sections_id'] = array_column($data['allocations'], 'section_id');

        // echo '<pre>';
        // print_r( $data['section_id']);
        // die;

        return view('sectionallocation/edit', $data);
    }

    public function updateData($id)
    {
        $session = session();
        $sectionallocationModel = new SectionallocationModel();

        $class = $this->request->getVar('class');
        $sections = $this->request->getVar('sections');

        $rules = [
            'sections' => [
                'label' => 'Section',
                'rules' => 'required'
            ],
            'class' => [
                'label' => 'Class',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['sections'])) {
                $session->setFlashdata('section_error', $errors['sections']);
            }
            if (isset($errors['class'])) {
                $session->setFlashdata('class_error', $errors['class']);
            }
            return redirect()->to('sectionallocation/edit/' . $id);
        }

        $userdata = $this->request->user;
        $userid = $userdata['id'];

        $store_sections = $sectionallocationModel->getDatabyId($id);
        // print_r($store_sections); die;
        $section_values = [];
        foreach ($store_sections as $store_section) {
            $section_values[] = $store_section['section_id'];
        }

        //insert new data
        foreach ($sections as $section) {
            if (!in_array($section, $section_values)) {
                // echo $section; 
                $input = [
                    'class_id' => $id,
                    'section_id' => $section,
                    'created_at' => date('Y-m-d'),
                    'created_by' => $userid
                ];

                $result = $sectionallocationModel->insert($input);
            }
        }

        // delete added data
        foreach ($section_values as $section_val) {
            if (!in_array($section_val, $sections)) {
                // echo $section_val; die;
                $result = $sectionallocationModel->deleteAddedData($id, $section_val);
            }
        }

        if ($result) {
            $session->setFlashdata('success', 'Section Allocation Updated Successfully!!');
            return redirect()->to('sectionallocation/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('sectionallocation/edit/' . $id);
        }
    }

    public function deleteData($id)
    {
        $session = session();
        $sectionallocationModel = new SectionallocationModel();

        $result = $sectionallocationModel->deleteData($id);
        if ($result) {
            $session->setFlashdata('success', 'Section Allocation Deleted Successfully!!');
            return redirect()->to('sectionallocation/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('sectionallocation/view');
        }

    }
}
