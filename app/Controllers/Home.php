<?php

namespace App\Controllers;
//$session=session();
class Home extends BaseController
{



    public function welcomeMessage()
    {
        // Initialiser le modèle des produits
        $produitModel = new \App\Models\ProduitModel();

        // Vérifier si l'utilisateur est connecté
        $userId = session()->get('user_id');
        if ($userId) {
            // Récupérer les produits associés à cet utilisateur
            $products = $produitModel->where('personne_id', $userId)->findAll();
        } else {
            $products = []; // Aucun produit si l'utilisateur n'est pas connecté
        }

        // Traiter les données de formulaire si POST
        if ($this->request->getMethod() === 'post') {
            $data = [
                'categorie'   => $this->request->getPost('categorie'),
                'modele'      => $this->request->getPost('modele'),
                'annee'       => $this->request->getPost('annee_sortie'),
                'prix'        => $this->request->getPost('prix'),
                'photo'       => '',
                'personne_id' => $userId,
            ];

            // Gérer l'upload
            $file = $this->request->getFile('photo');
            if ($file->isValid() && !$file->hasMoved()) {
                $data['photo'] = $file->store();
            }

            $produitModel->save($data);
            session()->setFlashdata('message', 'Produit ajouté avec succès !');
        }

        // Passer les produits et autres variables à la vue
        return view('welcome_message', ['products' => $products]);
    }

    public function index(): string
    {
        $productModel = new \App\Models\ProductModel();  // Assurez-vous que ProductModel existe
        $products = $productModel->findAll();  // Récupère tous les produits
    
        $data['products'] = $products;
        return view('welcome_message', $data);
    }
    

    
    public function details($id): string 
    {
        $produitModel = new \App\Models\ProduitModel();
        $produit = $produitModel->find($id);
        $data['produit'] = $produit;

        return view('details', $data);
    }

    public function login()
{
    $params = $this->request->getPost();
    $email = $params['email'];
    $password = $params['password']; 
    $auth = new \App\Models\Authenticator();
    $user = $auth->authenticate($email, $password);

    if ($user) {
        // Stocker l'utilisateur dans la session
        session()->set('isLoggedIn', true);
        session()->set('user', $user);

        // Rediriger vers "Mon compte" après la connexion
        return redirect()->to('/moncompte');
    }

    return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
}


//        $person = $personModel->where('email',$login)->first();
//        $persons = $personModel->findAll();
//        $data['persons'] = $persons;
//        $valid = password_verify($pwd, $person->password);
//        if($valid){
//            $person->password='';
            //$data['user'] = $person; 
            //$_SESSION['user']=$person;
//            session()->set('user',$person);
//        }
      

public function monCompte()
{
    $personneId = session()->get('user_id'); // ID de l'utilisateur connecté
    $produitModel = new \App\Models\ProduitModel();

    // Récupérer les produits liés à cet utilisateur
    $produits = $produitModel->where('personne_id', $personneId)->findAll();

    return view('moncompte', [
        'user' => session()->get('user'), // Informations utilisateur
        'produits' => $produits // Produits de l'utilisateur
    ]);
}

public function ajouterProduit()
{
    if (!session()->has('user_id')) {
        // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
        return redirect()->to(base_url('login'))->with('message', 'Veuillez vous connecter pour ajouter un produit.');
    }

    return view('ajouter_produit'); // Chargez la vue avec le formulaire
}

 // Méthode pour gérer l'upload
 public function upload()
 {
     // Vérifier si l'utilisateur est connecté
     if (!session()->has('user_id')) {
         return redirect()->to(base_url('login'));  // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
     }

     // Charger le modèle de gamme
     $gammeModel = new \App\Models\GammeModel();

     // Récupérer les données du formulaire
     $data = [
         'categorie' => $this->request->getPost('categorie'),
         'modele' => $this->request->getPost('modele'),
         'annee' => $this->request->getPost('annee_sortie'),
         'prix' => $this->request->getPost('prix'),
         // Gérer le fichier photo
         'photo' => $this->request->getFile('photo'),
     ];

     // Valider les données
     if (!$this->validate([
         'categorie' => 'required',
         'modele' => 'required',
         'annee_sortie' => 'required|integer',
         'prix' => 'required|decimal',
         'photo' => 'uploaded[photo]|is_image[photo]',
     ])) {
         // Si la validation échoue, retourner au formulaire avec les erreurs
         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
     }

     // Gérer le téléchargement de l'image
     if ($data['photo']->isValid()) {
         $data['photo']->move(WRITEPATH . 'uploads');  // Déplacer le fichier dans un dossier "uploads"
         $data['photo'] = $data['photo']->getName();  // Obtenir le nom du fichier téléchargé
     }

     // Ajouter les données dans la base de données
     $gammeModel->save($data);

     // Rediriger avec un message de succès
     return redirect()->to(base_url('welcome_message'))->with('message', 'Produit ajouté avec succès!');
 }


public function deconnexion()
{
    session()->destroy(); // Supprimer toutes les données de session
    return redirect('/')->with('message', 'Vous êtes déconnecté.');
}

    
public function inscription()
{
    $params = $this->request->getPost(); // Récupérer les données du formulaire

    // Vérifiez que les champs requis existent
    if (empty($params['email']) || empty($params['password'])) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Email et mot de passe sont requis.'
        ]);
    }

    // Hashage du mot de passe
    $data = [
        'email' => $params['email'],
        'password' => password_hash($params['password'], PASSWORD_BCRYPT), // Sécuriser le mot de passe
    ];

    // Charger le modèle
    $personModel = new \App\Models\PersonModel();

    // Insérer les données
    if ($personModel->insert($data)) {
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Inscription réussie.'
        ]);
    } else {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Erreur lors de l\'inscription.'
        ]);
    }
}


    
}
