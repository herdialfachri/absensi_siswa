<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role', 'created_at', 'updated_at'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
