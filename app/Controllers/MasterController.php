<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mastermodel;

class MasterController extends BaseController
{
    public function section_add()
    {
        return view('section/add.php');
    }

    public function section_view()
    {
        $Mastermodel = new Mastermodel();

        $data['sections'] = $Mastermodel->getData();
        // print_r($data['sections']); die;
        return view('section/view', $data);
    }

}
