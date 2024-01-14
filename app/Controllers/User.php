<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Filters\AuthFilter;
use App\Filters\NoAuthFilter;
use App\Models\AuthModel;

class User extends BaseController
{
    public function index()
    {
        // echo "<pre>"; print_r($this->request->user); die();
        $userdata = $this->request->user;
        $userid = $userdata['id'];

        $authModel = new AuthModel();
        $result = $authModel->getUsers($userid);
        // print_r($result); die;

        echo view('includes/header');
        echo view('includes/sidebar');
        echo view('editprofile', ['result' => $result]);
        echo view('includes/footer');
    }

    public function Profile_update()
    {
        $username = $this->request->getVar('username');
        $full_name = $this->request->getVar('full_name');
        $email = $this->request->getVar('email');
        $mobile = $this->request->getVar('mobile');
        $id = $this->request->getVar('id');
        $img = $this->request->getFile('image');

        $session = session();

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username, users.id,' . $id . ']'
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[users.email, users.id,' . $id . ']'
            ],
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required'
            ],
            'image' => [
                'label' => 'Profile Pic',
                'rules' => 'uploaded[image]|max_size[image,1024]|mime_in[image,image/jpg,image/jpeg,image/png]|is_image[image]',
            ],
            'mobile' => [
                'label' => 'Mobile No',
                'rules' => 'required|numeric|max_length[10]'
            ]
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if (isset($errors['username'])) {
                $session->setFlashdata('user_error', $errors['username']);
            }
            if (isset($errors['full_name'])) {
                $session->setFlashdata('name_error', $errors['full_name']);
            }
            if (isset($errors['mobile'])) {
                $session->setFlashdata('mobile_error', $errors['mobile']);
            }
            if (isset($errors['image'])) {
                $session->setFlashdata('image_error', $errors['image']);
            }
            if (isset($errors['email'])) {
                $session->setFlashdata('email_error', $errors['email']);
            }
            return redirect()->to('profile_edit');
        }

        $authModel = new AuthModel();

        $data = [
            'full_name' => $full_name,
            'username' => $username,
            'mobile' => $mobile,
            'email' => $email,
            'updated_by' => $id,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (isset($img)) {
            if ($img->isValid() && !$img->hasMoved()) {
                $newImg = $img->getRandomName();
                if ($img->move(UPLOAD_PATH, $newImg)) {
                    $data['profile_pic'] = $newImg;
                    @unlink(base_url() . UPLOAD_PATH . $data['profile_pic']);
                }
            }
        }

        $result = $authModel->updateData($data, $id);
        echo $result;
    }

    public function PasswordChange()
    {
        echo view('includes/header');
        echo view('includes/sidebar');
        echo view('changepassword');
        echo view('includes/footer');
    }
}
