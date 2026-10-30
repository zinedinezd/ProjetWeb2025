<?php
namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    protected $allowedFields = ['categorie', 'modele', 'annee', 'personne_id'];
}


$produits = [
    ['categorie' => 'Téléphone', 'modele' => 'iPhone X', 'annee' => 2017, 'personne_id' => 1],
    ['categorie' => 'Téléphone', 'modele' => 'iPhone XS', 'annee' => 2018, 'personne_id' => 2],
    // Ajoutez les autres produits ici...
];

$produitModel = new ProduitModel();
foreach ($produits as $produit) {
    $produitModel->insert($produit);
}
