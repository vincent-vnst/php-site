<?php
require '../app/models/model.php';
$page_title = 'Ajouter';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {

    // récupération des données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $age = (int) $_POST['age'] ?? 0;
    $slug = $_POST['slug'] ?? '';

    $id = create('personnes', compact('nom', 'prenom', 'age', 'slug'));

    // récupération de la photo si elle existe
    if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $photo = $id . "_" . $slug . "." . strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $origine = $_FILES['photo']['tmp_name'];
        $destination = "photos/$photo";
        move_uploaded_file($origine, $destination);
        // si la photo n'existe pas on copie la photo par defaut
    } else {
        $photo = $id . "_" . $slug . ".png";
        $origine = 'photos/photo.png';
        $destination = "photos/$photo";
        copy($origine, $destination);
    }
    // modification photo
    update('personnes', compact('photo', 'id'));

    // redirection
    header('location:personnes.php');
    exit();
}

require '../app/views/personne/create.php';