<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Requête pour vérifier l'existence de l'email
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $client = $stmt->fetch();

    if ($client) {
        $_SESSION['client_id'] = $client['id'];
        header('Location: admin_dashboard.php'); // Redirige vers le tableau de bord du client
        exit();
    } else {
        $error = "Aucun compte trouvé avec cet email.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Client</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.getElementById("togglePassword");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.textContent = "Masquer le mot de passe";
            } else {
                passwordInput.type = "password";
                toggleButton.textContent = "Afficher le mot de passe";
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Connexion Client</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                            <?php if (isset($error)) echo "<div class='alert alert-danger mt-3'>$error</div>"; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
