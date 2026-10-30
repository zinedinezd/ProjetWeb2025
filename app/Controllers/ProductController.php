<?php

namespace App\Controllers;
use App\Models\IventeModel; 
use CodeIgniter\Controller;
use App\Models\GammeModel;

class ProductController extends BaseController
{
    public function index()
    {
        $gammeModel = new GammeModel();
        
        // Récupérer toutes les catégories distinctes
        $categories = $gammeModel->distinct('categorie')->findAll();
        
        // Passer les catégories à la vue
        return view('welcome_message', ['categories' => $categories]);
    }

    // Récupérer les modèles en fonction de la catégorie
    public function getModels($category)
    {
        $gammeModel = new GammeModel();
        
        // Récupérer les modèles pour la catégorie spécifiée
        $models = $gammeModel->getModelsByCategory($category);
        
        // Retourner les modèles sous forme de JSON
        return json_encode($models);
    }

    public function upload() { $iventemodel = new IventeModel(); 
        // Validation du formulaire 
        if ($this->request->getMethod() === 'post' && $this->validate([ 'categorie' => 'required', 'modele' => 'required', 'annee_sortie' => 'required|integer', 'prix' => 'required|integer', // Prix sans virgules
         'photo' => 'uploaded[photo]|max_size[photo,1024]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]' ])) 
         { $photo = $this->request->getFile('photo'); 
            $photoName = $photo->getRandomName(); $photo->move(WRITEPATH . 'uploads', $photoName); // Insertion des données dans la base de données
             $iventemodel->save([ 'produit_id' => $this->request->getPost('categorie'), 'modele' => $this->request->getPost('modele'), 'annee_sortie' => $this->request->getPost('annee_sortie'), 'prix' => $this->request->getPost('prix'), 'photo' => $photoName, ]);
              return redirect()->to(base_url('products')); } else { return view('upload_form', ['validation' => $this->validator]); } 
         }
    public function iphone15Occasion()
    {
        $data['models'] = [
            ['name' => 'iPhone 15', 'price' => '900€'],
            ['name' => 'iPhone 15 Pro', 'price' => '1100€'],
            ['name' => 'iPhone 15 Pro Max', 'price' => '1300€']
        ];

        return view('Iphone15_occasion', $data);
    }

    public function iphone14Occasion()
    {
        $data['models'] = [
            ['name' => 'iPhone 14', 'price' => '800€'],
            ['name' => 'iPhone 14 Pro', 'price' => '1000€'],
            ['name' => 'iPhone 14 Pro Max', 'price' => '1200€']
        ];

        return view('Iphone14_occasion', $data);
    }

    public function ipadAirOccasion()
    {
        $data['models'] = [
            ['name' => 'iPad Air (4e génération)', 'price' => '600€'],
            ['name' => 'iPad Air (5e génération)', 'price' => '700€']
        ];

        return view('IpadAir_occasion', $data);
    }

    public function appleWatchUltraOccasion()
    {
        $data['models'] = [
            ['name' => 'Apple Watch Ultra', 'price' => '800€'],
            ['name' => 'Apple Watch Ultra Pro', 'price' => '1000€']
        ];

        return view('WatchUltra_occasion', $data);
    }
}
?>
