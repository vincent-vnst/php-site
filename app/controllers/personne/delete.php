<?php
require '../app/models/model.php';
$id = $_GET['id'] ?? '';

// Recherche de la personne
$personne = find('personnes', $id);

if (!$personne) {
    header('location:personnes.php');
    exit();
}

$page_title = "Supprimer-$personne[nom]";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supprimer'])) {
    // suppression photo
    if (file_exists("photos/$personne[photo]")) {
        unlink("photos/$personne[photo]");
    }

    // suppression de la personne
    delete('personnes', $id);

    header('location:personnes.php');
    exit();
}

require '../app/views/personne/delete.php';