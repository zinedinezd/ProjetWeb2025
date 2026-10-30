<?php
namespace App\Models;

use CodeIgniter\Model;

class GammeModel extends Model
{
    protected $table = 'gamme';
    protected $primaryKey = 'id_gamme';
    protected $allowedFields = ['categorie', 'modele', 'annee'];
    
    // Méthode pour récupérer les modèles en fonction de la catégorie
    public function getModelsByCategory($category)
    {
        return $this->where('categorie', $category)->findAll();
    }
}
