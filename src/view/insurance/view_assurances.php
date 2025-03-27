<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../../../config/database.php';



// Récupérer les informations des assurances avec le nom et le prénom du client
$stmt = $pdo->query("
    SELECT 
        assurances.id AS assurance_id,
        clients.nom AS nom_client,
        clients.prenom AS prenom_client,
        assurances.type,
        assurances.date_debut,
        assurances.date_fin,
        assurances.montant
    FROM assurances
    JOIN clients ON assurances.client_id = clients.id
");
$assurances = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Assurances</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Liste des Assurances</h1>
        <a href="add_assurance.php" class="btn btn-success mb-3">Ajouter une Assurance</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Type</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Montant</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assurances as $assurance): ?>
                <tr>
                    <td><?= htmlspecialchars($assurance['assurance_id'] ?? '') ?></td>
                    <td><?= htmlspecialchars($assurance['nom_client'] ?? 'N/A') . ' ' . htmlspecialchars($assurance['prenom_client'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($assurance['type'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($assurance['date_debut'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($assurance['date_fin'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($assurance['montant'] ?? 'N/A') ?></td>
                    <td>
                        <a href="edit_assurance.php?id=<?= $assurance['assurance_id'] ?>" class="btn btn-warning">Éditer</a>
                        <a href="delete_assurance.php?id=<?= $assurance['assurance_id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
