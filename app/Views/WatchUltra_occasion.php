<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Watch Ultra d'occasion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4">Apple Watch Ultra d'occasion</h1>
        <ul class="list-group">
            <?php foreach ($models as $model): ?>
            <li class="list-group-item">

                <strong>Modèle:</strong> <?= esc($model['name']); ?><br>
                
                

            </li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= base_url(); ?>" class="btn btn-secondary mt-4">Retour</a>
    </div>
</body>
</html>


<!--<img src="
<!?= esc($model['image']); ?>" alt="<
?= esc($model['name']); ?>" class="img-thumbnail" style="width: 100px;">
<strong>Année:</strong> <
?= esc($model['year']); ?><br>
<strong>Facture:</strong> <
?= esc($model['invoice'] ? 'Oui' : 'Non'); ?><br>
                <strong>Sous garantie:</strong> <
                ?= esc($model['warranty'] ? 'Oui' : 'Non'); ?>