<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectsModel extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'created_at', 'updated_at'];
}
