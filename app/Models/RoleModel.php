<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table      = 'roles';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = \App\Models\Role::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name','comment','active'];

}