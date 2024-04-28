<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Filters\AuthFilter;
use App\Filters\NoAuthFilter;

use App\Models\AuthModel;

class AuthController extends BaseController
{

    public function auth()
    {
        /* if(session()->get('isLoggedIn')){
            generateFlash([
                'type'=>'error',
                'title'=>'Error',
                'message'=>'First logut then go to login page',
            ]);
            return redirect()->back();
        } */
        if($this->request->getVar('login') == 'login'){
            $session = session();
            $model = new AuthModel();
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $data = $model->auth($username);
            // echo "<pre>"; print_r($data);die;
            // getPrint($data);
            if(!is_null($data)){
                $pass = $data->password;
                    $authenticatePassword = password_verify($password, $pass);
                    if($authenticatePassword){
                        $session_data = [
                            'user' => $data,
                            'isLoggedIn' => TRUE
                    ];
                    $session->set($session_data);
                    //$userActivityModel = new UserActivity();
                    //$agent = getDeviceInfo();
                    /* $userActivityModel->insert([
                        'user_id'=>$data->user_id,
                        'institute_id'=>$data->institute_id,
                        'ip'=>$agent['ip_address'],
                        'login'=>getCurrentDate(),
                        'agent'=>json_encode($agent)
                    ]); */
                    generateFlash([
                        'type'=>'success',
                        'title'=>'Success',
                        'message'=>'Welcome to dashboard',
                    ]);
                    return redirect()->to('back-panel/dashboard');
                }else{
                    generateFlash([
                        'type'=>'error',
                        'title'=>'Error',
                        'message'=>'Password is incorrect.',
                    ]);
                    return redirect()->to('/back-panel');
                }
            }else{
                generateFlash([
                    'type'=>'error',
                    'title'=>'Error',
                    'message'=>'Email does not exist.',
                ]);
                return redirect()->to('/back-panel');
            }
        }
        return view('login/login');
    }
    public function signin()
    {
        // echo "ok"; die;
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
        print_r($result);die;
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
