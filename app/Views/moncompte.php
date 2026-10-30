<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('index.php'); ?>">Apple Occasion</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <span class="text-white me-3">Bienvenue, <?= $user->email; ?></span>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/home/deconnexion'); ?>">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
    <h2>Mes appareils en vente</h2>

    <?php if (!empty($produits)) : ?>
        <ul class="list-group">
            <?php foreach ($produits as $produit) : ?>
                <li class="list-group-item">
                    <strong>Catégorie :</strong> <?= $produit['categorie']; ?><br>
                    <strong>Modèle :</strong> <?= $produit['modele']; ?><br>
                    <strong>Année :</strong> <?= $produit['annee']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun appareil mis en vente pour l'instant.</p>
    <?php endif; ?>
</div>


</body>
</html>
