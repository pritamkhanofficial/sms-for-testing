<?php

namespace App\Controllers;
use App\Filters\AuthFilter;
use App\Filters\NoAuthFilter;
use App\Models\AuthModel;

class Home extends BaseController
{
    public function index()
    {
        // echo "<pre>"; print_r($this->request->user); die();

        echo view('includes/header');
        echo view('includes/sidebar');
        echo view('index');
        echo view('includes/footer');
    }


}
