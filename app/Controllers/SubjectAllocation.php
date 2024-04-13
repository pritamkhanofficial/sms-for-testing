<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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

        // print_r($data['classes']);

        return view('subject_allocation/add', $data);
    }

    public function getSection()
    {
        $model = new SubjectAllocationModel();

        $class_id = $this->request->getVar('class_id');

        $datas = $model->getSection($class_id);

        $dropdown = '<option value="">Select Section </option>';

        foreach ($datas as $data) {
            $dropdown .= '<option value="' . $data->section_id . '">' . $data->section_name . '</option>';
        }

        echo json_encode(['data' => $dropdown]);
    }
}
