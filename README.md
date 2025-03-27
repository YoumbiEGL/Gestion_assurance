#remarque : il faut mettre s sur le dossier views apres le clonage

# Gestion des Assurances et des Clients

Ce projet est une application web pour gérer les assurances et les clients. Il permet d'ajouter, modifier, supprimer et consulter les informations des clients et des assurances.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- **PHP** (version 7.4 ou supérieure)
- **MySQL** (ou MariaDB)
- **Apache** (ou un autre serveur web compatible)
- **Git** (pour cloner le dépôt)

## Installation

Suivez les étapes ci-dessous pour installer et configurer l'application :

### 1. Cloner le Dépôt

Clonez le dépôt Git sur votre machine locale :
```bash
git clone https://github.com/votre-utilisateur/gestion-assurances.git
cd gestion-assurances
```

### 2. Configurer la Base de Données

1. Connectez-vous à votre serveur MySQL et créez une nouvelle base de données :

   ```sql
   CREATE DATABASE gestion_assurances;
   ```

2. Importez le fichier SQL pour créer les tables nécessaires :

   ```bash
   mysql -u votre_utilisateur -p gestion_assurances < database/schema.sql
   ```

3. Mettez à jour le fichier de configuration de la base de données `config/database.php` avec vos informations d'identification MySQL :

   ```php
   <?php
   $host = 'localhost';
   $db = 'gestion_assurances';
   $user = 'votre_utilisateur';
   $pass = 'votre_mot_de_passe';

   $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
   $options = [
       PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_EMULATE_PREPARES   => false,
   ];

   try {
       $pdo = new PDO($dsn, $user, $pass, $options);
   } catch (\PDOException $e) {
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
   }
   ```

### 3. Installer les Dépendances

Utilisez Composer pour installer les dépendances PHP :

```bash
composer install
```

### 4. Configurer le Serveur Web

Configurez votre serveur web pour pointer vers le répertoire `public` du projet. Par exemple, pour Apache, vous pouvez créer un fichier de configuration virtuel hôte :

```apache
<VirtualHost *:80>
    ServerName gestion-assurances.local
    DocumentRoot "/chemin/vers/gestion-assurances/public"

    <Directory "/chemin/vers/gestion-assurances/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

N'oubliez pas de redémarrer Apache après avoir modifié la configuration :

```bash
sudo systemctl restart apache2
```

### 5. Accéder à l'Application

Ouvrez votre navigateur et accédez à l'application via l'URL configurée, par exemple :

```
http://gestion-assurances.local
```

## Utilisation

- Connectez-vous en tant qu'administrateur pour accéder aux fonctionnalités de gestion.
- Utilisez les liens de navigation pour gérer les clients et les assurances.

## Contribuer

Les contributions sont les bienvenues ! Veuillez soumettre une pull request ou ouvrir une issue pour discuter des changements que vous souhaitez apporter.
