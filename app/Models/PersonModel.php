<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table = 'personne'; // Nom de votre table
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password']; // Champs autorisés
    protected $returnType = 'object';
}
