<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'produit';  // Nom de la table dans la base de données
    protected $primaryKey = 'id';
    protected $allowedFields = ['categorie', 'modele', 'annee_sortie', 'prix', 'photo'];  // Champs autorisés

    // Optionnel : vous pouvez définir des règles de validation pour les données
    protected $validationRules = [
        'categorie' => 'required',
        'modele' => 'required',
        'annee_sortie' => 'required|numeric',
    ];
}
