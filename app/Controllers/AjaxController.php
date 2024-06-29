<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mastermodel;
class AjaxController extends BaseController
{
    public function getSectionByClass()
    {
        $id = $this->request->getVar('id');
        $model = new Mastermodel();
        $result = $model->getSectionByClass($id);
        $html = "";
        foreach($result as $row){
            $html .= "<option value='".$row->id."'>".$row->section_name."</option>";
        }

        return json_encode($html);
    }

    public function getSubjectByClass()
    {
        $model = new Mastermodel();
        $class_id = $this->request->getVar('class_id');
        $result = $model->getSubjectByClass($class_id);
        $subjectIds = array_column($result,"subject_id");
        return $this->response->setJSON($subjectIds);
    }
}
