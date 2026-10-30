<?php

namespace App\Models;

use CodeIgniter\Model;

class IventeModel extends Model
{
    protected $table = 'Ivente';
    protected $primaryKey = 'id';
    protected $allowedFields = ['produit_id', 'modele', 'annee_sortie', 'prix', 'photo', 'date_de_publication'];
}
?>
