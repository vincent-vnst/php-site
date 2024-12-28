<?php
require '../app/models/model.php';
$id = $_GET['id'] ?? '';

$personne = find('personnes', $id);

if (!$personne) {
    header('location:personnes.php');
    exit();
}

$page_title = "Afficher-$personne[nom]";

require '../app/views/personne/show.php';