<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Filters\AuthFilter;
use App\Filters\NoAuthFilter;

use App\Models\AuthModel;

class Auth extends BaseController
{

    public function index()
    {
        return view('login/login');
    }
    public function signin()
    {
        $session = session();
       
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['username'])) {
                $session->setFlashdata('name_error', $errors['username']);
            }
            if (isset($errors['password'])) {
                $session->setFlashdata('pass_error', $errors['password']);
            }
            return redirect()->to('/');
        }

        $authModel = new AuthModel();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));

        
        $result = $authModel->getData($username, $password);
        // print_r($result);die;
        if ($result) {
            $s_data = [
                'user' => $result,
                // 'user_name' => $result->username,
                // 'email' => $result->email,
                // 'user_mobile' => $result->mobile,
                // 'name' => $result->full_name,
                // 'created_by' => $result->created_by,
                'is_loggedin' => TRUE,
            ];
            $session->set($s_data);
            // print_r($s_data);die;
            return redirect('dashboard');
        } else {
            $session->setFlashdata('msg', 'Invalid User');
            return redirect()->to('/');
        }
    }

    public function signout(){
        $session = session();
        $session->destroy();
        $session->remove('is_loggedin');
        return redirect()->to('/');
    }


}
