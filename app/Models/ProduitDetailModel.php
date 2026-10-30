<?php
namespace App\Models;

use CodeIgniter\Model;

class ProduitDetailModel extends Model
{
    protected $table = 'produit_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['produit_id', 'prix', 'description'];
}
$details = [
    ['produit_id' => 1, 'prix' => 999,  'description' => 'iPhone X - Excellent état'],
    ['produit_id' => 2, 'prix' => 1099, 'description' => 'iPhone XS - Comme neuf'],
    // Ajoutez les autres détails ici...
];

$produitDetailModel = new ProduitDetailModel();
foreach ($details as $detail) {
    $produitDetailModel->insert($detail);
}