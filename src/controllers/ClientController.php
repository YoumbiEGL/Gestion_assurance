<?php
require_once '../Models/Client.php';

class ClientController {
    private $clientModel;

    public function __construct($pdo) {
        $this->clientModel = new Client($pdo);
    }

    public function list() {
        $clients = $this->clientModel->getAllClients();
        require_once '../src/Views/client/list.php';
    }

    public function edit($id) {
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
            header('Location: list.php');
            exit();
        }
        require_once '../src/Views/client/edit.php';
    }
}
?>
