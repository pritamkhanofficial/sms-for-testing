<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;

class EmployeeModel extends Model
{
    public function getDesignation()
    {
        $result = $this->db->table('designation')->get()->getResult();
        return $result;
    }

    public function getDepartment()
    {
        $result = $this->db->table('department')->get()->getResult();
        return $result;
    }

    public function getRole()
    {
        $result = $this->db->table('roles')->whereIn('id', [4, 7, 8])->get()->getResult();
        return $result;
    }

    public function employeeAdd($postData, $postFile)
    {
        try {
            $this->db->transException(true)->transStart();
            $profile = NULL;
            if (isset($postFile)) {
                $profile = UploadFile($postFile);
            }
            $username = preg_replace('/\s+/', '', $postData['name']);
            $username = strtolower($username);
            $username = $username . rand(10, 99);

            $userData = [
                'username' => $username,
                'role_id' => $postData['role_id'],
                'email' => $postData['email'],
                'password' => getHash($postData['confirm_password']),
                'mobile' => $postData['mobile'],
                'full_name' =>  $postData['name'],
                'created_at' => gDT(),
                'created_by' => getBUD()->id
            ];

            if (!is_null($profile)) {
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
                'joining_date' => $postData['joining_date'],
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

            if (!is_null($profile)) {
                $staffData['photo'] = $profile;
            }
            $this->db->table('staffs')->insert($staffData);

            return $this->db->transComplete();
        } catch (DatabaseException $e) {
            throw $e;
        }
    }

    public function employeeUpdate($postData, $postFile, $id)
    {
        try {
            $this->db->transException(true)->transStart();
            $profile = NULL;
            if (isset($postFile)) {
                $profile = UploadFile($postFile);
            }
            $username = preg_replace('/\s+/', '', $postData['name']);
            $username = strtolower($username);
            $username = $username . rand(10, 99);

            
            $staffData = [
                'name' => $postData['name'],
                'department' => $postData['department_id'],
                'qualification' => $postData['qualification'],
                'designation' => $postData['designation_id'],
                'joining_date' => $postData['joining_date'],
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

            if (!is_null($profile)) {
                $staffData['photo'] = $profile;
            }
            $this->db->table('staffs')->update($staffData)->where(['id' => $id]);

            return $this->db->transComplete();
        } catch (DatabaseException $e) {
            throw $e;
        }
    }

    public function getEmployeeList()
    {
        $query =  $this->db->table('staffs s'); 
        $query->select('s.*, r.name AS role_name');
        $query->join('users u','u.id=s.user_id','left');
        $query->join('roles r','r.id=u.role_id','left');
        return $query->get()->getResult();
    }

    public function getEmployeeListById($id)
    {
        $query =  $this->db->table('staffs s'); 
        $query->select('s.*, r.name AS role_name');
        $query->join('users u','u.id=s.user_id','left');
        $query->join('roles r','r.id=u.role_id','left');
        $query->where(['s.id' => $id]);
        return $query->get()->getResult();
    }
}
