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
            if(isset($postFile)){
                $profile = UploadFile($postFile);
            }

                $userData = [
                    'username' => rand(1000,9000),
                    'email' => $postData['email'],
                    'password' => getHash($postData['confirm_password']),
                    'mobile' => $postData['mobile'],
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
                    'department' => $postData['department_id'],
                    'qualification' => $postData['qualification'],
                    'designation' => $postData['designation_id'],
                    'joining_date' =>$postData['joining_date'],
                    'birthday' => $postData['date_of_birth'],
                    'gender' => $postData['gender'],
                    'religion' => $postData['religion'],
                    'blood_group' => $postData['blood_group'],
                    'present_address' => $postData['present_address'],
                    'permanent_address' => $postData['permanent_address'],
                    'mobileno' => $postData['mobile'],
                    'email' => $postData['email'],
                    'created_at' => gDT(),
                    'created_by' => getBUD()->id
                ];

                if(!is_null($profile)){
                    $staffData['photo'] = $profile;
                }
                $this->db->table('staffs')->insert($staffData);

            return $this->db->transComplete();
        } catch (DatabaseException $e) {
            throw $e;
        }
    }
}
