<?php
$id = getParams('id');

// Recherche de la personne
$personne = find('personnes', $id);

if (!$personne) {
    header('location:' . route('personne.index'));
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

    header('location:' . route('personne.index'));
    exit();
}

view('personne.delete', compact(['page_title', 'personne']));