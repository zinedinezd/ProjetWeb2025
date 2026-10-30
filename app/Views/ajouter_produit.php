<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- Hero Section -->
     <header class="bg-light text-center py-5">
        <h1 class="display-4">Apple Occasion</h1>
        <p class="lead">Découvrez nos produits Apple d'occasion certifiés</p>
    </header>

    <!-- Formulaire d'upload -->
    <div class="container my-4">
        <h2>Ajouter un produit</h2>
        <form action="<?= base_url('upload'); ?>" method="POST" enctype="multipart/form-data">
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
</body>
</html>
<?php if (session()->has('user_id')) : ?>
    <div class="container my-4">
        <h2>Ajouter un produit</h2>
        <form action="<?= base_url('upload'); ?>" method="POST" enctype="multipart/form-data">
            <!-- Formulaire tel qu'il est -->
        </form>
    </div>
<?php else : ?>
    <p class="text-center">Veuillez vous connecter pour ajouter un produit.</p>
<?php endif; ?>
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-info"><?= session()->getFlashdata('message'); ?></div>
<?php endif; ?>
