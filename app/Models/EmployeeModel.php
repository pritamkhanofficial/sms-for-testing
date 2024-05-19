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

    public function submitEmployee($data)
    {
        return $this->db->table('staffs')->insert($data);
    }
}
