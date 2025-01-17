<?php
$listePersonnes = all('personnes');

$page_title = 'Personnes';

view('personne.index', compact(['page_title', 'listePersonnes']));