<?php
require '../app/models/model.php';

$id = $_GET['id'] ?? '';

$personne = find('personnes', $id);

if (!$personne) {
    header('location:personnes.php');
    exit();
}

$page_title = "Modifier-$personne[nom]";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])) {
    // récupération des données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $age = (int) $_POST['age'] ?? 0;
    $slug = $_POST['slug'] ?? '';
    $photo = $personne['photo'];

    // renommage de la photo si changement de slug
    if ($slug != $personne['slug']) {
        $url = "photos/$personne[photo]";
        $photo = $id . "_" . $slug . "." . strtolower(pathinfo($url, PATHINFO_EXTENSION));
        if (file_exists($url)) {
            rename($url, "photos/$photo");
        }
    }
    // modification de la personne
    update('personnes', compact('nom', 'prenom', 'age', 'slug', 'photo', 'id'));

    // modification de la photo si nouvelle photo
    if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
        // suppression ancienne photo
        if (file_exists("photos/$photo")) {
            unlink("photos/$photo");
        }
        // ajout de la nouvelle photo
        $photo = $id . "_" . $slug . "." . strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $origine = $_FILES['photo']['tmp_name'];
        $destination = "photos/$photo";
        move_uploaded_file($origine, $destination);
    }

    header('location:personnes.php');
    exit();
}

require '../app/views/personne/update.php';