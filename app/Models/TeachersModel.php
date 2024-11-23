<?php

namespace App\Models;

use CodeIgniter\Model;

class TeachersModel extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'name',
        'nip',
        'phone',
        'email',
        'address'
    ];
}
