<?php
$id = getParams('id');

$personne = find('personnes', $id);

if (!$personne) {
    header('location:' . route('personne.index'));
    exit();
}

$page_title = "Afficher-$personne[nom]";

view('personne.show', compact(['page_title', 'personne']));