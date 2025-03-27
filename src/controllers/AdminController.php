<?php
require_once '../Models/Client.php';

class AdminController {
    private $clientModel;

    public function __construct($pdo) {
        $this->clientModel = new Client($pdo);
    }

    public function addClient() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'adresse' => $_POST['adresse'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
            ];
            $this->clientModel->addClient($data);
            header('Location: view_clients.php');
            exit();
        }
        require_once '../src/Views/admin/add_client.php';
    }

    public function editClient($id) {
        $client = $this->clientModel->getClientById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'adresse' => $_POST['adresse']
            ];
            $this->clientModel->updateClient($id, $data);
            header('Location: view_clients.php');
            exit();
        }
        require_once '../src/Views/admin/edit_client.php';
    }

    public function deleteClient($id) {
        $this->clientModel->deleteClient($id);
        header('Location: view_clients.php');
        exit();
    }

    public function viewClients() {
        $clients = $this->clientModel->getAllClients();
        require_once '../src/Views/admin/view_clients.php';
    }

    public function searchClients() {
        $query = $_GET['query'] ?? '';
        $clients = $this->clientModel->searchClients($query);
        require_once '../src/Views/admin/search_clients.php';
    }
}
?>

