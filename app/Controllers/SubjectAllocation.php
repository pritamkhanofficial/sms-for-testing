<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubjectModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ClassesModel;
use App\Models\SectionModel;
use APP\Models\SectionAllocationModel;
use App\Models\SubjectAllocationModel;

class SubjectAllocation extends BaseController
{
    public function index()
    {
        $model = new ClassesModel();

        $data['classes'] = $model->findAll();

        $subjectModel = new SubjectModel();

        $data['subjects'] = $subjectModel->findAll();

        // print_r($data['subjects']); die;

        return view('subject_allocation/add', $data);
    }

    public function getSection()
    {
        $model = new SubjectAllocationModel();
        $class_id = $this->request->getVar('class_id');
        $sections = $model->getSection($class_id);

        $options = '<option value="">Select Section</option>';
        foreach ($sections as $section) {
            $options .= '<option value="' . $section->id . '">' . $section->section_name . '</option>';
        }

        return json_encode(['options' => $options]);
    }

    public function storeData()
    {
        $session = session();

        $rules = [
            'class' => [
                'label' => 'Class',
                'rules' => 'required',
            ],

            'section' => [
                'label' => 'Section',
                'rules' => 'required'
            ],

            'subjects' => [
                'label' => 'Subject',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['section'])) {
                $session->setFlashdata('section_error', $errors['section']);
            }
            if (isset($errors['class'])) {
                $session->setFlashdata('class_error', $errors['class']);
            }
            if (isset($errors['subjects'])) {
                $session->setFlashdata('subject_error', $errors['subjects']);
            }
            return redirect()->to('subjectallocation/add');
        }

        $model = new SubjectAllocationModel();

        $userdata = $this->request->user;
        $userid = $userdata['id'];

        $data = [
            'class_id' => $this->request->getVar('class'),
            'section_id' => $this->request->getVar('section'),
            'subjects' => $this->request->getVar('subjects'),
            'user_id' => $userid
        ];

        $result = $model->insertData($data);

        if ($result) {
            $session->setFlashdata('success', 'Subject Allocated Successfully!!');
            return redirect()->to('subjectallocation/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('subjectallocation/add');
        }
    }

    public function viewData()
    {

    }

}
