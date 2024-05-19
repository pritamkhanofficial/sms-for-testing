<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;

class EmployeeModel extends Model
{
    public function get_designation()
    {
        $result = $this->db->table('designation')->get()->getResult();
        return $result;
    }

    public function get_department()
    {
        $result = $this->db->table('department')->get()->getResult();
        return $result;
    }

    public function get_role()
    {
        $result = $this->db->table('roles')->get()->getResult();
        return $result;
    }

    public function employeeAdd($postData,$postFile)
    {
        try {
            $this->db->transException(true)->transStart();
            $profile = NULL;
            if(isset($postFile['profile_picture'])){
                $profile = UploadFile($postFile['profile_picture']);
            }

                $userData = [
                    'username' => rand(1000,9000),
                    'email' => $this->request->getVar('department_id'),
                    'password' => getHash($postData['confirm_password']),
                    'mobile' => $this->request->getVar('designation_id'),
                    'full_name' =>  $postData['name'],
                    'created_at' => gDT(),
                    'created_by' => getBUD()->id
                ];

                if(!is_null($profile)){
                    $userData['profile_pic'] = $profile;
                }
                $this->db->table('users')->insert($userData);
                $user_id = $this->db->insertID();
                $staffData = [
                    'user_id' => $user_id,
                    'name' => $postData['name'],
                    'department' => $this->request->getVar('department_id'),
                    'qualification' => $this->request->getVar('qualification'),
                    'designation' => $this->request->getVar('designation_id'),
                    'joining_date' => $this->request->getVar('joining_date'),
                    'birthday' => $this->request->getVar('date_of_birth'),
                    'sex' => $this->request->getVar('gender'),
                    'religion' => $this->request->getVar('religion'),
                    'blood_group' => $this->request->getVar('blood_group'),
                    'present_address' => $this->request->getVar('present_address'),
                    'permanent_address' => $this->request->getVar('permanent_address'),
                    'mobileno' => $this->request->getVar('mobile'),
                    'email' => $this->request->getVar('email'),
                    'photo' => $this->request->getVar('profile_picture')
                ];

                if(!is_null($profile)){
                    $staffData['photo'] = $profile;
                }
                $this->db->table('staffs')->insert($staffData);

            $this->db->transComplete();
        } catch (DatabaseException $e) {
            // Automatically rolled back already.
        }
    }
}
