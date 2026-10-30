<?php

namespace App\Models;

use CodeIgniter\Entity\Entity;

class Person extends Entity
{
    
    function getRole(){
        $roleModel = new  \App\Models\RoleModel();
        $role = $roleModel->find($this->id_role);
        return $role;
    }   

}
