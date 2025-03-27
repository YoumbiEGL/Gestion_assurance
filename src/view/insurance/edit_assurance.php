<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../../../config/database.php';



$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM assurances WHERE id = ?");
$stmt->execute([$id]);
$assurance = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $client_id = $_POST['client_id'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $montant = $_POST['montant'];

    $stmt = $pdo->prepare("UPDATE assurances SET type = ?, client_id = ?, date_debut = ?, date_fin = ?, montant = ? WHERE id = ?");
    $stmt->execute([$type, $client_id, $date_debut, $date_fin, $montant, $id]);

    header('Location: view_assurances.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer l'Assurance</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Éditer l'Assurance</h1>
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($assurance['nom'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="<?= htmlspecialchars($assurance['type'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="client_id">ID Client</label>
                <input type="number" class="form-control" id="client_id" name="client_id" value="<?= htmlspecialchars($assurance['client_id'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="date_debut">Date Début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?= htmlspecialchars($assurance['date_debut'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="date_fin">Date Fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin" value="<?= htmlspecialchars($assurance['date_fin'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="number" class="form-control" id="montant" name="montant" value="<?= htmlspecialchars($assurance['montant'] ?? '') ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
