<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use CodeIgniter\HTTP\ResponseInterface;

class Section extends BaseController
{
    public function index()
    {
       
        return view('section/add.php');
    }

    public function storeData()
    {
        $section_name = $this->request->getVar('section');

        $session = session();
        $rules = [
            'section' => [
                'label' => 'Section Name',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['section'])) {
                $session->setFlashdata('name_error', $errors['section']);
            }
            return redirect()->to('section/add');
        }

        $userdata = $this->request->user;
        $userid = $userdata['id'];

        $sectionModel = new SectionModel();

        $data = [
            'section_name' => $section_name,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userid
        ];

        $result = $sectionModel->store($data);
        if ($result) {
            $session->setFlashdata('success', 'Section Added Successfully!!');
            return redirect()->to('section/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('section/add');
        }
    }

    public function viewData()
    {
        $sectionModel = new SectionModel();

        $data['sections'] = $sectionModel->getData();
        // print_r($data['sections']); die;
        return view('section/view', $data);
    }

    public function editData($id)
    {
        $sectionModel = new SectionModel();

        $data['section'] = $sectionModel->getDatabyId($id);
        // print_r($data['section']); die;
        return view('section/edit', $data);
    }

    public function updateData($id){
        $section_name = $this->request->getVar('section');

        $session = session();
        $rules = [
            'section' => [
                'label' => 'Section Name',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['section'])) {
                $session->setFlashdata('name_error', $errors['section']);
            }
            return redirect()->to('section/edit/' . $id);
        }

        $userdata = $this->request->user;
        $userid = $userdata['id'];

        $sectionModel = new SectionModel();

        $data = [
            'section_name' => $section_name,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $userid
        ];

        $result = $sectionModel->updateData($data, $id);
        if ($result) {
            $session->setFlashdata('success', 'Section Updated Successfully!!');
            return redirect()->to('section/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('section/edit/'. $id);
        }
    }

    public function deleteData($id)
    {
        $sectionModel = new SectionModel();
        $session = session();

        $result = $sectionModel->delete($id);

        if ($result) {
            $session->setFlashdata('success', 'Section Deleted Successfully!!');
            return redirect()->to('section/view');
        }
    }
}
