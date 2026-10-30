<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Produits Apple d'occasion - Votre boutique en ligne d'excellence">
    <title>Apple Occasion</title>
    <link rel="icon" href="/favicon.ico">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
    <!-- jQuery et Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <!-- Script pour la gestion des catégories -->
    <script>
        $(document).ready(function () {
            // Gestion dynamique des modèles
            $('#categorie').change(function () {
                var categorie = $(this).val();
                var modelOptions = {
                    'telephone': ['iPhone X', 'iPhone 11', 'iPhone 12', 'iPhone 13', 'iPhone 14'],
                    'ordinateur': ['MacBook Air', 'MacBook Pro', 'iMac', 'Mac Mini'],
                    'tablette': ['iPad', 'iPad Pro', 'iPad Mini', 'iPad Air'],
                    'ecouteurs': ['AirPods', 'AirPods Pro', 'AirPods Max'],
                    'montre': ['Apple Watch', 'Apple Watch Ultra']
                };
                $('#modele').empty();
                if (modelOptions[categorie]) {
                    modelOptions[categorie].forEach(function (model) {
                        $('#modele').append(new Option(model, model));
                    });
                }
            });

            // Initialisation de DataTable
            new DataTable('#myTable');
        });
        
        
        function inscription() {
    var email = $('#email_register').val();
    var password = $('#password_register').val();

    // Validation simple des champs
    if (!email || !password) {
        alert('Veuillez remplir tous les champs.');
        return;
    }

    // Requête AJAX vers le backend
    $.ajax({
        url: '<?= base_url("index.php/home/inscription"); ?>', // Endpoint backend PHP
        method: 'POST',
        data: { email: email, password: password },
        dataType: 'json', // Réponse attendue en JSON
        success: function (response) {
            if (response.success) {
                // Fermer le modal d'inscription
                $('#inscriptionModal').modal('hide');

                // Ouvrir le modal de confirmation
                $('#confirmationModal').modal('show');
            } else {
                // Afficher un message d'erreur si besoin
                alert(response.message || 'Une erreur est survenue.');
            }
        },
        error: function (xhr, status, error) {
            // Gérer les erreurs AJAX
            console.error('Erreur AJAX :', error);
            alert('Une erreur est survenue lors de l’inscription.');
        }
    });
}





function login() {
  event.preventDefault();

  var email = $('#email_login').val();
  var password = $('#password_login').val();

  // Validation (optional)

  $.ajax({
    url: '<?= base_url("index.php/home/login"); ?>', // URL to your login endpoint
    method: 'POST',
    data: { email: email, password: password },
    success: function (response) {
      if (response.success) {
        // Login successful, redirect or display success message

        window.location.href = "<?= base_url('dashboard'); ?>"; // Redirect to dashboard
      } else {
        // Login failed, display error message
       
      }
    },
    error: function (xhr, status, error) {
      console.error('Erreur AJAX :', error);
      
    }
  });
}

 
    </script>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('index.php'); ?>">Apple Occasion</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item">
                        <span class="text-white me-3">Bienvenue, <?= session()->get('user')->email; ?></span>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#profileModal">Mon Compte</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/home/deconnexion'); ?>">Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#inscriptionModal">Inscription</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>



    <!-- Hero Section -->
    <header class="bg-light text-center py-5">
        <h1 class="display-4">Apple Occasion</h1>
        <p class="lead">Découvrez nos produits Apple d'occasion</p>
    </header>

    <!-- Formulaire d'upload -->
    <div class="container my-4">
        <h2>Ajouter un produit</h2>
       <form action="<?= base_url('welcome_message'); ?>" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <select name="categorie" id="categorie" class="form-select" required>
                    <option value="">Choisir une catégorie</option>
                    <option value="telephone">Téléphone</option>
                    <option value="ordinateur">Ordinateur</option>
                    <option value="tablette">Tablette</option>
                    <option value="ecouteurs">Écouteurs</option>
                    <option value="montre">Montre</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="modele" class="form-label">Modèle</label>
                <select name="modele" id="modele" class="form-select" required>
                    <option value="">Choisir un modèle</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="annee_sortie" class="form-label">Année de sortie</label>
                <input type="number" name="annee_sortie" id="annee_sortie" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" name="prix" id="prix" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" multiple required>
            </div>
            <button type="submit" class="btn btn-primary">Uploader</button>
        </form>
    </div>

    <!-- Modal Inscription -->
    <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inscriptionModalLabel">Inscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="email_register" class="form-label">Email</label>
                            <input type="email" id="email_register" class="form-control" placeholder="Entrez votre email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_register" class="form-label">Mot de passe</label>
                            <input type="password" id="password_register" class="form-control" placeholder="Entrez votre mot de passe" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" onclick="inscription()">S'inscrire</button>
                </div>
            </div>
        </div>
        </div>


        <table id="myTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Catégorie</th>
            <th>Modèle</th>
            <th>Année</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= ($product['categorie']); ?></td>
                <td><?= ($product['modele']); ?></td>
                <td><?= ($product['annee']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?= date('Y'); ?> Apple Occasion. Tous droits réservés.</p>
    </footer>

    <!-- Modals -->
<div class="modal" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">Connexion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Body -->
            <div class="modal-body">
                <form id="loginform" action="<?= base_url('index.php/home/login'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Mon Compte -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Mon Compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (session()->get('user')): ?>
                    <p>Email : <strong><?= session()->get('user')->email; ?></strong></p>
                    <a href="<?= base_url('index.php/moncompte'); ?>" class="btn btn-primary">Voir le profil complet</a>
                <?php else: ?>
                    <p class="text-danger">Erreur : Les informations utilisateur sont introuvables.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmation -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Inscription Réussie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Votre inscription a été effectuée avec succès ! Bienvenue !
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>
