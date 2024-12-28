<?php
require '../app/models/model.php';

$listePersonnes = all('personnes');

$page_title = 'Personnes';

require '../app/views/personne/index.php';