<?php

namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{

    public function getUser($user_name)
    {
        return $this->db->table('tb_user')
                        ->where(array('user_name' => $user_name))
                        ->get()->getRowArray();
    }

}