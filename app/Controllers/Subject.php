<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SubjectModel;

class Subject extends BaseController
{
    public function index()
    {
        return view('subject/add');

    }

    public function storeData()
    {
        $session = session();
        $model = new SubjectModel();
        $user = $this->request->user;

        $user_id = $user['id'];


        $rules = [
            'sub_name' => [
                'label' => 'Subject Name',
                'rules' => 'required'
            ],

            'sub_code' => [
                'label' => 'Subject Code',
                'rules' => 'required'
            ],

            'sub_type' => [
                'label' => 'Subject Type',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['sub_name'])) {
                $session->setFlashdata('name_error', $errors['sub_name']);
            }

            if (isset($errors['sub_code'])) {
                $session->setFlashdata('code_error', $errors['sub_code']);
            }

            if (isset($errors['sub_type'])) {
                $session->setFlashdata('type_error', $errors['sub_type']);
            }
            return redirect()->to('subject/add');
        }


        $data = [
            'subject_name' => $this->request->getVar('sub_name'),
            'subject_code' => $this->request->getVar('sub_code'),
            'subject_type' => $this->request->getVar('sub_type'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user_id
        ];

        $result = $model->addData($data);

        if ($result) {
            $session->setFlashdata('success', 'Subject Added Successfully!!');
            return redirect()->to('subject/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('subject/add');
        }
    }

    public function viewData()
    {
        $model = new SubjectModel();

        $data['subjects'] = $model->findAll();

        return view('subject/view', $data);
    }

    public function editData($id)
    {
        $model = new SubjectModel();

        $data['subject'] = $model->find($id);

        return view('subject/edit', $data);
    }

    public function updateData($id)
    {
        $session = session();
        $model = new SubjectModel();
        $user = $this->request->user;

        $user_id = $user['id'];


        $rules = [
            'sub_name' => [
                'label' => 'Subject Name',
                'rules' => 'required'
            ],

            'sub_code' => [
                'label' => 'Subject Code',
                'rules' => 'required'
            ],

            'sub_type' => [
                'label' => 'Subject Type',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['sub_name'])) {
                $session->setFlashdata('name_error', $errors['sub_name']);
            }

            if (isset($errors['sub_code'])) {
                $session->setFlashdata('code_error', $errors['sub_code']);
            }

            if (isset($errors['sub_type'])) {
                $session->setFlashdata('type_error', $errors['sub_type']);
            }
            return redirect()->to('subject/edit/' . $id);
        }


        $data = [
            'subject_name' => $this->request->getVar('sub_name'),
            'subject_code' => $this->request->getVar('sub_code'),
            'subject_type' => $this->request->getVar('sub_type'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user_id
        ];

        $result = $model->update($id, $data);

        if ($result) {
            $session->setFlashdata('success', 'Subject Updated Successfully!!');
            return redirect()->to('subject/view');
        } else {
            $session->setFlashdata('error', 'OOPS: Something Went Wrong!!');
            return redirect()->to('subject/edit/' . $id);
        }
    }

    public function deleteData($id)
    {
        $session = session();
        $model = new SubjectModel();

        $result = $model->delete($id);

        if ($result) {
            $session->setFlashdata('success', 'Subject Deleted Successfully!!');
            return redirect()->to('subject/view');
        }

    }
}
