<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPhone 14 d'occasion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4">iPhone 14 d'occasion</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Modèle</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($models as $model): ?>
                <tr>
                    <td><?= esc($model['name']); ?></td>
                    <td><?= esc($model['price']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url(); ?>" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>
