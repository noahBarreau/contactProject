# Contacts App - Gestion des Contacts

Ce projet est une application PHP pour gérer des contacts. Elle permet à l'utilisateur d'ajouter, de modifier, de supprimer et de visualiser les contacts à travers une interface simple et claire.

## Description générale du projet

L'application permet de gérer des informations de contact (nom, email, téléphone) avec une interface web. Les utilisateurs peuvent :
- Ajouter un nouveau contact.
- Modifier un contact existant.
- Supprimer un contact.
- Visualiser tous les contacts dans une liste.

Le tout est connecté à une base de données MySQL pour la gestion persistante des données.

## Structure des fichiers

### `index.php`
Affiche la liste des contacts dans un tableau HTML. Ce fichier récupère les contacts depuis la base de données et permet d'effectuer des actions comme la modification ou la suppression d'un contact.

### `add_contact.php`
Contient un formulaire HTML pour ajouter un nouveau contact dans la base de données. Ce formulaire envoie les données via la méthode `POST` pour insertion dans la table `contacts`.

### `edit_contact.php`
Affiche un formulaire pré-rempli avec les informations d'un contact existant. L'utilisateur peut modifier ces informations et les soumettre pour mettre à jour le contact dans la base de données.

### `delete_contact.php`
Permet de supprimer un contact à partir de son `id`. Ce fichier récupère l'ID du contact à supprimer et exécute une requête DELETE dans la base de données.

### `db.php`
Contient la logique de connexion à la base de données MySQL en utilisant PDO. Il inclut la fonction `connectDB()` qui crée une connexion à la base de données et retourne un objet PDO pour exécuter des requêtes.

### `styles.css`
Contient tous les styles CSS de l'application. Le fichier définit les couleurs, les polices, les bordures et les espacement de chaque élément de la page, en garantissant une interface utilisateur moderne et agréable.

## Fonctionnalités

### 1. **Ajout de contact**
   - Le formulaire sur `add_contact.php` permet d'ajouter un nouveau contact à la base de données.
   - Lorsque l'utilisateur soumet le formulaire, les données sont envoyées et insérées dans la base de données.
   - Les champs obligatoires incluent le nom, l'email et le téléphone.

### 2. **Modification de contact**
   - Le formulaire sur `edit_contact.php` permet de modifier un contact existant. 
   - Lorsqu'un contact est sélectionné pour modification, l'ID du contact est passé dans l'URL et ses informations actuelles sont affichées dans le formulaire.
   - L'utilisateur peut modifier ces informations et cliquer sur "Mettre à jour" pour enregistrer les changements dans la base de données.

### 3. **Suppression de contact**
   - Sur `index.php`, chaque contact affiche des options pour le modifier ou le supprimer.
   - Lorsque l'utilisateur clique sur "Supprimer", il est redirigé vers `delete_contact.php` où le contact est supprimé de la base de données.

### 4. **Affichage des contacts**
   - Sur `index.php`, une liste de tous les contacts enregistrés dans la base de données est affichée sous forme de tableau.
   - Chaque ligne contient des boutons pour modifier ou supprimer le contact.


## ############################################
##               Installation                 #
## ############################################

1. **XAMPP** ou tout autre serveur local avec PHP et MySQL installé.
2. Créez une base de données MySQL nommée `contacts_db`.
   
   Exécutez la commande suivante pour créer la base de données et la table `contacts` :
   ```sql
   CREATE DATABASE contacts_db;
   
   CREATE TABLE contacts (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nom VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL,
       telephone VARCHAR(15) NOT NULL
   );

La base de données sql est dans le dossier 'installation', c'est le fichier contacts.sql
-> il suffit de faire un copier coller du contenu / de copier les formules 

Des capture d'ecran sont isponible et montre a quoi ( devrait ressembler ) le site