<?php

namespace App\Controllers;
use App\Filters\AuthFilter;
use App\Filters\NoAuthFilter;
use App\Models\AuthModel;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }


}
