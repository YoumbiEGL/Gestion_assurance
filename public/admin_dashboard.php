<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Vérifiez si l'utilisateur est connecté et est un administrateur

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenue, Administrateur</h1>
        <p>Utilisez les liens ci-dessous pour gérer les clients et les autres fonctionnalités administratives.</p>
        <ul class="list-group">
            <li class="list-group-item"><a href="../src/Views/admin/view_clients.php">Gérer les Clients</a></li>
            <li class="list-group-item"><a href="../src/Views/insurance/view_assurances.php">Gérer les assurances</a></li>
            <!-- Ajoutez d'autres liens vers les fonctionnalités administratives ici -->
        </ul>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
